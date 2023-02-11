<?php $this->load->view('template/header'); ?>

<?php 
if($aksi == "tambah"):

?>

<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 <tr>
	<th class="col-md-2">ID Pengeluaran</th>
	<td>
		<input type="text" name="id_pengeluaran" value="<?= $id_pengeluaran ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Jenis Pengeluaran</th>
	<td>
		<input type="text" name="jenis_pengeluaran" class="form-control" placeholder="Jenis pengeluaran" required="">
	</td>
</tr>
<tr>
	<th>Biaya</th>
	<td>
		<input type="number" name="biaya_pengeluaran" class="form-control" placeholder="Biaya pengeluaran" required="">
	</td>
</tr>
<tr>
	<th>Keterangan</th>
	<td>
		<select name="keterangan" class="form-control">
			<option value="Belum Saya Bayar">Belum Saya Bayar</option>
			<option value="LUNAS">LUNAS</option>
		</select>
	</td>
</tr>
<tr>
	<th>Tanggal</th>
	<td>
		<input type="date" name="tanggal" class="form-control" placeholder="Tanggal">
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
	<th class="col-md-2">ID Pengeluaran</th>
	<td>
		<input type="text" name="id_pengeluaran" value="<?= $id_pengeluaran ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Jenis Pengeluaran</th>
	<td>
		<input type="text" name="jenis_pengeluaran" value="<?= $jenis_pengeluaran ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>Biaya Pengeluaran</th>
	<td>
		<input type="number" name="biaya_pengeluaran" value="<?= $biaya_pengeluaran ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>Tanggal</th>
	<td>
		<input type="date" name="tanggal" value="<?= $tanggal ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>Keterangan</th>
	<td>
		<select name="keterangan" class="form-control">
			<option value="Belum Saya Bayar" <?php if($keterangan == "Belum Saya Bayar"){echo "selected";} ?>>Belum Saya Bayar</option>
			<option value="LUNAS" <?php if($keterangan == "LUNAS"){echo "selected";} ?>>LUNAS</option>
		</select>
	</td>
</tr>

<tr>
	<td></td>
	<td>
		<a href="../" class="btn btn-warning">Kembali</a> &nbsp;&nbsp;
		<a href="<?= base_url('admin/pengeluaran_hapus/'.$id_pengeluaran) ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i class="fa fa-trash"></i> Hapus</a> &nbsp;&nbsp;
		<input type="submit" name="kirim" value="Simpan" class="btn btn-success"> 
	</td>
</tr>

</form>
</table>

<?php endif; ?>

<?php $this->load->view('template/footer'); ?>