<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <div class="card">
                <div class="card-header">
                    Tambah menu baru
                </div>
                <div class="card-body">
                <?= $this->session->flashdata('pesan');?>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
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