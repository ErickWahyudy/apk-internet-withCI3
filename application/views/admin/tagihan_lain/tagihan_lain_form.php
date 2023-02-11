<?php $this->load->view('template/header'); ?>

<?php 
if($aksi == "tambah"):
?>
<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 <tr>
	<th class="col-md-2">ID Tagihan Lain</th>
	<td>
		<input type="text" name="id_tagihan_lain" value="<?= $id_tagihan_lain ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Nama Pelanggan</th>
	<td>
		<select name="id_pelanggan" class="form-control" required="">
 	        <option value="">--Pilih Pelanggan--</option>
 	            <?php foreach($pelanggan as $plg): ?>
                <option value="<?= $plg['id_pelanggan'] ?>">
				<?= ucfirst($plg['id_pelanggan']) ?> |
				<?= ucfirst($plg['nama']) ?>
			</option>
 	        	<?php endforeach; ?>	
 	    </select>
	</td>
</tr>
<tr>
	<th>Tagihan</th>
	<td>
		<input type="number" name="tagihan" class="form-control" placeholder="Total biaya tagihan" required="">
	</td>
</tr>
<tr>
	<th>Status</th>
	<td>
		<select name="status" class="form-control" required="">
 	        <option value="">--Pilih Status--</option>
 	            <option value="BL">Belum Lunas</option>
 	            <option value="LS">Lunas</option>
 	    </select>
	</td>
</tr>
<tr>
	<th>Tgl Bayar</th>
	<td>
		<input type="date" name="tgl_bayar" class="form-control">
	</td>
</tr>
<tr>
	<th>keterangan</th>
	<td>
		<input type="text" name="keterangan" class="form-control" placeholder="Tagihan lainnya ?" required="">
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
	<th class="col-md-2">ID Tagihan Lain</th>
	<td>
		<input type="text" name="id_tagihan_lain" value="<?= $id_tagihan_lain ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>ID Pelanggan</th>
	<td>
		<input type="text" name="id_pelanggan" value="<?= $id_pelanggan ?> | <?= $nama ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Status</th>
	<td>
		<select name="status" class="form-control">
			<option value="BL" <?php if($status == "BL"){echo "selected";} ?>>Belum Saya Bayar</option>
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
	<th>Keterangan</th>
	<td>
		<input type="text" name="keterangan" value="<?= $keterangan ?>" class="form-control" required="">
	</td>
</tr>

<tr>
	<td></td>
	<td>
		<a href="../" class="btn btn-warning">Kembali</a> &nbsp;&nbsp;
		<a href="<?= base_url('admin/tagihan_lain_hapus/'.$id_tagihan_lain) ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i class="fa fa-trash"></i> Hapus</a> &nbsp;&nbsp;
		<input type="submit" name="kirim" value="Simpan" class="btn btn-success"> 
	</td>
</tr>

</form>
</table>

<?php endif; ?>

<?php $this->load->view('template/footer'); ?>