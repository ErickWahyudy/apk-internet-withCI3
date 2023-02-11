<?php $this->load->view('template/header'); ?>

<?php 
if($aksi == "tambah"):
?>

<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 <tr>
	<th class="col-md-2">ID Informasi</th>
	<td>
		<input type="text" name="id_informasi" value="<?= $id_informasi ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Jenis Informasi</th>
	<td>
		<input type="text" name="informasi" class="form-control" placeholder="Jenis informasi" required="">
	</td>
</tr>


<tr>
	<td></td>
	<td>
		<a href="../" class="btn btn-warning">Kembali</a> &nbsp;&nbsp;
		<input type="submit" name="kirim" value="Submit" class="btn btn-success"> 
	</td>
</tr>

</form>
</table>

<?php 
elseif($aksi == "edit"):
?>	
<?= $this->session->flashdata('pesan') ?>
<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 <tr>
	<th class="col-md-2">ID Informasi</th>
	<td>
		<input type="text" name="id_informasi" value="<?= $id_informasi ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Jenis Informasi</th>
	<td>
		<input type="text" name="informasi" value="<?= $informasi ?>" class="form-control" required="">
	</td>
</tr>

<tr>
	<td></td>
	<td>
		<a href="../" class="btn btn-warning">Kembali</a> &nbsp;&nbsp;
		<a href="<?= base_url('admin/informasi_hapus/'.$id_informasi) ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i class="fa fa-trash"></i> Hapus</a> &nbsp;&nbsp;
		<input type="submit" name="kirim" value="Simpan" class="btn btn-success"> 
	</td>
</tr>

</form>
</table>

<?php 
elseif($aksi == "uploadfile"):
?>	
<?= $this->session->flashdata('pesan') ?>
<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 <tr>
	<th class="col-md-2">ID Informasi</th>
	<td>
		<input type="text" name="id_informasi" value="<?= $id_informasi ?> | <?= $informasi ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Upload file</th>
	<td>
		<input type="text" name="berkas" value="<?= $berkas ?>" class="form-control" readonly>
		<input type="file" name="berkas" value="<?= $berkas ?>" class="form-control" required="">
	</td>
</tr>

<tr>
	<td></td>
	<td>
		<a href="../" class="btn btn-warning">Kembali</a> &nbsp;&nbsp;
		<input type="submit" name="kirim" value="Simpan" class="btn btn-success"> 
	</td>
</tr>

</form>
</table>

<?php endif; ?>

<?php $this->load->view('template/footer'); ?>