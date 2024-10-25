const chartTempElement = document.querySelector("#chartTemp");
const chartDivTempElement = document.querySelector("#chartDiv");
const notFoundDataTempElement = document.querySelector("#notFoundData");
const selectedYear = document.querySelector("#yearSelector");

const fetchDataAndUpdateChartTemp = () => {
  const valueSelected = selectedYear.value;

  fetch(`http://localhost/iot-project/api/get_temp.php?year=${valueSelected}`)
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.json();
    })
    .then((data) => {
      if (data && data.length > 0) {
        chartDivTempElement.appendChild(chartTempElement);
        notFoundDataTempElement.classList.add("hidden");
        const labels = data.map((item) => item.month);
        const values = data.map((item) => parseInt(item.total_max_temperature));
        const maxTemps = data.map((item) => parseInt(item.max_temp));

        const existingChartInstance = Chart.getChart(chartTempElement);
        if (existingChartInstance) {
          existingChartInstance.destroy();
        }

        const chartTemp = new Chart(chartTempElement, {
          data: {
            labels: labels,
            datasets: [
              {
                type: "bar",
                label: "Count and Max Temperature",
                data: values,
                backgroundColor: "rgb(71, 112, 217, .7)",
                borderRadius: 50,
              },
            ],
          },
          options: {
            scales: {
              y: {
                beginAtZero: true,
              },
            },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              tooltip: {
                callbacks: {
                  label: (context) => {
                    const dataIndex = context.dataIndex;
                    const maxTemp = maxTemps[dataIndex];
                    const countMaxTemp = values[dataIndex];
                    return `Count Max Temperature ${countMaxTemp}\n, Max Temperature: ${maxTemp}°C`;
                  },
                },
              },
            },
          },
        });
      } else {
        chartDivTempElement.removeChild(chartTempElement);
        notFoundDataTempElement.classList.toggle("hidden");
      }
    })
    .catch((error) => {
      // Handle errors, e.g., network issues, API errors
      console.error("Error fetching data:", error);
    });
};

// Initial fetch and chart update
fetchDataAndUpdateChartTemp();

// Event listener for changes in the selected year
selectedYear.addEventListener("change", fetchDataAndUpdateChartTemp);
