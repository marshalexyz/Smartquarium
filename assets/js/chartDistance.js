const chartDistanceElement = document.querySelector("#chartDistance");
const chartDivDistanceElement = document.querySelector("#chartDivDistance");
const notFoundDataDistanceElement = document.querySelector("#notFoundDataDistance");
const selectedYearDistance = document.querySelector("#yearSelectorDistance");

const fetchDataAndUpdateChartDistance = () => {
  const valueSelected = selectedYearDistance.value;

  fetch(`http://localhost/iot-project/api/get_distance.php?year=${valueSelected}`)
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.json();
    })
    .then((data) => {

      if (data && data.length > 0) {
        chartDivDistanceElement.appendChild(chartDistanceElement);
        notFoundDataDistanceElement.classList.add("hidden");
        const labels = data.map((item) => item.month);
        const values = data.map((item) => parseFloat(item.total_min_distance));
        const minDistances = data.map((item) => parseFloat(item.min_distance));

        const existingChartInstance = Chart.getChart(chartDistanceElement);
        if (existingChartInstance) {
          existingChartInstance.destroy();
        }

        const chartDistance = new Chart(chartDistanceElement, {
          data: {
            labels: labels,
            datasets: [
              {
                label: "Count Min Distance",
                type: "line",
                data: values,
                borderColor: "rgba(150, 120, 0, .5)",
                backgroundColor: "rgba(25, 55, 255, .5)",
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
                    const minDistance = minDistances[dataIndex];
                    const countMinDistance = values[dataIndex];
                    return `Count Min Distance : ${countMinDistance},\n Min Distance : ${minDistance}cm`;
                  },
                },
              },
            },
          },
        });
      } else {
        chartDivDistanceElement.removeChild(chartDistanceElement);
        notFoundDataDistanceElement.classList.toggle("hidden");
      }
    })
    .catch((error) => {
      // Handle errors, e.g., network issues, API errors
      console.error("Error fetching data:", error);
    });
};

// Initial fetch and chart update
fetchDataAndUpdateChartDistance();

// Event listener for changes in the selected year
selectedYearDistance.addEventListener("change", fetchDataAndUpdateChartDistance);
