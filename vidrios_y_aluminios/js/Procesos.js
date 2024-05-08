// script.js
document.addEventListener('DOMContentLoaded', function() {
    const productInfo = [
        { name: 'Folio', info: 'FOL-xxxx' },
        { name: 'status', info: 'status---' },
        { name: 'precio', info: '$123' },
        { name: 'anticipo', info: '$11' }
    ];

    const historyList = document.getElementById('modification-history');

    productInfo.forEach(modification => {
        const listItem = document.createElement('li');
        listItem.textContent = `${modification.name}: ${modification.info}`;
        historyList.appendChild(listItem);
    });
});
