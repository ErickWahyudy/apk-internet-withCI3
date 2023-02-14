<?php $this->load->view('template/header'); ?>

<?php 
if($aksi == "tambah"):
?>
<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 <tr>
	<th class="col-md-2">ID Pelanggan</th>
	<td>
		<input type="text" name="id_pelanggan" value="<?= $id_pelanggan ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Nama</th>
	<td>
		<input type="text" name="nama" class="form-control" placeholder="Nama lengkap" required="">
	</td>
</tr>
<tr>
	<th>Alamat</th>
	<td>
		<input type="text" name="alamat" class="form-control" placeholder="Alamat lengkap" required="">
	</td>
</tr>
<tr>
	<th>No HP</th>
	<td>
		<input type="text" name="no_hp" class="form-control" placeholder="Penulisan nomor 6281123xxxxxx" required="">
	</td>
</tr>
<tr>
	<th>Tgl Daftar</th>
	<td>
		<input type="date" name="terdaftar_mulai" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>Paket Data</th>
	<td>
		<select name="id_paket" class="form-control" required="">
 	        <option value="">--Pilih Paket--</option>
 	            <?php foreach($paket as $pkt): ?>
                <option value="<?= $pkt['id_paket'] ?>">
				<?= ucfirst($pkt['id_paket']) ?> |
				<?= ucfirst($pkt['paket']) ?> |
				<?= ucfirst($pkt['tarif']) ?>
			</option>
 	        	<?php endforeach; ?>	
 	    </select>
	</td>
</tr>
<tr>
	<th>Email</th>
	<td>
		<input type="email" name="email" class="form-control" placeholder="Email yang aktif" required="">
	</td>
</tr>
<tr>
	<th>Password</th>
	<td>
		<input type="password" name="password" value="" class="form-control" placeholder="bebas yang penting mudah diingat" placeholder="Masukkan passwordmu" required="">
	</td>
</tr>

<!-- <tr><th>Foto</th><td>
	<?php 
      if($aksi == "edit"){
        echo '<img src="'.base_url('template/data/'.$foto).'" class="img-responsive" style="width:200px;height:200px">';
      }else{

      }
	?>
<input type="file" name="gambar" value="" class="form-control">
</td></tr> -->

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
<div id="map" style="width: auto; height: 300px;"></div>  
<a href="../edit_map/<?= $id_pelanggan ?>" class="btn btn-warning"><i class="fa fa-map-marker"></i> Edit Lokasi</a>

<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 <tr>
	<th>ID Pelanggan</th>
	<td>
		<input type="text" name="id_pelanggan" value="<?= $id_pelanggan ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Nama</th>
	<td>
		<input type="text" name="nama" value="<?= $nama ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>Alamat</th>
	<td>
		<input type="text" name="alamat" value="<?= $alamat ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>No HP</th>
	<td>
		<input type="text" name="no_hp" value="<?= $no_hp ?>" class="form-control" placeholder="penulisan nomor 6281123xxxxxx" required="">
	</td>
</tr>
<tr>
	<th>Tgl Daftar</th>
	<td>
		<input type="date" name="terdaftar_mulai" value="<?= $terdaftar_mulai ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>Paket Data</th>
	<td>
		<select name="id_paket" class="form-control" required="">
 	        <option value="">--Pilih Paket--</option>
 	            <?php foreach($paket as $pkt): ?>
                <option value="<?= $pkt['id_paket'] ?>" <?php if($pkt['id_paket'] == $id_paket){echo "selected";} ?>>
				<?= ucfirst($pkt['id_paket']) ?> |
				<?= ucfirst($pkt['paket']) ?> |
				<?= ucfirst($pkt['tarif']) ?>
			</option>
 	        	<?php endforeach; ?>	
 	    </select>
	</td>
</tr>
<tr>
	<th>Email</th>
	<td>
		<input type="email" name="email" value="<?= $email ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>Status</th>
	<td> 
		<input type="text" name="status_plg" value="<?= $status_plg ?>" class="form-control" readonly>
		<input type="radio" name="status_plg" value="aktif"> Aktif 
		<input type="radio" name="status_plg" value="Tidak Aktif"> Tidak Aktif
	</td>
</tr>
<tr>
	<th>Ganti Password</th>
	<td>
	<a href="<?= base_url('admin/pelanggan/ganti_password/'.$id_pelanggan) ?>" class="btn btn-info"><i class="fa fa-key"></i> Ganti Password</a>
	</td>
</tr>

<!-- <tr><th>Foto</th><td>
	<?php 
      if($aksi == "edit"){
        echo '<img src="'.base_url('template/data/'.$foto).'" class="img-responsive" style="width:200px;height:200px">';
      }else{

      }
	?>
<input type="file" name="gambar" value="" class="form-control">
</td></tr> -->

<tr>
	<td></td>
	<td>
		<a href="../" class="btn btn-warning">Kembali</a> &nbsp;&nbsp;
		<a href="<?= base_url('admin/pelanggan/hapus/'.$id_pelanggan) ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i class="fa fa-trash"> Hapus</i></a> &nbsp;&nbsp;
		<input type="submit" name="kirim" value="Simpan" class="btn btn-success"> 
	</td>
</tr>

</form>
</table>


<script type="text/javascript">


    //menampilkan data maps berdasarkan id_pelanggan dengan select
	var locations = [
	  ['<h4><?= $nama ?></h4><p><?= $alamat ?></p>', <?= $latitude ?>, <?= $longitude ?>],
	];
			
 
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 18,
        center: new google.maps.LatLng(<?= $latitude ?>, <?= $longitude ?>),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
 
      var infowindow = new google.maps.InfoWindow();
 
      var marker, i;
 
      for (i = 0; i < locations.length; i++) {  
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          map: map
        });
 
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
          }
        })(marker, i));
      }
    </script>

<?php 
elseif($aksi == "ganti_pswd"):
?>	
<table class="table table-reposive">
	<form action="" method="POST">
	<tr>
		<th class="col-md-3">Nama Pelanggan</th>
		<td>
			<input type="text" name="nama" class="form-control" value="<?= $nama ?>" readonly>
		</td>
	</tr>
	<tr>
		<th>Password lama</th>
		<td>
			<input type="text" name="password" class="form-control" value="<?= $password ?>" readonly>
		</td>
	</tr>
	<tr>
		<th>Masukkan Password Baru</th>
		<td>
			<input type="password" name="password" class="form-control" value="<?= $password ?>">
		</td>
	</tr>
    <tr>
		<td></td>
		<th>
			<a href="<?= base_url('admin/pelanggan/edit/'.$id_pelanggan) ?>" class="btn btn-warning">Batal</a>
			<input type="submit" name="kirim" value="Simpan" class="btn btn-success">
		</th>
	</tr>
    </form>	 
</table>

<?php 
elseif($aksi == "edit_lokasi"):
?>
<table class="table table-reposive">
	<form action="" method="POST">
	<tr>
		<th class="col-md-3">Nama Pelanggan</th>
		<td>
			<input type="text" name="nama" class="form-control" value="<?= $nama ?>" readonly>
		</td>
	</tr>
	<tr>
	<div id="googleMap" style="width:100%;height:380px;"></div>
	<input type="hidden" id="lat" name="latitude" value="">
    <input type="hidden" id="lng" name="longitude" value="">
	</tr>
	<tr>
		<td></td>
		<th>
			<a href="<?= base_url('admin/pelanggan/edit/'.$id_pelanggan) ?>" class="btn btn-warning">Batal</a>
			<input type="submit" name="kirim" value="Simpan" class="btn btn-success">
		</th>
	</tr>
	</form>
</table>

<script>
// variabel global marker
var marker;
  
function taruhMarker(peta, posisiTitik){
    
    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
      });
    }
  
     // isi nilai koordinat ke form
    document.getElementById("lat").value = posisiTitik.lat();
    document.getElementById("lng").value = posisiTitik.lng();
    
}
  
function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(-7.95273788368736, 111.42980425660366),
    zoom:16,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });

}


// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
  

</script>

<?php endif; ?>

<?php $this->load->view('template/footer'); ?>