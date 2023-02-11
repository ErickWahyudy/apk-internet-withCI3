<?php $this->load->view('template/header'); ?>

<a href="<?= base_url('admin/pengeluaran/add/') ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<br /><br />
<?= $this->session->flashdata('pesan') ?>

<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4>
			<i class="icon fa fa-info"></i> Total Pengeluaran Tahun <?= date('Y'); ?> </h4>
		<h4>
		<?= rupiah($pengeluaran);?>
		</h4>
	</div>
<div class="table-responsive">
 <table id="example1" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Pengeluaran</th>
                  <th>Biaya</th>
                  <th>Bulan/Tahun</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                 <tbody>
                 <?php $no=1; foreach($data->result_array() as $pengeluaran): ?>
                 <tr>
                 <td><?= $no ?></td>
                  <td><?= $pengeluaran['jenis_pengeluaran'] ?></td>
                 <td><?= rupiah ($pengeluaran['biaya_pengeluaran']) ?></td>
                 <td>
                      <?php $stt = $pengeluaran['tanggal']  ?>
                        <?php if($stt == '0000-00-00'){ ?>
                          <span class="">-- / -- / ----</span>
                        <?php }elseif($stt = $pengeluaran['tanggal']){ ?>
                          <span class=""><?= tgl_indo($pengeluaran['tanggal']) ?></span>                 
                      <?php } ?>
                 </td>
                 <td>
                      <?php $stt = $pengeluaran['keterangan']  ?>
                        <?php if($stt == 'Belum Saya Bayar'){ ?>
                          <span class="label label-danger">Belum Saya Bayar</span>
                        <?php }elseif($stt == 'LUNAS'){ ?>
                          <span class="label label-success">Lunas</span>                  
                      <?php } ?>
                  </td>
                 <td>
                  <a href="<?= base_url('admin/pengeluaran/edit/'.$pengeluaran['id_pengeluaran']) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
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