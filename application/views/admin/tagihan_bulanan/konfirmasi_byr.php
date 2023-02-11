<?php $this->load->view('template/header'); ?>

<?= $this->session->flashdata('pesan') ?>

<div class="table-responsive">
 <table id="example1" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Bulan / Tahun</th>
                  <th>Tagihan</th>
                  <th>Status</th>
                  <th>Bukti Bayar</th>
                  <th>Tanggal Konfirmasi</th>
                </tr>
                </thead>
                 <tbody>
                 <?php $no=1; foreach($data->result_array() as $tagihan): ?>
                 <tr>
                 <td><?= $no ?></td>
                 <td><?= $tagihan['nama'] ?></td> 
                 <td><?= $tagihan['bulan'] ?> / <?= $tagihan['tahun'] ?></td>
                 <td><?= rupiah($tagihan['tagihan']); ?></td>
                 <td>
                    <?php $stt = $tagihan['status']  ?>
                        <?php if($stt == 'BL'){ ?>
                        <span class="label label-danger">Belum Bayar</span>
                          <?php }elseif($stt == 'LS'){ ?>
                          <span class="label label-success">Lunas</span>                  
                    <?php } ?>                                   
                 </td>
                <td>
                <a href="<?= base_url('template/bukti_bayar/'.$tagihan['bukti_bayar']) ?>" target="_blank">
                  <img src="<?= base_url('template/bukti_bayar/'.$tagihan['bukti_bayar']) ?>" class="img-responsive" style="width: 100px;height: 100xp">
                </td>
                <td><?= tgl_indo($tagihan['tgl_konfirmasi']) ?></td>
                                   
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
    'Desember',
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
  
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>