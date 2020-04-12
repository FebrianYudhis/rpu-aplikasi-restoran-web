<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <?= $this->session->flashdata('pesan');?>
            <table id="listmenu" class="table table-hover table-bordered table-responsive-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama menu</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach($menu->result_array() as $m):
                        
                    ?>
                    <tr>
                        <td><?= $no;?></td>
                        <td><?= $m['nama_menu'];?></td>
                        <td><?= $m['jenis'];?></td>
                        <td><?= $m['harga'];?></td>
                        <td><img src="<?= base_url('assets/images/menu/').$m['gambar'];?>" class="img-thumbnail" width="100"></td>
                        <td><a href="<?= base_url('Pemilik/edit/').$m['id_menu'];?>" class="badge badge-info">Edit</a><a href="<?= base_url('Pemilik/hapus/').$m['id_menu'];?>" class="badge badge-danger">Hapus</a></td>
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