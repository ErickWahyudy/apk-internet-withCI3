<?php $this->load->view('template/header'); ?>

<a href="<?= base_url('admin/paket/add/') ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>
<div class="table-responsive">
 <table id="example1" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID</th>
                  <th>Paket</th>
                  <th>Tarif</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                 <tbody>
                 <?php $no=1; foreach($data->result_array() as $admin): ?>
                 <tr>
                 <td><?= $no ?></td>
                 <td><?= $admin['id_paket'] ?></td> 
                  <td><?= $admin['paket'] ?></td>
                 <td><?= rupiah ($admin['tarif']) ?></td>
                 <td>
                  <a href="<?= base_url('admin/paket/edit/'.$admin['id_paket']) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
                </td>
                 </tr>
                 <?php $no++; endforeach; ?>
                 </tbody>
               </table>
<?php $this->load->view('template/footer'); ?>
 
<?php 

function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
}