$('#validateTable').DataTable({
    "paging": true,
    "pagingType": "numbers",
    "language": {
        "lengthMenu": "Mostrando MENU filas por página",
        "zeroRecords": "Nada encontrado - Lo sentimos",
        "info": "Mostrando la página PAGE de PAGES",
        "infoEmpty": "No se han encontrado registros",
        "infoFiltered": "(filtrado con MAX registros totales)",
        "search": "Buscar:"
    }
});
$('.dataTables_length').addClass('bs-select');