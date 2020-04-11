
<div class="dashboard-wrapper mt-4">
    <div class="container-fluid mt-4">
        <?= $this->session->flashdata('pesan');?>
        <div class="col-lg-12"><h1>List pesanan</h1></div>
            <table id="table_list" class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>No invoice</th>
                        <th>Nama Pemesan</th>
                        <th>Meja</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach($list->result_array() as $l):
                    ?>
                    <tr>
                        <td><?= $no;?></td>
                        <td><?= $l['no_invoice'];?></td>
                        <td><?= $l['nama_pemesan'];?></td>
                        <td><?= $l['meja'];?></td>
                        <td><?= $l['tanggal_pemesanan'];?></td>
                        <td><a href="<?= base_url('Pelayan/invoice/').$l['no_invoice'];?>" class="badge badge-info">Cek</a></td>
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
