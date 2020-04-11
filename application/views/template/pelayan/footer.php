</div>
    <!-- Optional JavaScript -->
    <script src="<?= base_url();?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?= base_url();?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="<?= base_url();?>assets/libs/js/main-js.js"></script>
    <script src="<?= base_url();?>assets/vendor/datatables/datatables.js"></script>
    <script>
        ambildata();
        var refresh = setInterval(ambildata,10000);
        function ambildata(){
            $.ajax({
                type:'POST',
                url:'<?= base_url()."pelayan/ambildata"?>',
                dataType:'json',
                success: function(data){
                    var baris='';
                    for(var i=0;i<data.length;i++){
                        baris +=    '<div class="email-list" id="target">'+
                                        '<div class="email-list-item email-list-item--unread">'+
                                            '<div class="email-list-detail"><span class="date float-right">'+data[i].tanggal_pemesanan+'</span><span class="from">'+data[i].meja+'</span>'+
                                                '<p class="msg">Ada pesanan baru dari - '+data[i].nama_pemesan+'</p>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'
                    }
                    $('#target').html(baris);
                }
            });
        }

        $(document).ready( function () {
            $('#table_list').DataTable();
        } );

        $("#pilih_menu").change(function(){
            menu=$("#pilih_menu").val();
            $.ajax({
                url:"<?= base_url();?>Pelayan/ambildatamenu/"+menu,
                success:function(msg){
                    data=msg.split("|");
                    $("#id_menu").val(data[0]);
                    $("#nama_menu").val(data[1]);
                    $("#harga").val(data[2]);
                    $("#jumlah").focus();
                }
            });
        });
    </script>
</body>

</html>