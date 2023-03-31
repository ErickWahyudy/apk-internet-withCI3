<?php $this->load->view('template/header'); ?>

<?php 
      $kode_tahun = date("Y");
?>

<center>
  <h3><?= ucfirst($judul) ?></h3>
   <hr />
</center>
<?= $this->session->flashdata('pesan') ?>

<table class="table">
  <form id="add" method="post">
   <tr>
    <th class="col-sm-2 control-label">Bulan</th>
    <td class="col-sm-10">
      <select name="bulan" class="form-control" required="">
 	        <option value="">--Pilih Bulan--</option>
 	        <?php foreach($bulan as $bln): ?>
          <option value="<?= $bln['id_bulan'] ?>">
				  <?= ucfirst($bln['bulan']) ?>
			    </option>
 	        <?php endforeach; ?>	
 	    </select>
    </td>
  </tr>
  <tr>
    <th>Tahun</th>
    <td>
      <input type="number" name="tahun" class="form-control" value="<?= $kode_tahun ?>" placeholder="tahun" required="">
    </td>
  </tr>
  <tr>
    <th></th>
    <td>
    <input type="submit" name="kirim" value="Buat tagihan" class="btn btn-success">
    </td>
  </tr>
</table>

<div class="table-responsive">
 <table id="" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Pelanggan</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Paket</th>
                  <th>Tagihan (Rp)</th>
                  <th>Status PLG</th>
                </tr>
                </thead>
                 <tbody>
                 <?php $no=1; foreach($data->result_array() as $tagihan): ?>
                 <tr>
                 <td><?= $no ?></td>
                 <td><input type="text" name="id_pelanggan[]" value="<?= $tagihan['id_pelanggan'] ?>" class="form-control" readonly></td> 
                 <td><input type="text" name="nama" value="<?= $tagihan['nama'] ?>" class="form-control" readonly></td>
                  <td><input type="text" name="email" value="<?= $tagihan['email'] ?>" class="form-control" readonly></td>
                  <td><input type="text" name="paket" value="<?= $tagihan['paket'] ?>" class="form-control" readonly></td>
                  <td><input type="text" name="tarif[]" value="<?= $tagihan['tarif'] ?>" class="form-control" readonly></td>
                  <td><input type="text" name="status_plg" value="<?= $tagihan['status_plg'] ?>" class="form-control" readonly></td>
                 </tr>
                 <?php $no++; endforeach; ?>
                 </tbody>
               </table>
</form>
</div>
<script>
        //add tagihan
        $(document).ready(function () {
        $('#add').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('admin/tagihan/api_add') ?>",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    $('#buat_tagihan');
                    $('#add')[0].reset();
                    swal({
                        title: "Berhasil",
                        text: "Data berhasil ditambahkan",
                        type: "success",
                        showConfirmButton: true,
                        confirmButtonText: "OKEE",
                    }).then(function () {
                        location.reload();
                    });
                }
            });
        });
    });
</script>
<?php $this->load->view('template/footer'); ?>