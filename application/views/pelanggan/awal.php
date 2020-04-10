<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>hayu K enyang</title>

    <!-- Ikon -->
    <link rel="shortcut icon" href="<?= base_url();?>assets/images/logo2.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url();?>assets/libs/css/animate-3.7.0.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/libs/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/libs/css/owl-carousel.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/libs/css/style2.css">
</head>
<body>
    <!-- Awal loading -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Akhir loading -->

    <!-- Awal area header -->
	<header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="index.html"><img src="<?= base_url();?>assets/images/logo.jpg" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>  
                    <div class="main-menu">
                        <ul>
                            <li><a href="<?= base_url();?>">Home</a></li>
                            <li><a href="#menu">Menu</a></li>
                            <li><a href="#pemesanan">Pesan</a>
                            <li><a href="#informasi">Informasi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Akhir area header -->

    <!-- Awal area banner -->
    <section class="banner-area text-center" style="background-color:rgb(222, 60, 60)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6>Kami menjual beragam jenis makanan dan minuman</h6>
                    <h1>Jelahi <span class="prime-color"> Rasa</span><br>  
                    <span class="style-change">Dari <span class="prime-color">hayu </span> K <span class="prime-color">enyang </span></span></h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir area banner -->

    <!-- Awal area selamat datang -->
    <section class="welcome-area section-padding2" id="menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <div class="welcome-img">
                        <img src="<?= base_url();?>assets/images/welcome.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="welcome-text mt-5 mt-md-0">
                        <h3><span class="style-change">Selamat Datang</span> <br>Di hayu K enyang</h3>
                        <p class="pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis leo magna, nec posuere massa condimentum at. Morbi maximus nunc sed erat pretium, ut hendrerit lorem sagittis. Duis id nisi vehicula, ullamcorper arcu sed, vehicula turpis. Quisque condimentum, risus at rhoncus efficitur, velit mi convallis tortor, sit amet lacinia augue velit et leo. Mauris quis ipsum lectus. </p>
                        <a href="#pemesanan" class="template-btn mt-3">Pesan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir area ucapan selamat datang -->

    <!-- Awal area makanan -->
    <section class="food-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="section-top">
                        <h3><span class="style-change">Kami menyajikan</span> <br>Makanan yang</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                    foreach($makanan->result_array() as $m):
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="single-food mt-5 mt-sm-0">
                        <div class="food-img">
                            <img src="<?= base_url();?>assets/images/menu/<?= $m['gambar'];?>" class="img-fluid" alt="">
                        </div>
                        <div class="food-content">
                            <div class="d-flex justify-content-between">
                                <h5><?= $m['nama_menu'];?></h5>
                            </div>
                            <p class="style-change">Rp. <?= $m['harga'];?></p>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
        
    </section>
    <!-- Akhir area makanan -->

    <!-- Awal area minuman -->
    <div class="food-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>Minuman <span>spesial</span> kami</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                    foreach($minuman->result_array() as $minuman):
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="single-food">
                        <div class="food-img">
                            <img src="<?= base_url();?>assets/images/menu/<?= $minuman['gambar'];?>" class="img-fluid" alt="">
                        </div>
                        <div class="food-content">
                            <div class="d-flex justify-content-between">
                                <h5><?= $minuman['nama_menu'];?></h5>
                            </div>
                            <p class="style-change">Rp. <?= $minuman['harga'];?></p>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
    </div>
    <!-- Akhir area minuman -->
