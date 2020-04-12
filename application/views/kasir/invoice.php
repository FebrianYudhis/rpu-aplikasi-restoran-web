<?php
$cek = $lihat->row_array();
?>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header p-4">
                            <a class="pt-2 d-inline-block" href="index.html">hayu K enyang</a>
                            <div class="float-right"> <h3 class="mb-0">Invoice #<?= $cek['no_invoice'];?></h3>
                            Date: <?= $cek['tanggal_pemesanan'];?></div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <h5 class="mb-3">Dari :</h5>                                            
                                    <h3 class="text-dark mb-1"><?= $cek['meja'];?></h3>
                                    <div><?= $cek['nama_pemesan'];?></div>
                                </div>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Nama menu</th>
                                            <th class="right">Harga</th>
                                            <th class="center">Qty</th>
                                            <th class="right">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $tampil = $this->db->get_where('order_detail',['no_invoice'=>$cek['no_invoice']]);
                                            foreach($tampil->result_array() as $t):
                                            $menu = $this->db->get_where('menu',['id_menu'=>$t['id_menu']])->row_array();
                                        ?>
                                        <tr>
                                            <td class="center"><?= $no;?></td>
                                            <td class="left strong"><?= $menu['nama_menu'];?></td>
                                            <td class="right">Rp. <?= $menu['harga'];?></td>
                                            <td class="center"><?= $t['jumlah'];?></td>
                                            <td class="right">Rp. <?= $t['subtotal'];?></td>
                                        </tr>
                                        <?php
                                            $no++;
                                            endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5">
                                </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Total</strong>
                                                </td>
                                                <td class="right">
                                                    <strong class="text-dark">Rp. <?= $cek['total'];?></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <p class="mb-0">Invoice dari <b><i>hayu K enyang </i></b>Restaurant</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <a href="<?= base_url('Kasir/konfirmasi/').$cek['no_invoice'];?>" class="col-lg-12 btn btn-success">Sudah dibayar</a>
                </div>
            </div>
        </div>
    </div>
</div>