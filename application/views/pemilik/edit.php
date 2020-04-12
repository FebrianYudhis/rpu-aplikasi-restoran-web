<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <div class="card">
                <div class="card-header">
                    Edit menu 
                </div>
                <div class="card-body">
                <?= $this->session->flashdata('pesan');?>
                    <form action="<?=base_url('Pemilik/edit/').$menu['id_menu'];?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id_menu" value="<?= $menu['id_menu'];?>">
                            <label>Nama menu :</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama menu" name="nama_menu" value="<?= $menu['nama_menu'];?>">
                            <small class="text-danger"><?= form_error('nama_menu');?></small>
                        </div>
                        <div class="form-group">
                            <label>Jenis menu:</label>
                            <select class="form-control" name="jenis">
                            <option value="Makanan" <?php if($menu['jenis']=="Makanan"){echo 'selected';} ?>>Makanan</option>
                            <option value="Minuman" <?php if($menu['jenis']=="Minuman"){echo 'selected';} ?>>Minuman</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Harga :</label>
                            <input type="number" class="form-control" placeholder="Masukkan harga" name="harga" value="<?= $menu['harga'];?>">
                            <small class="text-danger"><?= form_error('nama_menu');?></small>
                        </div>
                        <div class="form-group">
                            <label>Gambar :</label>
                            <input type="file" class="form-control" name="gambar">
                            <input type="hidden" name="gambarlama" value="<?= $menu['gambar'];?>">
                            <h1>Gambar sebelumnya <img src="<?= base_url('assets/images/menu/').$menu['gambar'];?>" class="img-thumbnail ml-4 mt-4" width="200"></h1>
                        </div>
                        <button type="submit" class="btn btn-primary col-lg-12">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>