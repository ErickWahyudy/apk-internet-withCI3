<?php $this->load->view('template/header'); ?>

<a href="<?= base_url('admin/promo/edit/Z001wwj3B') ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit promo</a>
<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>
<div class="table-responsive">
 <table id="example1" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tgl Daftar</th>
                  <th>Status</th>
                  <th>Bukti KTP</th>
                  <th>Tanda Tangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                 <tbody>
                 <?php $no=1; foreach($data->result_array() as $pelanggan): ?>
                 <tr>
                 <td><?= $no ?></td>
                 <td><?= $pelanggan['id_pelanggan'] ?></td> 
                 <td><?= tgl_indo($pelanggan['tgl_daftar']) ?></td>
                 <td><?= $pelanggan['status'] ?></td>
                 <td>
                  <a href="<?= base_url('template/bukti_ktp/'.$pelanggan['bukti_ktp']) ?>" target="_blank">
                  <img src="<?= base_url('template/bukti_ktp/'.$pelanggan['bukti_ktp']) ?>" class="img-responsive" style="width: 100px;height: 100xp">
                  </a>
                 </td>
                 <td>
                  <a href="<?= base_url('template/signature/'.$pelanggan['signature']) ?>" target="_blank">
                  <img src="<?= base_url('template/signature/'.$pelanggan['signature']) ?>" class="img-responsive" style="width: 100px;height: 100xp">
                  </a>                           
                 <td>
                  <a href="<?= base_url('admin/promo/hapus/'.$pelanggan['id_promo']) ?>" class="btn btn-warning" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
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
 