const chartClarityElement = document.querySelector("#chartClarity");
const chartDivClarityElement = document.querySelector("#chartDivClarity");
const notFoundDataClarityElement = document.querySelector(
  "#notFoundDataClarity"
);
const selectedYearClarity = document.querySelector("#yearSelectorClarity");

const fetchDataAndUpdateChartClarity = () => {
  const valueSelected = selectedYearClarity.value;

  fetch(
    `http://localhost/iot-project/api/get_clarity.php?year=${valueSelected}`
  )
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.json();
    })
    .then((data) => {
      if (data && data.length > 0) {
        chartDivClarityElement.appendChild(chartClarityElement);
        notFoundDataClarityElement.classList.add("hidden");
        const labels = data.map((item) => item.month);
        const values = data.map((item) => parseFloat(item.average_clarity));

        const existingChartInstance = Chart.getChart(chartClarityElement);
        if (existingChartInstance) {
          existingChartInstance.destroy();
        }

        const chartClarity = new Chart(chartClarityElement, {
          data: {
            labels: labels,
            datasets: [
              {
                label: "Average Clarity",
                type: "line",
                data: values,
                borderColor: "rgba(150, 120, 0, .5)",
                backgroundColor: "rgba(255, 255, 110, .5)",
                fill: true,
                tension: 0.3,
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
          },
        });
      } else {
        chartDivClarityElement.removeChild(chartClarityElement);
        notFoundDataClarityElement.classList.toggle("hidden");
      }
    })
    .catch((error) => {
      // Handle errors, e.g., network issues, API errors
      console.error("Error fetching data:", error);
    });
};

// Initial fetch and chart update

fetchDataAndUpdateChartClarity();

// Event listener for changes in the selected year
selectedYearClarity.addEventListener("change", fetchDataAndUpdateChartClarity);
