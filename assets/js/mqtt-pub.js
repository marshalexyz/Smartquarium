let mqtt;
const reconnectTimeout = 2000;
const topic = "relay/controller";

function logout() {
  sessionStorage.removeItem("mqttConnectionEstablished");
  localStorage.clear();
}

const logoutButton = document.querySelector("#logOut");

if (logoutButton) {
  logoutButton.addEventListener("click", () => {
    logout();
  });
}

// Existing code for toggling UI elements
const toggleOnOff = document.querySelectorAll(".sectionContent .toggleOnOff");
const toggleBall = document.querySelectorAll(".sectionContent .toggleBall");

toggleOnOff.forEach((toggleOnOffItem, index) => {
  // Load the toggle state from local storage
  const savedState = localStorage.getItem(`toggleState${index}`);
  if (savedState === "true") {
    toggleOnOffItem.classList.add("bg-light-yellow");
    toggleOnOffItem.classList.remove("bg-logo-color");
    // Set the initial state of the toggleBall
    toggleBall[index].classList.add("translate-x-[34px]");
  } else {
    toggleOnOffItem.classList.remove("bg-light-yellow");
    toggleOnOffItem.classList.add("bg-logo-color");
    // Set the initial state of the toggleBall
    toggleBall[index].classList.remove("translate-x-[34px]");
  }

  // Define variables to store the initial state
  let initialStateToggle =
    toggleOnOffItem.classList.contains("bg-light-yellow");
  let initialStateBall =
    toggleBall[index].classList.contains("translate-x-[34px]");

  toggleOnOffItem.addEventListener("click", () => {
    toggleOnOffItem.classList.toggle("bg-light-yellow");
    toggleOnOffItem.classList.toggle("bg-logo-color");

    const correspondingToggleBall = toggleBall[index];
    if (correspondingToggleBall) {
      correspondingToggleBall.classList.toggle("translate-x-[34px]");
    }

    // Save the toggle state to local storage
    localStorage.setItem(
      `toggleState${index}`,
      toggleOnOffItem.classList.contains("bg-light-yellow")
    );
    localStorage.setItem(
      `toggleBall${index}`,
      correspondingToggleBall.classList.contains("translate-x-[34px]")
    );

    // Call the publish function when the button is clicked with different messages based on the index
    if (index === 0) {
      publishToggleStatus(
        toggleOnOffItem.classList.contains("bg-light-yellow"),
        "feed",
        initialStateToggle,
        initialStateBall
      );
    } else if (index === 1) {
      publishToggleStatus(
        toggleOnOffItem.classList.contains("bg-light-yellow"),
        "pump",
        initialStateToggle,
        initialStateBall
      );
    }

    // Update the initial states after the first click
    initialStateToggle = toggleOnOffItem.classList.contains("bg-light-yellow");
    initialStateBall =
      correspondingToggleBall.classList.contains("translate-x-[34px]");
  });
});

function publishToggleStatus(isOn, device) {
  const brokerHost = "wss://9e45f7d1372d4c9ab98653b91674d92e.s2.eu.hivemq.cloud:8884/mqtt";

  const clientID = generateClientId();
  const publisher = new Paho.MQTT.Client(brokerHost, clientID);

  const options = {
    timeout: 3,
    userName: "bntngSantosa",
    password: "Qwerty#1233",
    useSSL: true,
    onSuccess: onPublishSuccess,
    onFailure: onPublishSuccess,
  };

  publisher.connect(options);

  function onPublishSuccess() {
    let message;
    if (device === "feed") {
      message = new Paho.MQTT.Message(
        JSON.stringify({ status: isOn ? "feed On" : "feed Off" })
      );
    } else if (device === "pump") {
      message = new Paho.MQTT.Message(
        JSON.stringify({ status: isOn ? "pump On" : "pump Off" })
      );
    }

    message.destinationName = topic;
    publisher.send(message);
    publisher.disconnect();
    console.log(`Published status: ${isOn ? "On" : "Off"} for ${device}`);
  }

  function onPublishFailure(responseObject) {
    console.error(`Publish failed: ${responseObject.errorMessage}`);
    // Handle failure as needed
  }
}

function generateClientId() {
  return `Publisher-${Math.floor(Math.random() * 10000)}`;
}
