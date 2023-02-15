<?php $this->load->view('template/header'); ?>

<?php 
if($aksi == "lihat"):
?>
<?= $this->session->flashdata('pesan') ?>
<div id="map" style="width: auto; height: 300px;"></div>  
<a href="<?= base_url('pelanggan/profile/edit_map/'.$id_pelanggan) ?>" class="btn btn-warning"><i class="fa fa-map-marker"></i> Edit Lokasi</a>

<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 <tr>
	<th class="col-md-2">ID Pelanggan</th>
	<td>
		: <?= $id_pelanggan ?>
	</td>
</tr>
<tr>
	<th>Nama</th>
	<td>
		: <?= $nama ?>
	</td>
</tr>
<tr>
	<th>Alamat</th>
	<td>
		: <?= $alamat ?>
	</td>
</tr>
<tr>
	<th>No HP</th>
	<td>
		: <?= $no_hp ?>
	</td>
</tr>
<tr>
	<th>Tgl Daftar</th>
	<td>
		: <?= tgl_indo($terdaftar_mulai) ?></td>
	</td>
</tr>
<tr>
	<th>Paket Data</th>
	<td>
		:<?= $id_paket ?> | <?= $paket ?>
	</td>
</tr>
<tr>
	<th>Email</th>
	<td>
		: <?= $email ?>
	</td>
</tr>
<tr>
	<th>Password</th>
	<td>
		: <a href="<?= base_url('pelanggan/profile/ganti_password/'.$id_pelanggan) ?>" class="btn btn-info"><i class="fa fa-key"></i> Ganti Password</a>
	</td>
</tr>

<tr>
	<td></td>
	<td>
		<a href="../pelanggan/home" class="btn btn-primary">Kembali</a> &nbsp;&nbsp;
		<a href="<?= base_url('pelanggan/profile/edit/'.$id_pelanggan) ?>" class="btn btn-warning"><i class="fa fa-edit"> Perbarui Data</i></a> 
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
          map: map,
		  icon: '<?= base_url('template/marker.png') ?>',
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
elseif($aksi == "edit"):
?>	
<?= $this->session->flashdata('pesan') ?>

<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 <tr>
	<th class="col-md-2">ID Pelanggan</th>
	<td>
		<input type="text" name="id_pelanggan" value="<?= $id_pelanggan ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Paket Data</th>
	<td>
	<input type="text" name="id_paket" value="<?= $id_paket ?> | <?= $paket ?>" class="form-control" readonly>
	</td>
</tr>
<tr>
	<th>Tgl Daftar</th>
	<td>
		<input type="date" name="terdaftar_mulai" value="<?= $terdaftar_mulai ?>" class="form-control" readonly>
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
	<th>Email</th>
	<td>
		<input type="email" name="email" value="<?= $email ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>Ganti Password</th>
	<td>
	<a href="<?= base_url('pelanggan/profile/ganti_password/'.$id_pelanggan) ?>" class="btn btn-info"><i class="fa fa-key"></i> Ganti Password</a>
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
		<input type="submit" name="kirim" value="Simpan" class="btn btn-success"> 
	</td>
</tr>

</form>
</table>

<?php 
elseif($aksi == "ganti_pswd"):
?>	
<?= $this->session->flashdata('pesan') ?>
<table class="table table-reposive">
	<form action="" method="POST">
	<tr>
		<th class="col-md-3">Nama Pelanggan</th>
		<td>
			<input type="text" name="nama" class="form-control" value="<?= $nama ?>" readonly>
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
			<a href="<?= base_url('pelanggan/profile/edit/'.$id_pelanggan) ?>" class="btn btn-warning">Batal</a>
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
			<a href="../" class="btn btn-warning">Batal</a>
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
        map: peta,
		icon: '<?= base_url('template/marker.png') ?>',
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
<?php $this->load->view('template/footer'); ?>

<?php endif; ?>

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