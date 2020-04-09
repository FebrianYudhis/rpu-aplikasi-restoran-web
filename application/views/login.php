<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url();?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url();?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Halaman Login  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="<?= base_url();?>"><img class="logo-img" src="<?= base_url();?>assets/images/logo.jpg" alt="logo"></a><span class="splash-description">Masukkan Informasi Login Anda</span></div>
            <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
                <form action="<?= base_url();?>" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" type="text" placeholder="Masukkan Username" autocomplete="off" value="<?= set_value('username');?>">
                        <small class="text-danger"><?= form_error('username');?></small>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" type="password" placeholder="Masukkan Password" value="<?= set_value('password');?>">
                        <small class="text-danger"><?= form_error('password');?></small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Masuk</button>
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- Akhir Halaman Login  -->
    <!-- ============================================================== -->
</body>
 
</html>