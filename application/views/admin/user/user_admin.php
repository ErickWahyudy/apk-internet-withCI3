<?php $this->load->view('template/header'); ?>

<a href="<?= base_url('admin/user_admin/tambah/') ?>" class="btn btn-primary">Tambah Hak Akses</a>
<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>
<div class="table-responsive">
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Hak Akses</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($data->result_array() as $admin): ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $admin['username'] ?></td>
            <td><?= $admin['nama'] ?></td>
            <td><?= ucfirst($admin['level']) ?></td>
            <td><a href="<?= base_url('admin/user_admin/edit/'.$admin['id_pengguna']) ?>" class="btn btn-info">Edit</a> <a
                    href="<?= base_url('admin/user_admin/hapus/'.$admin['id_pengguna']) ?>"
                    class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a></td>
        </tr>
        <?php $no++; endforeach; ?>
    </tbody>
</table>

<?php $this->load->view('template/footer'); ?>