
function fetchClientName() {
    var numeroCliente = document.getElementById("numeroCliente").value;
    
    if (numeroCliente) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "php/fetch_client_name.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById("nombreCliente").value = response.nombre;
            }
        };
        
        xhr.send("numero_cliente=" + numeroCliente);
    }
}

window.onload = function() {
    document.getElementById("numeroCliente").addEventListener("change", fetchClientName);
}