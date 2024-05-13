
const cloud = document.getElementById("cloud");
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll("span");
const palanca = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");
const menu = document.querySelector(".menu");
const main = document.querySelector("main");

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


// Función para agregar una nueva nota
// Variable global para almacenar las notas seleccionadas
let notasSeleccionadas = [];

// Función para agregar una nueva nota
function agregarNota() {
    const notaTexto = document.getElementById('nuevaNota').value;
    if (notaTexto.trim() !== '') {
        const pizarra = document.getElementById('pizarra');

        // Crear un nuevo elemento div para la nota
        const nuevaNota = document.createElement('div');
        nuevaNota.className = 'nota';
        nuevaNota.textContent = notaTexto;

        // Agregar atributo para seleccionar nota
        nuevaNota.setAttribute('onclick', 'seleccionarNota(this)');

        // Agregar la nueva nota a la pizarra
        pizarra.appendChild(nuevaNota);

        // Limpiar el campo de texto
        document.getElementById('nuevaNota').value = '';
    }
}

// Función para seleccionar/deseleccionar una nota
function seleccionarNota(nota) {
    nota.classList.toggle('seleccionada');
    const notaTexto = nota.textContent;

    // Agregar o quitar la nota de la lista de notas seleccionadas
    if (notasSeleccionadas.includes(notaTexto)) {
        notasSeleccionadas = notasSeleccionadas.filter(n => n !== notaTexto);
    } else {
        notasSeleccionadas.push(notaTexto);
    }
}

// Función para eliminar notas seleccionadas
function eliminarNotas() {
    const pizarra = document.getElementById('pizarra');
    pizarra.querySelectorAll('.seleccionada').forEach(nota => {
        nota.remove();
    });
    notasSeleccionadas = [];
}

// Función para guardar las notas en la base de datos
function guardarNotas() {
    const notas = [];
    document.querySelectorAll('.nota').forEach(nota => {
        notas.push(nota.textContent);
    });

    // Enviar las notas al servidor utilizando una solicitud AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'guardar_notas.php');
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert('Notas guardadas correctamente');
        } else {
            alert('Error al guardar las notas');
        }
    };
    xhr.send(JSON.stringify(notas));
}
