<div class="dashboard-wrapper">
    <div class="card mt-4">
        <h5 class="card-header">Menu Pemesanan :</h5>
        <div class="card-body">
            <!-- Area pemesanan -->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-top2 text-center">
                                <h3>Pesan <span>Disini</span></h3>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <?= $this->session->flashdata('pesan'); ?>
                            <?= validation_errors('<div class="error">', '</div>'); ?>
                            <form action="<?= base_url();?>Pelayan/tambah" method="POST">
                                <div class="form-group">
                                    <label class="text-primary">Nama pemesan :</label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama pemesan" name="nama_pemesan">
                                </div>
                                <div class="form-group">
                                <label class="text-primary">Meja :</label>
                                    <select class="form-control" name="meja">
                                        <?php
                                            foreach($meja->result_array() as $m):
                                        ?>
                                        <option><?= $m['username'];?></option>
                                        <?php
                                            endforeach;
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary form-control">Lanjut</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Akhir area pemesanan -->
        </div>
    </div>
</div>