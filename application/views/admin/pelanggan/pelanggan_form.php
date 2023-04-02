<?php $this->load->view('template/header'); ?>

<?php 
if($aksi == "edit"):
?>
<?= $this->session->flashdata('pesan') ?>
<div id="map" style="width: auto; height: 300px;"></div>
<a href="../edit_map/<?= $id_pelanggan ?>" class="btn btn-warning"><i class="fa fa-map-marker"></i> Edit Lokasi</a>

<table class="table table-striped">
    <form id="edit" method="post">
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
                <input type="text" name="no_hp" value="<?= $no_hp ?>" class="form-control"
                    placeholder="penulisan nomor 6281123xxxxxx" required="">
            </td>
        </tr>
        <tr>
            <th>Tgl Daftar</th>
            <td>
                <input type="date" name="terdaftar_mulai" value="<?= $terdaftar_mulai ?>" class="form-control"
                    required="">
            </td>
        </tr>
        <tr>
            <th>Paket Data</th>
            <td>
                <select name="id_paket" class="form-control" required="">
                    <option value="">--Pilih Paket--</option>
                    <?php foreach($paket as $pkt): ?>
                    <option value="<?= $pkt['id_paket'] ?>"
                        <?php if($pkt['id_paket'] == $id_paket){echo "selected";} ?>>
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
                <a href="" class="btn btn-info" data-toggle="modal" data-target="#ganti_password"><i
                        class="fa fa-key"></i> Ganti Password</a>
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
                <input type="submit" name="kirim" value="Simpan" class="btn btn-success"> &nbsp;&nbsp;
                <a href="javascript:void(0)" onclick="hapuspelanggan('<?= $id_pelanggan ?>')"
                                        class="btn btn-danger">Hapus</a>
            </td>
        </tr>

    </form>
</table>

<!-- Modal untuk ganti password dengan mengambil data dari controller -->
<div class="modal fade" id="ganti_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-purple">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ganti Password</h4>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <form id="password" method="post">
                            <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>" class="form-control" readonly>
                            <tr>
                                <th>Password Lama</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="passwordlama" value="<?= $password ?>"
                                        class="form-control" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>Password Baru</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" name="password"
                                        class="form-control" required="">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                    &nbsp;&nbsp;
                                    <button type="submit" name="kirim" class="btn btn-success">Simpan</button>
                                </td>
                            </tr>

                        </form>
                    </table>
                </div>
        </div>
    </div>
</div>
<!-- End Modal -->


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
        icon: '<?= base_url('themes/marker.png') ?>',
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
    <form id="edit_map" method="post">
        <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>" class="form-control" readonly>
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

function taruhMarker(peta, posisiTitik) {

    if (marker) {
        // pindahkan marker
        marker.setPosition(posisiTitik);
    } else {
        // buat marker baru
        marker = new google.maps.Marker({
            position: posisiTitik,
            map: peta,
            icon: '<?= base_url('themes/marker.png') ?>',
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
<script>
        //edit data
        $(document).on('submit', '#edit', function(e) {
        e.preventDefault();
        var form_data = new FormData(this);

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/pelanggan/api_edit/') ?>" + form_data.get('id_pelanggan'),
            dataType: "json",
            data: form_data,
            processData: false,
            contentType: false,
            //memanggil swall ketika berhasil
            success: function(data) {
                $('#edit' + form_data.get('id_pelanggan'));
                swal({
                    title: "Berhasil",
                    text: "Data Berhasil Diubah",
                    type: "success",
                    showConfirmButton: true,
                    confirmButtonText: "OKEE",
                }).then(function() {
                    location.reload();
                });
            },
            //memanggil swall ketika gagal
            error: function(data) {
                swal({
                    title: "Gagal",
                    text: "Data Gagal Diubah",
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonText: "OKEE",
                }).then(function() {
                    location.reload();
                });
            }
        });
    });

        //ajax ganti password
        $(document).on('submit', '#password', function(e) {
        e.preventDefault();
        var form_data = new FormData(this);

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/pelanggan/api_ubah_password/') ?>" + form_data.get('id_pelanggan'),
            dataType: "json",
            data: form_data,
            processData: false,
            contentType: false,
            //memanggil swall ketika berhasil
            success: function(data) {
                $('#password' + form_data.get('id_pelanggan'));
                swal({
                    title: "Berhasil",
                    text: "Berhasil perbarui password",
                    type: "success",
                    showConfirmButton: true,
                    confirmButtonText: "OKEE",
                }).then(function() {
                    location.reload();
                });
            },
            //memanggil swall ketika gagal
            error: function(data) {
                swal({
                    title: "Gagal",
                    text: "Gagal perbarui password",
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonText: "OKEE",
                }).then(function() {
                    location.reload();
                });
            }
        });
    });

    //edit map
    $(document).on('submit', '#edit_map', function(e) {
        e.preventDefault();
        var form_data = new FormData(this);

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/pelanggan/api_edit_maps/') ?>" + form_data.get('id_pelanggan'),
            dataType: "json",
            data: form_data,
            processData: false,
            contentType: false,
            //memanggil swall ketika berhasil
            success: function(data) {
                $('#edit_map' + form_data.get('id_pelanggan'));
                swal({
                    title: "Berhasil",
                    text: "Data Berhasil Diubah",
                    type: "success",
                    showConfirmButton: true,
                    confirmButtonText: "OKEE",
                }).then(function() {
                    location.href = "<?= site_url('admin/pelanggan/edit/') ?>" + form_data.get('id_pelanggan');
                });
            },
            //memanggil swall ketika gagal
            error: function(data) {
                swal({
                    title: "Gagal",
                    text: "Data Gagal Diubah",
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonText: "OKEE",
                }).then(function() {
                    location.reload();
                });
            }
        });
    });


        //ajax hapus pelanggan
        function hapuspelanggan(id_pelanggan) {
        swal({
            title: "Apakah Anda Yakin?",
            text: "Data Akan Dihapus",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak, Batalkan!",
            closeOnConfirm: false,
            closeOnCancel: true // Set this to true to close the dialog when the cancel button is clicked
        }).then(function(result) {
            if (result.value) { // Only delete the data if the user clicked on the confirm button
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('admin/pelanggan/api_hapus/') ?>" + id_pelanggan,
                    dataType: "json",
                }).done(function() {
                    swal({
                        title: "Berhasil",
                        text: "Data Berhasil Dihapus",
                        type: "success",
                        showConfirmButton: true,
                        confirmButtonText: "OKEE"
                    }).then(function() {
                        location.href = "<?= site_url('admin/pelanggan') ?>";
                    });
                }).fail(function() {
                    swal({
                        title: "Gagal",
                        text: "Data Gagal Dihapus",
                        type: "error",
                        showConfirmButton: true,
                        confirmButtonText: "OKEE"
                    }).then(function() {
                        location.reload();
                    });
                });
            } else { // If the user clicked on the cancel button, show a message indicating that the deletion was cancelled
                swal("Batal hapus", "Data Tidak Jadi Dihapus", "error");
            }
        });
    }
    </script>
<?php $this->load->view('template/footer'); ?>