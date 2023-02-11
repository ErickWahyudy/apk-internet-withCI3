<?php $this->load->view('template/header'); ?>

<?php 
if($aksi == "edit"):
?>	
<?= $this->session->flashdata('pesan') ?>
<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 <tr>
	<th class="col-md-2">ID Promo</th>
	<td>
		<input type="text" name="id_promo" value="<?= $id_promo ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Biaya Pemasangan</th>
	<td>
		<input type="text" name="biaya_promo" value="<?= $biaya_promo ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>Status</th>
	<td>
		<input type="text" name="status" value="<?= $status ?>" class="form-control" readonly>
		<input type="radio" name="status" value="promo"> Promo
		<input type="radio" name="status" value="tidak ada promo"> Tidak Ada Promo
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