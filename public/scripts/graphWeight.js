//--------------------- GRAPH POIDS   -------------------------

// SETUP BLOCK
const data = {
    labels: dates,
    datasets: [{
        data: poids,
        label: 'Poids',
        fill: false,
        borderColor: ['turquoise'],
        tension: 0.4,
        borderWidth: 4
    }]
};

// CONFIG BLOCK
const config = {
    type: 'line',
    data,
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Ta courbe de poids'
            },
        },
        interaction: {
            intersect: false,
        },
        scales: {
            x: {
                display: true,
                title: {
                    display: true,
                    text: 'Date'
                }
            },
            y: {
                display: true,
                title: {
                    display: true,
                    text: 'Poids'
                },
            }
        }
    },
};
// RENDER BLOCK
const graphCanvas = new Chart(
    document.getElementById('graphCanvas').getContext('2d') ,
    config
);

