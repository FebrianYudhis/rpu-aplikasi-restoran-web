<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <?= $this->session->flashdata('pesan');?>
            <table id="listmenu" class="table table-hover table-bordered table-responsive-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama lengkap</th>
                        <th>Username</th>
                        <th>Id Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach($akun->result_array() as $a):
                        $cekidakses = $this->db->get_where('akses',['id_akses'=>$a['id_akses']])->row_array();
                    ?>
                    <tr>
                        <td><?= $no;?></td>
                        <td><?= $a['nama_lengkap'];?></td>
                        <td><?= $a['username'];?></td>
                        <td><?= $cekidakses['nama_akses'];?></td>
                        <td><a href="<?= base_url('Admin/edit/').$a['username'];?>" class="badge badge-info">Edit</a><a href="<?= base_url('Admin/hapus/').$a['username'];?>" class="badge badge-danger">Hapus</a></td>
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