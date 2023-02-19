<?php $this->load->view('template/header'); ?>

<?php 
if($aksi == "lihat"):
?>
<?= $this->session->flashdata('pesan') ?>
<div id="map" style="width: auto; height: 300px;"></div>
<a href="<?= base_url('pelanggan/profile/edit_map/'.$id_pelanggan) ?>" class="btn btn-warning"><i
        class="fa fa-map-marker"></i> Edit Lokasi</a>

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
                : <?= htmlentities($nama) ?>
            </td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>
                : <?= htmlentities($alamat) ?>
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
                : <a href="" class="btn btn-info" data-toggle="modal" data-target="#ganti_password"><i
                        class="fa fa-key"></i> Ganti Password</a>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <a href="../pelanggan/home" class="btn btn-primary">Kembali</a> &nbsp;&nbsp;
                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editAkun"><i
                        class="fa fa-edit"></i> Perbarui Data</a>
            </td>
        </tr>

    </form>
</table>

<!-- Modal edit data akun -->
<div class="modal fade" id="editAkun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-purple">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit <?= $judul ?></h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped">
					<p class="text-danger">* Jika ingin mengubah paket internet yang diambil silahkan hubungi admin
						<a href="https://wifi.kassandra.my.id/contact" target="_blank">Klik Disini</a></p>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <tr>
                            <th>Nama</th>
						</tr>
						<tr>
                            <td>
                                <input type="text" name="nama" value="<?= $nama ?>" class="form-control" required="">
                            </td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
						</tr>
						<tr>
                            <td>
                                <input type="text" name="alamat" value="<?= $alamat ?>" class="form-control"
                                    required="">
                            </td>
                        </tr>
                        <tr>
                            <th>No HP</th>
						</tr>
						<tr>
                            <td>
                                <input type="text" name="no_hp" value="<?= $no_hp ?>" class="form-control"
                                    placeholder="penulisan nomor 6281123xxxxxx" required="">
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
						</tr>
						<tr>
                            <td>
                                <input type="email" name="email" value="<?= $email ?>" class="form-control" required="">
                            </td>
                        </tr>
                        <tr>
                            <th>Ganti Password</th>
						</tr>
						<tr>
                            <td>
                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#ganti_password"><i
                                        class="fa fa-key"></i> Ganti Password</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                &nbsp;&nbsp;
                                <input type="submit" name="kirim" value="Simpan" class="btn btn-success">
                            </td>
                        </tr>

                    </form>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->


<!-- Modal ganti password  -->
<div class="modal fade" id="ganti_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-purple">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ganti Password</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped">
                    <form action="<?= base_url('pelanggan/profile/ganti_password/'.$id_pelanggan) ?>" method="POST">
                        <tr>
                            <th class="col-md-12">Nama Pelanggan</th>
                        </tr>
                        <tr>
                            <td>
                                <p class="form-control"><?= $nama ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th>Masukkan Password Baru</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" id="password" name="password" class="form-control" required=""> 
								<input type="checkbox" onclick="viewPassword()"> Lihat Password
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                &nbsp;&nbsp;
                                <input type="submit" name="kirim" value="Simpan" class="btn btn-success">
                            </th>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script type="text/javascript">
//view password
function viewPassword() {
	var x = document.getElementById("password");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}
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

function taruhMarker(peta, posisiTitik) {

    if (marker) {
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
        center: new google.maps.LatLng(-7.95273788368736, 111.42980425660366),
        zoom: 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP
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