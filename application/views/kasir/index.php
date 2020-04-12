<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
        <?= $this->session->flashdata('pesan');?>
            <table id="table_list" class="table table-bordered table-hover table-responsive-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nomor invoice</th>
                        <th>Nama pemesan</th>
                        <th>Meja</th>
                        <th>Tanggal pemesanan</th>
                        <th>Total</th>
                        <th>Dikelola oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach($list->result_array() as $l):
                    ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $l['no_invoice'];?></td>
                        <td><?= $l['nama_pemesan'];?></td>
                        <td><?= $l['meja'];?></td>
                        <td><?= $l['tanggal_pemesanan'];?></td>
                        <td>Rp. <?= $l['total'];?></td>
                        <td><?= $l['dikelola'];?></td>
                        <td><a href="<?= base_url('Kasir/invoice/').$l['no_invoice'];?>" class="badge badge-info">Cek</a></td>
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
