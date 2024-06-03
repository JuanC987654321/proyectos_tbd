// script.js
// document.addEventListener('DOMContentLoaded', function() {
//dibujarGrafica(60, 30, 20, 10, 5);

async function fetchRatings(filepath) {
    try {
        const response = await fetch(filepath);
        const data = await response.json();
        console.log('Datos recibidos:', data); // Añade este log
        return data;
    } catch (error) {
        console.error('Error fetching ratings:', error);
    }
}

async function dibujarGrafica(filepath, elementId) {
    const data = await fetchRatings(filepath);
    if (!data) return;

    console.log('Datos para la gráfica:', data);
    
    const ctx = document.getElementById(elementId).getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['5 Estrellas', '4 Estrellas', '3 Estrellas', '2 Estrellas', '1 Estrella'],
            datasets: [{
                label: '',
                data: [data.cinco, data.cuatro, data.tres, data.dos, data.una],
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
            responsive: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Llamar a la función para dibujar la gráfica
dibujarGrafica('./php/cargar_calif1.php', "salesChart");
dibujarGrafica('./php/cargar_calif2.php', "salesChart2");
dibujarGrafica('./php/cargar_calif3.php', "salesChart3");

