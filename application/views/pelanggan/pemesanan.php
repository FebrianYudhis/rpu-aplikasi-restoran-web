
    <!-- Area pemesanan -->
    <section class="table-area section-padding" id="pemesanan">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>Pesan <span>Disini</span></h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('pesan'); ?>
                    <form action="<?= base_url();?>pelanggan" method="POST">
                        <div class="form-group">
                            <label class="text-primary">Nama pemesan :</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama pemesan" name="nama_pemesan">
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Lanjut</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir area pemesanan -->

