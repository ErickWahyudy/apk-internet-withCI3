<?php $this->load->view('template/header'); ?>

<a href="<?= base_url('admin/tagihan_lain/add/') ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<a href="<?= base_url('email/sendmail_bl_lain') ?>" class="btn btn-warning"><i class="fa fa-envelope"></i> Kirim Email</a>
<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>

<div class="table-responsive">
 <table id="example1" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Pelangan</th>
                  <th>Total Biaya</th>
                  <th>Status</th>
                  <th>Tgl Bayar</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                 <tbody>
                 <?php $no=1; foreach($data->result_array() as $tagihan_lain): ?>
                 <tr>
                 <td><?= $no ?></td>
                 <td><?= $tagihan_lain['nama'] ?></td>
                 <td><?= rupiah($tagihan_lain['tagihan']); ?></td>
                 <td>
                    <?php $stt = $tagihan_lain['status']  ?>
                        <?php if($stt == 'BL'){ ?>
                        <span class="label label-danger">Belum Bayar</span>
                          <?php }elseif($stt == 'LS'){ ?>
                          <span class="label label-success">Lunas</span>                  
                    <?php } ?>                                   
                 </td>
                  <td>
                      <?php $stt = $tagihan_lain['tgl_bayar']  ?>
                        <?php if($stt == '0000-00-00'){ ?>
                          <span class="">-- / -- / ----</span>
                        <?php }elseif($stt = $tagihan_lain['tgl_bayar']){ ?>
                          <span class=""><?= tgl_indo($tagihan_lain['tgl_bayar']) ?></span>                 
                      <?php } ?>
                  </td>
                  <td><?= $tagihan_lain['keterangan'] ?></td>
                 <td>
                  <a href="<?= base_url('admin/tagihan_lain/edit/'.$tagihan_lain['id_tagihan_lain']) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>&nbsp; &nbsp;
                  <a href="<?= base_url('struk/cetak_struk_tagihan_lain/'.$tagihan_lain['id_tagihan_lain']) ?>" class="btn btn-info" target="_blank"><i class="fa fa-print"></i></a> <br>
                  <a href="https://api.whatsapp.com/send?phone=<?= $tagihan_lain['no_hp']; ?>&text=Terima kasih Sdr/i%20<?= $tagihan_lain['nama'] ?>, Sudah mempercayai layanan kami ( KassandraWiFi )
                  Berikut adalah total biaya <?= $tagihan_lain['keterangan']; ?> anda : <?= rupiah($tagihan_lain['tagihan']); ?> dengan status tagihan <?php $stt = $tagihan_lain['status'] ?> <?php if($stt == 'BL'){ ?>*Belum di bayar*. <?php }elseif($stt == 'LS'){ ?>LUNAS.<?php } ?>
                  %0ATetap nikmati layanan hotspot unlimited 24 jam non stop tanpa lemot dari KassandraWiFi.
                  %0A%0AAnda juga bisa mendownload ataupun melihat struk total biaya anda di aplikasi KassandraWiFi
                  %0A<?= base_url('struk/cetak_struk_tagihan_lain/'.$tagihan_lain['id_tagihan_lain']) ?>
                  
                  %0A%0A_Pesan ini dikirim otomatis oleh system aplikasi KassandraWiFi._
                  %0A-wifi@kassandra.my.id-" target=" _blank" title="Pesan WhatsApp" class="btn btn-success">
                        <b>Whatsapp</b>
                    </a>
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