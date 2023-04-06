var ctx = document.getElementById('actions-chart').getContext('2d');
var chartActionsData = window.chartActionsData;

var totalActions = chartActionsData.data.reduce((a, b) => a + b, 0);

var actionsChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: chartActionsData.labels.map((label, index) => {
            var actionsCount = chartActionsData.data[index];
            return `${label} (${actionsCount})`;
        }),
        datasets: [{
            data: chartActionsData.data,
            backgroundColor: [
                '#ef476fe0',
                '#FFD166',
                '#06D6A0'
            ],
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                position: 'top'
            },
            title: {
                display: true,
                text: `Total: ${totalActions}`
            },
        },
        animation: {
            animateRotate: true,
            animateScale: true,
            delay: 450,
            easing: 'easeOutQuad'
        }

    }
});
