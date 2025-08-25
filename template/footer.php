</div>

<script src="https://code.jquery.com/jquery-3.7.1.slim.js"
    integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.dataTables.css" />

<script src="https://cdn.datatables.net/2.3.3/js/dataTables.js"></script>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable({
        lengthMenu: [3, 5, 10, 25, 50]
    });
} );
</script>
</body>

</html>