function show(shown, hidden) {
  document.getElementById(shown).style.display='block';
  document.getElementById(hidden).style.display='none';
  return false;
}

function generateBarChart(allData, question) {
    const answers = Object.keys(allData[question]);
    const counts = Object.values(allData[question]);

    const ctx = document.getElementById("myChart").getContext("2d");

    // Destroy previous chart to avoid stacking
    if (currentChart) {
        currentChart.destroy();
    }

    currentChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: answers,
            datasets: [{
                label: question,
                data: counts,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: "Responses for " + question
                },
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
}

let currentChart = null;

function generateDropdown(allData) {
    const select = document.getElementById("questionSelect");

    // Populate dropdown with Q1–Q5
    Object.keys(allData).forEach(question => {
        const option = document.createElement("option");
        option.value = question;
        option.textContent = question;
        select.appendChild(option);
    });

    // Auto-load first chart
    generateBarChart(allData, Object.keys(allData)[0]);

    // Change chart when selection changes
    select.addEventListener("change", function() {
        generateBarChart(allData, this.value);
    });
}