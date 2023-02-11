<?php $this->load->view('template/header'); ?>

<?php 
if($aksi == "tambah"):
?>
<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 <tr>
	<th>ID Paket</th>
	<td>
		<input type="text" name="id_paket" value="<?= $id_paket ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Paket</th>
	<td>
		<input type="text" name="paket" class="form-control" placeholder="Paket" required="">
	</td>
</tr>
<tr>
	<th>Tarif</th>
	<td>
		<input type="number" name="tarif" class="form-control" placeholder="Tarif" required="">
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
	<th>ID Paket</th>
	<td>
		<input type="text" name="id_paket" value="<?= $id_paket ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Paket</th>
	<td>
		<input type="text" name="paket" value="<?= $paket ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>Tarif</th>
	<td>
		<input type="number" name="tarif" value="<?= $tarif ?>" class="form-control" required="">
	</td>
</tr>

<tr>
	<td></td>
	<td>
		<a href="../" class="btn btn-warning">Kembali</a> &nbsp;&nbsp;
		<a href="<?= base_url('admin/paket/hapus/'.$id_paket) ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i class="fa fa-trash"></i> Hapus</a> &nbsp;&nbsp;
		<input type="submit" name="kirim" value="Simpan" class="btn btn-success"> 
	</td>
</tr>

</form>
</table>

<?php endif; ?>

<?php $this->load->view('template/footer'); ?>