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

        $("#dari").change(function(){
            dari=$("#dari").val();
            if($("#sampai").val()){
                sampai=$("#sampai").val();  
            }else{
                sampai=0
            }
            $.ajax({
                url:"<?= base_url();?>/Pemilik/cek/"+dari+"/"+sampai,
                dataType:'json',
                success:function(data){
                    var baris='';
                    for(var i=0;i<data.length;i++){
                        var no = i+1;
                        baris += '<tr>'+
                                    '<td>'+ no +'</td>'+
                                    '<td>'+ data[i].no_invoice +'</td>'+
                                    '<td>'+ data[i].nama_pemesan +'</td>'+
                                    '<td>'+ data[i].meja +'</td>'+
                                    '<td>'+ data[i].tanggal_pemesanan +'</td>'+
                                    '<td>'+ data[i].total +'</td>'+
                                    '<td>'+ data[i].dikelola +'</td>'+
                                '</tr>';
                        $('#target').html(baris);
                    }
                }
            });
        });

        $("#sampai").change(function(){
            if(dari=$("#dari").val()){
                dari=$("#dari").val();
            }else{
                dari=0
            }
            sampai=$("#sampai").val();
            $.ajax({
                url:"<?= base_url();?>/Pemilik/cek/"+dari+"/"+sampai,
                dataType:'json',
                success:function(data){
                    var baris='';
                    for(var i=0;i<data.length;i++){
                        var no = i+1;
                        baris += '<tr>'+
                                    '<td>'+ no +'</td>'+
                                    '<td>'+ data[i].no_invoice +'</td>'+
                                    '<td>'+ data[i].nama_pemesan +'</td>'+
                                    '<td>'+ data[i].meja +'</td>'+
                                    '<td>'+ data[i].tanggal_pemesanan +'</td>'+
                                    '<td>'+ data[i].total +'</td>'+
                                    '<td>'+ data[i].dikelola +'</td>'+
                                '</tr>';
                        $('#target').html(baris);
                    }
                }
            });
        });

        $(document).ready( function () {
            $('#listmenu').DataTable();
        } );
    </script>
</body>

</html>