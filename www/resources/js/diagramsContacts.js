var ctx = document.getElementById('contacts-chart').getContext('2d');
var chartData = window.chartData;

var totalContacts = chartData.data.reduce((a, b) => a + b, 0);

var contactsChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: chartData.labels.map((label, index) => {
            var actionsCount = chartData.data[index];
            return `${label} (${actionsCount})`;
        }),
        datasets: [{
            data: chartData.data,
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
                text: `Total: ${totalContacts}`
            },

        },
        animation: {
            animateRotate: true,
            duration: 2000,
            easing: 'easeInOutQuart',
        }

    }
});
