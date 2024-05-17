// script.js
// document.addEventListener('DOMContentLoaded', function() {
//dibujarGrafica(60, 30, 20, 10, 5);
function dibujarGrafica(cinco, cuatro, tres, dos, una,){
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['5 Estrella', '4 Estrellas', '3 Estrellas', '2 Estrellas', '1 Estrellas'],
            datasets: [{
                label: 'Servicios con esta calificacion',
                data: [cinco, cuatro, tres, dos, una],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(200, 59, 160, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(200, 59, 160, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
// });
};

