<?php $this->load->view('template/header'); ?>

<a href="<?= base_url('admin/pelanggan/add/') ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<a href="https://docs.google.com/spreadsheets/d/1y0-1HHY3ZVqvulj2Hgg42wN-VkUeCjygwx6EJvDQBFM/edit#gid=778747165" title="Tambah Data" class="btn btn-success" target="blank">
<i class="glyphicon glyphicon"></i> DATA GOOGLESHEET</a>
<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>
<div class="table-responsive">
 <table id="example1" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>Tgl Daftar</th>
                  <th>Email</th>
                  <th>Paket</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                 <tbody>
                 <?php $no=1; foreach($data->result_array() as $pelanggan): ?>
                 <tr>
                 <td><?= $no ?></td>
                 <td><?= $pelanggan['nama'] ?></td> 
                  <td><?= $pelanggan['alamat'] ?></td>
                 <!-- <td><?php if($pelanggan['jk'] == "L"){ echo "Laki-Laki";}else{ echo "Perempuan";} ?></td> -->
                 <td><?= $pelanggan['no_hp'] ?></td>
                 <!-- <td><img src="<?= base_url('template/data/'.$pelanggan['foto']) ?>" class="img-responsive" style="width: 100px;height: 100xp"></td> -->
                 <td><?= tgl_indo($pelanggan['terdaftar_mulai']) ?></td>
                 <td><?= $pelanggan['email'] ?></td>
                 <td><?= $pelanggan['paket'] ?></td>
                 <td><?= $pelanggan['status_plg'] ?></td>
                 <td>
                  <a href="<?= base_url('admin/pelanggan/edit/'.$pelanggan['id_pelanggan']) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
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

//format tanggal indonesia
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
  
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>
 