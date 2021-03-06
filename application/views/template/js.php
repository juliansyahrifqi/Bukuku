<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Bootsrap Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"> </script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

<!-- DataTables Bootstrap -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/r-2.2.3/datatables.min.js"></script>


<!-- Bootsrap Date Picker-->
<script type="text/javascript">
    $(".date").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true
    });
</script>

<!-- DataTables Bootstrap-->
<script>
    $(document).ready(function() {
        var table = $('#myTable').DataTable({
            responsive: true,
            buttons: [
                'excel'
            ]
        });
        table.buttons().container()
            .appendTo('#myTable_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Filter Button Datatables -->
<script>
    $(document).ready(function() {
        $(".btn-group .btn").click(function() {
            var inputValue = $(this).find("input").val();
            if (inputValue != 'all') {
                var target = $('table tr[data-status="' + inputValue + '"]');
                $("table tbody tr").not(target).hide();
                target.fadeIn();
            } else {
                $("table tbody tr").fadeIn();
            }
        });
    });
</script>

</body>

</html>