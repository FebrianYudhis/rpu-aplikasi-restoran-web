

    <!-- Awal area footer -->
    <footer class="footer-area" id="informasi">
        <div class="footer-widget section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-widget single-widget1">
                            <a href="index.html"><img src="<?= base_url();?>assets/images/logo2.png" alt=""></a>
                            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis leo magna, nec posuere massa condimentum at. Morbi maximus nunc sed erat pretium, ut hendrerit lorem sagittis. Duis id nisi vehicula </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-widget single-widget2 my-5 my-md-0">
                            <h5 class="mb-4">Kontak Kami</h5>
                            <div class="d-flex">
                                <div class="info-text">
                                    <p>bla bla bla Kalimantan Tengah</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="info-text">
                                    <p>12345678</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="info-text">
                                    <p>support@hayukenyang.site</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-widget single-widget3">
                            <h5 class="mb-4">Jam buka</h5>
                            <p>Senin - Jum'at  ............. 10.00 - 19.00 WIB </p>
                            <p>Sabtu ............. 10.00 - 20.00 WIB </p>
                            <p>Minggu ............. 12:00 - 19.00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made withby <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        Website dibuat oleh <b><i>Febrian Yudhistira</i></b>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Akhir area footer -->


    <!-- Javascript -->
    
    <script src="<?= base_url();?>assets/libs/js/jquery-2.2.4.min.js"></script>
	<script src="<?= base_url();?>assets/libs/js/bootstrap-4.1.3.min.js"></script>
    <script src="<?= base_url();?>assets/libs/js/wow.min.js"></script>
    <script src="<?= base_url();?>assets/libs/js/owl-carousel.min.js"></script>
    <script src="<?= base_url();?>assets/libs/js/main.js"></script>

    <script>
        $("#pilih_menu").change(function(){
            menu=$("#pilih_menu").val();
            $.ajax({
                url:"<?= base_url();?>pelanggan/ambildata/"+menu,
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