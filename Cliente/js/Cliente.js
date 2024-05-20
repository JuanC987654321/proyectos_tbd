document.getElementById('folioForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const folio = document.getElementById('folioInput').value;
    window.location.href = `/Cliente/html/Progreso.html?folio=${folio}`;
});
