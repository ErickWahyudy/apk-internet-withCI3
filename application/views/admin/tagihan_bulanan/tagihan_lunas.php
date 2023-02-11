<?php $this->load->view('template/header'); ?>

<?= $this->session->flashdata('pesan') ?>

<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4>
			<i class="icon fa fa-info"></i> Total Pembayaran Pelanggan Bulan <?= date('F'); ?> Tahun <?= date('Y'); ?> </h4>
		<h4>
		<?= rupiah($sum_tagihanLS);?>
		</h4>
	</div>
<div class="table-responsive">
 <table id="example1" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
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
                  <td><?= tgl_indo($tagihan['tgl_bayar']) ?></td>
                 <td>
                  <a href="<?= base_url('admin/tagihan/editLS/'.$tagihan['id_tagihan']) ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>  &nbsp; &nbsp;
                  <a href="../../struk/cetak_struk_bulanan/<?= $tagihan['id_tagihan']; ?>" target=" _blank" title="Cetak Struk" class="btn btn-primary">
									<i class="glyphicon glyphicon-print"></i> Struk</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="https://api.whatsapp.com/send?phone=<?= $tagihan['no_hp']; ?>&text=Terima kasih Sdr/i%20<?= $tagihan['nama']; ?>,%20
									Sudah melakukan pembayaran Tagihan%20hotspot%20KassandraWiFi%20untuk%20Bulan%20<?= $tagihan['bulan']; ?>%20Tahun%20<?= $tagihan['tahun']; ?>%0A
									Sebesar%20<?= rupiah($tagihan['tagihan']); ?> pada tanggal <?= tgl_indo($tagihan['tgl_bayar']) ?>%0A%0A
									Tetap nikmati layanan hotspot unlimited 24 jam non stop tanpa lemot kecuali saat wifi down dari KassandraWiFi.%0A%0A
									Anda juga bisa mendownload ataupun melihat struk pembayaran lunas tagihan di aplikasi KassandraWiFi%0A
									<?= base_url('struk/bayar_tagihan/'.$tagihan['id_tagihan']) ?> %0A%0A
									_Pesan ini dikirim otomatis oleh system aplikasi KassandraWifi._%0A
									-wifi@kassandra.my.id-"
								 	target=" _blank" title="Pesan WhatsApp" class="btn btn-success">
								 	 <i class="fa fa-whatsapp"> WA</i>
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
    'Desember',
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
  
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>