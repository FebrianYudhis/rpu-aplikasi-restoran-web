<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <div class="card">
                <div class="card-header">
                    Tambah akun baru
                </div>
                <div class="card-body">
                <?= $this->session->flashdata('pesan');?>
                    <form action="<?=base_url('Admin/tambah');?>" method="POST">
                        <div class="form-group">
                            <label>Username :</label>
                            <input type="text" class="form-control" placeholder="Masukkan username" name="username" value="<?= set_value('username');?>">
                            <small class="text-danger"><?= form_error('username');?></small>
                        </div>
                        <div class="form-group">
                            <label>Nama lengkap :</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama lengkap" name="nama" value="<?= set_value('nama');?>">
                            <small class="text-danger"><?= form_error('nama');?></small>
                        </div>
                        <div class="form-group">
                            <label>Password :</label>
                            <input type="password" class="form-control" placeholder="Masukkan password" name="password" value="<?= set_value('password');?>">
                            <small class="text-danger"><?= form_error('password');?></small>
                        </div>
                        <div class="form-group">
                            <label>Akses :</label>
                            <select class="form-control" name="id_akses">
                                <?php
                                    foreach($akses->result_array() as $a):
                                ?>
                                <option value="<?= $a['id_akses'];?>"><?= $a['nama_akses'];?></option>
                                <?php
                                    endforeach;
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary col-lg-12">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <div class="card">
                <div class="card-header">
                    Tambah menu baru
                </div>
                <div class="card-body">
                <?= $this->session->flashdata('pesan');?>
                    <form action="<?=base_url('Pemilik/tambah');?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama menu :</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama menu" name="nama_menu" value="<?= set_value('nama_menu');?>">
                            <small class="text-danger"><?= form_error('nama_menu');?></small>
                        </div>
                        <div class="form-group">
                            <label>Jenis menu:</label>
                            <select class="form-control" name="jenis">
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Harga :</label>
                            <input type="number" class="form-control" placeholder="Masukkan harga" name="harga" value="<?= set_value('harga');?>">
                            <small class="text-danger"><?= form_error('nama_menu');?></small>
                        </div>
                        <div class="form-group">
                            <label>Gambar :</label>
                            <input type="file" class="form-control" name="gambar">
                        </div>
                        <button type="submit" class="btn btn-primary col-lg-12">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>