<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="ecommerce-widget">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Pendapatan bulan ini</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">Rp. <?= $jumlahpendapatan['sum(total)'];?></h1>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Pemesanan bulan ini</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1"><?= $jumlahpemesanan;?> Pesanan</h1>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Jumlah menu saat ini</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1"><?= $jumlahmenu;?> Menu</h1>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Daftar riwayat transaksi</h5>
                            </div>

                            <div class="row ml-2 mt-4">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Mulai Tanggal</label>
                                        <input type="date" class="form-control" id="dari">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Sampai Tanggal</label>
                                        <input type="date" class="form-control" id="sampai">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="listtransaksi" class="table table-bordered table-hover table-responsive-sm" style="width:100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Nomor invoice</th>
                                                <th>Nama pemesan</th>
                                                <th>Meja</th>
                                                <th>Tanggal pemesanan</th>
                                                <th>Total</th>
                                                <th>Dikelola</th>
                                            </tr>
                                        </thead>
                                        <tbody id="target">
                                            <?php
                                                $no = 1;
                                                foreach($semuaorder->result_array() as $so):
                                            ?>
                                            <tr>
                                                <td><?= $no;?></td>
                                                <td><?= $so['no_invoice'];?></td>
                                                <td><?= $so['nama_pemesan'];?></td>
                                                <td><?= $so['meja'];?></td>
                                                <td><?= $so['tanggal_pemesanan'];?></td>
                                                <td>Rp. <?= $so['total'];?></td>
                                                <td><?= $so['dikelola'];?></td>
                                            </tr>
                                            <?php
                                                $no++;
                                                endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>