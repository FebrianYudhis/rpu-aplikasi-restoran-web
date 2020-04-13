</div>
    <!-- Optional JavaScript -->
    <script src="<?= base_url();?>assets/vendor/jquery/jquery-3.3.1.js"></script>
    <script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?= base_url();?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="<?= base_url();?>assets/libs/js/main-js.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables/datatables.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables/dataTables.buttons.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables/buttons.flash.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables/jszip.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables/pdfmake.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables/vfs_fonts.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables/buttons.html5.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables/buttons.print.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#listtransaksi').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ]
            } );
        } );
        
        $(document).ready( function () {
            $('#listmenu').DataTable();
        } );
    </script>
</body>

</html>