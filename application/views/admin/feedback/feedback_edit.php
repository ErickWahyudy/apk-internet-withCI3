<?php $this->load->view('template/header'); ?>

<?= $this->session->flashdata('pesan') ?>
<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 <tr>
	<th class="col-md-2">ID Feedback</th>
	<td>
		<input type="text" name="id_feedback" value="<?= $id_feedback ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Nama</th>
	<td>
		<input type="text" name="nama" value="<?= $nama ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>No HP / Email</th>
	<td>
		<input type="text" name="no_hp" value="<?= $no_hp ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Nilai</th>
	<td>
		<input type="number" name="nilai" value="<?= $nilai ?>" class="form-control" placeholder="penulisan nomor 6281123xxxxxx" required="">
	</td>
</tr>
<tr>
	<th>Feedback</th>
	<td>
		<textarea name="feedback" class="form-control" required=""><?= $feedback ?></textarea>
	</td>
<tr>
	<th>Tanggal</th>
	<td>
		<input type="date" name="tanggal" value="<?= $tanggal ?>" class="form-control" required="">
	</td>
</tr>


<tr>
	<td></td>
	<td>
		<a href="../" class="btn btn-warning">Kembali</a> &nbsp;&nbsp;
		<a href="<?= base_url('admin/feedback_hapus/'.$id_feedback) ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i class="fa fa-trash"> Hapus</i></a> &nbsp;&nbsp;
		<input type="submit" name="kirim" value="Simpan" class="btn btn-success"> 
	</td>
</tr>

</form>
</table>
<?php 
if($aksi == "edit"):
?>	
<!-- <span><i>Jika Gambar yang di edit Tidak Diis Di kosongkan Saja</i></span> -->
<?php endif; ?>

<?php $this->load->view('template/footer'); ?>