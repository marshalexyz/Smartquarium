let mqtt;
const reconnectTimeout = 2000;
const topic = "smart/aquarium/DD";
const connectionFlagKey = "mqttConnectionEstablished";

function logout() {
  sessionStorage.removeItem(connectionFlagKey);
  localStorage.clear();
}

const logoutButton = document.querySelector("#logOut");

if (logoutButton) {
  logoutButton.addEventListener("click", () => {
    logout();
  });
}

function failedHandler() {
  const notifConnectedFailed = document.querySelector("#notifConnectedFailed");
  notifConnectedFailed.classList.replace("-right-[100%]", "right-10");

  setTimeout(() => {
    notifConnectedFailed.classList.replace("right-10", "-right-[100%]");
  }, 2000);
  reconnect();
}

function onConnectHandler() {
  subscribeToTopic();

  const connectionFlag = sessionStorage.getItem(connectionFlagKey);

  const notifConnected = document.querySelector("#notifConnected");

  if (connectionFlag === "true") {
    notifConnected.classList.replace("right-10", "-right-[100%]");
  } else {
    notifConnected.classList.replace("-right-[100%]", "right-10");
    sessionStorage.setItem(connectionFlagKey, "true");
  }

  setTimeout(() => {
    notifConnected.classList.replace("right-10", "-right-[100%]");
  }, 2000);
}

function subscribeToTopic() {
  mqtt.subscribe(topic);
}

function determineColorTemp(value) {
  const infoTemp = document.querySelector("#infoTemp");
  if (value < 20) {
    infoTemp.innerHTML = "Temperature very cold";
    return "red";
  } else if (value >= 20 && value <= 24) {
    infoTemp.innerHTML = "Temperature cold";
    return "yellow";
  } else if (value >= 25 && value <= 27) {
    infoTemp.innerHTML = "Temperature normal";
    return "blue";
  } else if (value >= 28 && value <= 30) {
    infoTemp.innerHTML = "Temperature hot";
    return "yellow";
  } else {
    infoTemp.innerHTML = "Temperature very hot";
    return "red";
  }
}

function determineColorClarity(value) {
  const infoClarity = document.querySelector("#infoClarity");
  if (value <= 1) {
    infoClarity.innerHTML = "The water is very clear";
    return "blue";
  } else if (value >= 1 && value <= 5) {
    infoClarity.innerHTML = "Clear water";
    return "blue";
  } else if (value > 5 && value < 10) {
    infoClarity.innerHTML = "Cloudy water";
    return "yellow";
  } else {
    infoClarity.innerHTML = "The water is very murky";
    return "red";
  }
}

function determineColorDistance(value) {
  const infoDistance = document.querySelector("#infoDistance");
  if (value > 20) {
    infoDistance.innerHTML = "Water is too full";
    return "blue";
  } else if (value > 15 && value <= 20) {
    infoDistance.innerHTML = "Normal water";
    return "yellow";
  } else if (value > 10 && value < 15) {
    infoDistance.innerHTML = "Not enough water";
    return "orange";
  } else {
    infoDistance.innerHTML = "Very little water";
    return "red";
  }
}

function displaySensorData(temperature, distance, turbidity) {
  const temp = new JSCWidgets.Circular("temp", {
    value: temperature,
    valueFormat: "d",
    label: "Celcius",
    max: 100,
    sweep: 270,
    color: determineColorTemp(temperature),
  });

  const clarity = new JSCWidgets.Circular("clarity", {
    value: turbidity,
    label: "NTU",
    valueFormat: "d",
    max: 100,
    sweep: 270,
    color: determineColorClarity(turbidity),
  });

  const distancee = new JSCWidgets.Circular("distance", {
    value: distance,
    label: "Centimeter",
    valueFormat: "d",
    max: 100,
    sweep: 270,
    color: determineColorDistance(distance),
  });
}

function onMessageArrived(message) {
  // Mendapatkan data sensor dari pesan yang diterima
  let sensorData = JSON.parse(message.payloadString);
  let temperature = sensorData.Suhu;
  let distance = sensorData.Jarak;
  let turbidity = sensorData.Kekeruhan;

  displaySensorData(temperature, distance, turbidity);
  sendSensorDataToPHP(sensorData);
}

function sendSensorDataToPHP(sensorData) {
  const url = "../api/post_data.php";
  const xhr = new XMLHttpRequest();
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/json");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // console.log(xhr.responseText);
    }
  };

  const jsonData = JSON.stringify(sensorData);
  xhr.send(jsonData);
}

function reconnect() {
  const notifReconnect = document.querySelector("#notifReconnect");
  setTimeout(() => {
    notifReconnect.classList.replace("-right-[100%]", "right-10");
  }, 2000);
  notifReconnect.classList.replace("right-10", "-right-[100%]");
  setTimeout(MQTTconnect, reconnectTimeout);
}

function generateClientId() {
  const existingConnection = sessionStorage.getItem(connectionFlagKey);
  if (existingConnection === "true") {
    return existingConnection;
  }
  return `ESP32-${Math.floor(Math.random() * 10000)}`;
}

function MQTTconnect() {
  const brokerHost = "wss://9e45f7d1372d4c9ab98653b91674d92e.s2.eu.hivemq.cloud:8884/mqtt";

  const clientID = generateClientId();

  mqtt = new Paho.MQTT.Client(brokerHost, clientID);

  const options = {
    timeout: 3,
    userName: "bntngSantosa",
    password: "Qwerty#1233",
    useSSL: true,
    onSuccess: onConnectHandler,
    onFailure: failedHandler,
  };

  mqtt.onMessageArrived = onMessageArrived;

  mqtt.connect(options);
}

MQTTconnect();
