document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('rating-formA');
    const stars = form.elements['rating'];

    for (let star of stars) {
        star.addEventListener('change', (event) => {
            if (event.target.checked) {
                // Create a FormData object from the form element
                const formData = new FormData(form);

                // Send the data to the server using fetch
                fetch('./php/guardar_califA.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    console.log('Response:', data);
                    // Aquí puedes agregar código para manejar la respuesta del servidor
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Aquí puedes agregar código para manejar errores
                });
            }
        });
    }
});
