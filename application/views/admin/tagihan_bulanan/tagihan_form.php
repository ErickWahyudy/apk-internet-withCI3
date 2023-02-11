<?php $this->load->view('template/header'); ?>

<?= $this->session->flashdata('pesan') ?>
<?php 
if($aksi == "editBL"):
?>
<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 <tr>
	<th class="col-md-2">ID Tagihan</th>
	<td>
		<input type="text" name="id_tagihan" value="<?= $id_tagihan ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>ID Pelanggan</th>
	<td>
		<input type="text" name="id_pelanggan" value="<?= $id_pelanggan ?> | <?= $nama ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Bulan / Tahun</th>
	<td>
		<input type="text" name="bulan" value="<?= $bulan ?> / <?= $tahun ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Status</th>
	<td>
		<select name="status" class="form-control">
			<option value="BL" <?php if($status == "BL"){echo "selected";} ?>>Belum Di Bayar</option>
			<option value="LS" <?php if($status == "LS"){echo "selected";} ?>>LUNAS</option>
		</select>
</tr>
<tr>
	<th>Tgl bayar</th>
	<td>
		<input type="date" name="tgl_bayar" value="<?= $tgl_bayar ?>" class="form-control">
	</td>
</tr>
<tr>
	<th>tagihan</th>
	<td>
		<input type="number" name="tagihan" value="<?= $tagihan ?>" class="form-control">
	</td>
</tr>


<tr>
	<td></td>
	<td>
		<a href="../" class="btn btn-warning">Kembali</a> &nbsp;&nbsp;
		<a href="<?= base_url('admin/tagihan/hapus/'.$id_tagihan) ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i class="fa fa-trash"></i> Hapus</a> &nbsp;&nbsp;
		<input type="submit" name="kirim" value="Simpan" class="btn btn-success"> 
	</td>
</tr>

</form>
</table>

<?php 
elseif($aksi == "editLS"):
?>	
<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 <tr>
	<th class="col-md-2">ID Tagihan</th>
	<td>
		<input type="text" name="id_tagihan" value="<?= $id_tagihan ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>ID Pelanggan</th>
	<td>
		<input type="text" name="id_pelanggan" value="<?= $id_pelanggan ?> | <?= $nama ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Bulan / Tahun</th>
	<td>
		<input type="text" name="bulan" value="<?= $bulan ?> / <?= $tahun ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Status</th>
	<td>
		<select name="status" class="form-control" readonly>
			<option value="BL" <?php if($status == "BL"){echo "selected";} ?>>Belum Di Bayar</option>
			<option value="LS" <?php if($status == "LS"){echo "selected";} ?>>LUNAS</option>
		</select>
</tr>
<tr>
	<th>Tgl bayar</th>
	<td>
		<input type="date" name="tgl_bayar" value="<?= $tgl_bayar ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>tagihan</th>
	<td>
		<input type="number" name="tagihan" value="<?= $tagihan ?>" class="form-control" required="">
	</td>
</tr>


<tr>
	<td></td>
	<td>
		<a href="../lunas" class="btn btn-warning">Kembali</a> &nbsp;&nbsp;
		<a href="<?= base_url('admin/tagihan/hapus/'.$id_tagihan) ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i class="fa fa-trash"></i> Hapus</a> &nbsp;&nbsp;
		<input type="submit" name="kirim" value="Simpan" class="btn btn-success"> 
	</td>
</tr>

</form>
</table>
<?php endif; ?>

<?php $this->load->view('template/footer'); ?>