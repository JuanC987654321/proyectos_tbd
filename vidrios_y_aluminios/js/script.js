
const cloud = document.getElementById("cloud");
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll("span");
const palanca = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");
const menu = document.querySelector(".menu");
const main = document.querySelector("main");


$(document).ready(function() {
    $(".pizarra").sortable(); // Hacer la pizarra ordenable
});

menu.addEventListener("click",()=>{
    barraLateral.classList.toggle("max-barra-lateral");
    if(barraLateral.classList.contains("max-barra-lateral")){
        menu.children[0].style.display = "none";
        menu.children[1].style.display = "block";
    }
    else{
        menu.children[0].style.display = "block";
        menu.children[1].style.display = "none";
    }
    if(window.innerWidth<=320){
        barraLateral.classList.add("mini-barra-lateral");
        main.classList.add("min-main");
        spans.forEach((span)=>{
            span.classList.add("oculto");
        })
    }
});

palanca.addEventListener("click",()=>{
    let body = document.body;
    body.classList.toggle("dark-mode");
    body.classList.toggle("");
    circulo.classList.toggle("prendido");
});

cloud.addEventListener("click",()=>{
    barraLateral.classList.toggle("mini-barra-lateral");
    main.classList.toggle("min-main");
    spans.forEach((span)=>{
        span.classList.toggle("oculto");
    });
});



const form = document.querySelector('form');
const productList = document.getElementById('productList');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    const button = event.target;
    const status = button.dataset.status;

    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'status';
    hiddenInput.value = status;
    form.appendChild(hiddenInput);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', ''); // Cambia la URL a la que se envía el formulario
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            mostrarProductos(data); // Función para mostrar los productos
        } else {
            console.error('Error al cargar productos:', xhr.statusText);
        }
    };
    xhr.send(new FormData(form));
});

function mostrarProductos(productos) {
    productList.innerHTML = ''; // Limpia la sección antes de mostrar nuevos productos

    productos.forEach(producto => {
        const item = document.createElement('li');
        item.textContent = producto.Folio; // Cambia "Folio" por el campo que deseas mostrar
        productList.appendChild(item);
    });
}

let notasSeleccionadas = new Set(); // Set para almacenar las notas seleccionadas

// Función para agregar una nueva nota
function agregarNota() {
    const nuevaNotaText = document.getElementById('nuevaNota').value.trim();
    const colorNota = document.getElementById('colorNota').value; // Obtener el color seleccionado

    if (nuevaNotaText !== '') {
        const nuevaNotaElement = document.createElement('div');
        nuevaNotaElement.classList.add('nota');
        nuevaNotaElement.style.backgroundColor = colorNota; // Establecer el color de fondo de la nota

        // Crear checkbox para seleccionar la nota
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.addEventListener('change', () => actualizarSeleccion(nuevaNotaElement)); // Asociar evento de cambio
        nuevaNotaElement.appendChild(checkbox); // Agregar checkbox a la nota

        // Crear elemento para la fecha y hora
        const fechaHoraElement = document.createElement('div');
        fechaHoraElement.textContent = obtenerFechaHoraActual();
        fechaHoraElement.classList.add('fecha-hora');
        nuevaNotaElement.appendChild(fechaHoraElement); // Agregar fecha y hora al inicio de la nota

        // Crear elemento para el texto principal de la nota
        const textoNotaElement = document.createElement('div');
        textoNotaElement.textContent = nuevaNotaText;
        nuevaNotaElement.appendChild(textoNotaElement); // Agregar texto principal de la nota

        const pizarra = document.getElementById('pizarra');
        pizarra.appendChild(nuevaNotaElement);

        // Limpiar el textarea después de agregar la nota
        document.getElementById('nuevaNota').value = '';
    } else {
        alert('Por favor, escribe algo en la nota antes de guardar.');
    }
}




// Función para actualizar la selección de las notas
function actualizarSeleccion(notaElement) {
    const checkbox = notaElement.querySelector('input[type="checkbox"]');
    if (checkbox.checked) {
        notaElement.classList.add('seleccionada');
    } else {
        notaElement.classList.remove('seleccionada');
    }
}


// Función para obtener la fecha y hora actual en un formato legible
function obtenerFechaHoraActual() {
    const ahora = new Date();
    const options = {
        year: 'numeric', month: 'numeric', day: 'numeric',
        hour: 'numeric', minute: 'numeric', second: 'numeric'
    };
    return ahora.toLocaleString('es-ES', options);
}

// Función para eliminar notas seleccionadas
function eliminarNotasSeleccionadas() {
    const notasSeleccionadas = document.querySelectorAll('.nota.seleccionada');
    if (notasSeleccionadas.length > 0) {
        const confirmacion = confirm('Estimado(a) usuario(a), ¿está seguro(a) de eliminar estas notas? Verifique por favor');
        if (confirmacion) {
            notasSeleccionadas.forEach((nota) => {
                nota.remove();
            });
        }
    } else {
        alert('No hay notas seleccionadas para eliminar.');
    }
}

// Función para guardar la nota en una base de datos (simulado)
function guardarNotaEnBaseDeDatos(nota) {
    console.log('Guardando nota en la base de datos:', nota);
    // Aquí podrías implementar el código para guardar la nota en tu base de datos
}

// Función para simular la eliminación de una nota en la base de datos
function eliminarNotaDeBaseDeDatos(nota) {
    console.log('Eliminando nota de la base de datos:', nota);
    // Aquí podrías implementar el código para eliminar la nota de tu base de datos
}
