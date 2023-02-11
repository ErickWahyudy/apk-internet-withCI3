<?php $this->load->view('template/header'); ?>

<?= $this->session->flashdata('pesan') ?>

<div class="table-responsive">
 <table id="example1" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Bulan / Tahun</th>
                  <th>Tagihan</th>
                  <th>Status</th>
                  <th>Tgl Bayar</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                 <tbody>
                 <?php $no=1; foreach($data->result_array() as $tagihan): ?>
                 <tr>
                 <td><?= $no ?></td>
                 <td><?= tgl_indo($tagihan['tgl_bayar']) ?></td>
                 <td><?= rupiah($tagihan['tagihan']); ?></td>
                 <td>
                    <?php $stt = $tagihan['status']  ?>
                        <?php if($stt == 'BL'){ ?>
                        <span class="label label-danger">Belum Bayar</span>
                          <?php }elseif($stt == 'LS'){ ?>
                          <span class="label label-success">Lunas</span>                  
                    <?php } ?>                                   
                 </td>
                  <td><?php $stt = $tagihan['tgl_bayar']  ?>
                        <?php if($stt == '0000-00-00'){ ?>
                        <span >00-00-0000</span>
                          <?php }elseif($stt == $tagihan['tgl_bayar']){ ?>
                          <span><?= tgl_indo($tagihan['tgl_bayar']) ?></span>                  
                    <?php } ?>  
                    </td>
                 <td>
                 <?php $stt = $tagihan['status']  ?>
                        <?php if($stt == 'BL'){ ?>
                        <span><a href="<?= base_url('struk/cetak_struk_tagihan_lain/'.$tagihan['id_tagihan_lain']) ?>" class="btn btn-warning"><i class="fa fa-money"></i> Bayar tagihan</a></span>
                          <?php }elseif($stt == 'LS'){ ?>
                          <span><a href="<?= base_url('struk/cetak_struk_tagihan_lain/'.$tagihan['id_tagihan_lain']) ?>" class="btn btn-info" target="_blank"><i class="fa fa-print" ></i> Cetak Struk</a></span>                  
                    <?php } ?>
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