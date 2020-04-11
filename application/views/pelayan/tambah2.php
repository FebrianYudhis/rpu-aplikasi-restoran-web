<div class="dashboard-wrapper">
    <div class="card mt-4">
        <h5 class="card-header">Menu Pemesanan :</h5>
        <div class="card-body">
            <!-- Area pemesanan -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-top2 text-center">
                            <h3>Pesan <span>Disini</span></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="text-success">Pilih Menu</label>
                        <select class="form-control" id="pilih_menu">
                        <option>-Pilih Menu-</option>
                        <?php
                            foreach($menu->result_array() as $m):
                        ?>
                        <option value="<?= $m['id_menu'];?>"><?= $m['nama_menu'];?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                    </div>
                    <div class="form-group ml-3">
                        <label class="text-success">Nomor Invoice</label>
                        <p class="form-control"><?= $this->session->userdata('no_invoice');?></p>
                    </div>
                    <div class="form-group ml-3">
                        <label class="text-success">Nama Pemesan</label>
                        <p class="form-control"><?= $this->session->userdata('nama_pemesan');?></p>
                    </div>
                    <div class="form-group ml-3">
                        <label class="text-success">Tanggal</label>
                        <p class="form-control"><?= $this->session->userdata('tanggal');?></p>
                    </div>
                </div>
                <form method="POST" action="<?= base_url();?>Pelayan/tambah">
                    <div class="row">
                        <input type="hidden" readonly value="" id="id_menu" name="id_menu">
                        <div class="form-group">
                            <label class="text-success">Nama Menu</label>
                            <input class="form-control" type="text" readonly value="" id="nama_menu" name="menu">
                        </div>
                        <div class="form-group ml-3">
                            <label class="text-success">Harga</label>
                            <input class="form-control" type="text" readonly value="" id="harga" name="harga">
                        </div>
                        <div class="form-group ml-3">
                            <label class="text-success">Jumlah porsi</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                        </div>
                        <button type="submit" class="btn btn-primary ml-4">Pesan</button>
                    </div>
                </form>
                
                <div class="row mt-4">
                    <div class="col-lg-12">
                            <?= $this->session->flashdata('pesan');?>
                    </div>
                    <table class="table table-hover table-bordered text-success table-responsive-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Menu</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>SubTotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach($kotak->result_array() as $k):
                                $getmenu = $this->db->get_where('menu',['id_menu'=>$k['id_menu']])->row_array();
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $getmenu['nama_menu'];?></td>
                                <td>Rp. <?= $getmenu['harga'];?></td>
                                <td><?= $k['jumlah'];?></td>
                                <td>Rp. <?= $k['subtotal'];?></td>
                                <td><a href="<?= base_url('Pelayan/hapuspesanan/').$k['no_order'];?>" class="badge badge-danger">Hapus</a></td>
                            </tr>
                            <?php
                                $no++;
                                endforeach;
                            ?>
                            <tr>
                                <td colspan="4">Total</td>
                                <td colspan="1">Rp. <?= $total['subtotal'];?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row col-lg-12">
                <small class="text text-warning"><i><b>Apabila data di dalam tabel ini bukan pesanan anda,langsung klik "selesai" agar dapat memesan dengan nomor orderan yang baru</b></i></small>
                </div>

                <div class="row col-lg-12 mt-3">
                <a href="<?= base_url();?>Pelayan/selesai" class="btn btn-success form-control">Selesai</a>
                </div>
            </div>
            <!-- Akhir area pemesanan -->
        </div>
    </div>
</div>