let currentChart = null;

function generateBarChart(allData, question, lastWordOnly = false) {
    let answers = Object.keys(allData[question]);
    let counts = Object.values(allData[question]);

    if (lastWordOnly) {
        const processed = {};
        answers.forEach((ans, i) => {
            const words = ans.trim().split(/\s+/);
            const key = words[words.length - 1]; // last word
            processed[key] = (processed[key] || 0) + counts[i];
        });
        answers = Object.keys(processed);
        counts = Object.values(processed);
    }

    const ctx = document.getElementById("myChart").getContext("2d");

    if (currentChart) currentChart.destroy();

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
                title: { display: true, text: "Responses for " + question },
                legend: { display: false }
            },
            scales: { y: { beginAtZero: true } }
        }
    });
}

function generateDropdown(allData) {
    const select = document.getElementById("questionSelect");

    // Clear dropdown
    select.innerHTML = "";

    const questions = Object.keys(allData);
    questions.forEach(q => {
        const opt = document.createElement("option");
        opt.value = q;
        opt.textContent = q;
        select.appendChild(opt);
    });

    // Add toggle checkbox
    let toggleContainer = document.getElementById("toggleContainer");
    if (!toggleContainer) {
        toggleContainer = document.createElement("div");
        toggleContainer.id = "toggleContainer";
        toggleContainer.style.margin = "10px 0";
        select.parentNode.insertBefore(toggleContainer, select.nextSibling);
    }
    toggleContainer.innerHTML = "";

    const toggleCheckbox = document.createElement("input");
    toggleCheckbox.type = "checkbox";
    toggleCheckbox.id = "secondWordToggle";
    const toggleLabel = document.createElement("label");
    toggleLabel.htmlFor = "secondWordToggle";
    toggleLabel.textContent = "Basic";
    toggleContainer.appendChild(toggleCheckbox);
    toggleContainer.appendChild(toggleLabel);

    let currentQuestion = questions[0];

    function updateChart() {
        const lastWordMode = toggleCheckbox.checked && (currentQuestion === "Q1" || currentQuestion === "Q4");
        generateBarChart(allData, currentQuestion, lastWordMode);
    }

    // Show/hide toggle based on question
    function updateToggleVisibility() {
        toggleContainer.style.display = (currentQuestion === "Q1" || currentQuestion === "Q4") ? "block" : "none";
        toggleCheckbox.checked = false;
    }

    // Initial chart
    updateToggleVisibility();
    updateChart();

    select.addEventListener("change", function() {
        currentQuestion = this.value;
        updateToggleVisibility();
        updateChart();
    });

    toggleCheckbox.addEventListener("change", updateChart);
}