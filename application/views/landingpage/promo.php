<?php $this->load->view('landingpage/header') ?>

<!-- ttd digital -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
    rel="stylesheet">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url('template/kassandra-wifi') ?>/signature/js/jquery.signature.min.js">
</script>
<script type="text/javascript"
    src="<?= base_url('template/kassandra-wifi') ?>/signature/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css"
    href="<?= base_url('template/kassandra-wifi') ?>/signature/css/jquery.signature.css">

<style>
.kbw-signature {
    width: 100%;
    height: 200px;
}

#sig canvas {
    width: 100% !important;
    height: auto;
}

#preview_ktp {
    display: none;
}
</style>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-3">Register</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Register</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<?= $this->session->flashdata('pesan'); ?>

<?php foreach($status as $stt_promo): ?>
<?php if($stt_promo['status'] == 'promo'){ ?>
<!-- Modal iklan -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align:center">
                    <b>PROMO PEMASANGAN HOTSPOT WIFI</b>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Facts Start -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Daftar Sekarang</button>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fa fa-certificate fa-4x text-primary mb-4"></i>
                            <h5 class="mb-3">Biaya Pemasangan</h5>
                            <h4 class="mb-3"><del style="color:red">Rp. 350.000,00</del></h4>
                            <?php foreach($biaya_promo as $promo): ?>
                            <h4 class="mb-3"><?= rupiah($promo['biaya_promo']); ?></h4>
                            <?php endforeach; ?>
                            <h6 class="text-muted"><small>S&k berlaku</small></h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fa fa-check fa-4x text-primary mb-4"></i>
                            <h5 class="mb-3">Iuran Bulanan</h5>
                            <h4 class="mb-3">Rp. 80.000 s/d <br> Rp. 300.000</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fa fa-users-cog fa-4x text-primary mb-4"></i>
                            <h5 class="mb-3">Teknisi yang selalu standbay 24 jam jika ada kendala / masalah jaringan
                            </h5>
                            <h4 class="mb-3">*kecuali saat sibuk</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fa fa-link fa-4x text-primary mb-4"></i>
                            <h5 class="mb-3">Jaringan Stabil</h5>
                            <h4 class="mb-3">karena berbasis fiber optic</h4>
                        </div>
                    </div>
                </div>
                <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="container text-center">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <i class="fa fa-exclamation-triangle fa-3x display-1 text-primary"></i>
                                <h2 class="mb-4">Promo sedang berlangsung !!</h2> <br>
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Daftar
                                    Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
<script>
//auto show modal
$(window).on('load', function() {
    $('#exampleModal').modal('show');
});
</script>
<!-- Register Start -->
<div class="container-xxl">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Register Us</h6>
            <p class="text-center mb-4">*Pastikan anda mengisi data dengan benar dan lengkap agar proses registrasi anda
                dapat selesai dengan cepat <br>
                *Siapkan foto KTP / kartu tanda lainnya untuk proses verifikasi
            </p>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="name@example.com" autocomplete="off" required>
                                <label for="nama">Nama Lengkap</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="no_hp" name="no_hp"
                                    placeholder="No HP / WA" value="62" autocomplete="off" required>
                                <label for="no_hp">Nomor HP / WA</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="Jln, Rt/Rw, Desa, Kecamatan, Kabupaten" required>
                                <label for="alamat">Alamat</label>
                            </div>
                        </div>
                        <div class="form-floating">
                            <select name="id_paket" class="form-select" required="">
                                <option value="">--Pilih Paket--</option>
                                <?php foreach($paket as $pkt): ?>
                                <option value="<?= $pkt['id_paket'] ?>">
                                    Paket <?= ucfirst($pkt['id_paket']) ?> |
                                    <?= ucfirst( rupiah($pkt['tarif']) ) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingSelect">Paket internet yg ingin diambil</label>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email aktif" required>
                                <label for="email">Email Aktif</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="password" name="password"
                                    placeholder="Password (bebas)" autocomplete="off" required>
                                <label for="password">Password (bebas)</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <input type="file" class="form-control" style="background-color: white;" id="bukti_ktp"
                                    name="bukti_ktp" placeholder="bukti_ktp" autocomplete="off" onchange="previewKTP()"
                                    required>
                                <label class="input-group-text" style="background-color: white;" for="bukti_ktp">Upload
                                    Bukti (foto terlihat jelas yaa)</label>
                            </div>
                            <img id="preview_ktp" alt="image preview" width="50%" />
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <div id="sig" style="border: 2px solid #E5E4E2; border-radius: 4px;" required></div>
                                <textarea id="signature64" name="signed" style="display: none" required></textarea> <br>
                                <button id="clear" class="btn-warning">ulangi ttd</button>
                                <label for="signature">Tanda Tangan</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="checkbox" required> Saya memastikan data yang saya tuliskan sudah benar
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <input type="submit" name="kirim" value="Daftar sekarang"
                                class="btn btn-primary rounded-pill py-3 px-5">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Register End -->

<?php }elseif($stt_promo['status'] == 'tidak ada promo'){ ?>
<!-- Register Start -->
<div class="container-xxl">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Register Us</h6>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">
                <center>
                    <h2>PROMO SUDAH BERAKHIR, NANTIKAN PROMO PERIODE BERIKUTNYA..</h2>
                    <a href="landingpage" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back Home</a>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- Register End -->

<?php }endforeach; ?>
<script>
//ttd digital
var sig = $('#sig').signature({
    syncField: '#signature64',
    syncFormat: 'PNG'
});
$('#clear').click(function(e) {
    e.preventDefault();
    sig.signature('clear');
    $("#signature64").val('');
});
//preview gambar
function previewKTP() {
    document.getElementById("preview_ktp").style.display = "block";
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("bukti_ktp").files[0]);

    oFReader.onload = function(oFREvent) {
        document.getElementById("preview_ktp").src = oFREvent.target.result;
    };

};
</script>

<?php $this->load->view('landingpage/footer'); ?>

<?php 

function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
}
?>