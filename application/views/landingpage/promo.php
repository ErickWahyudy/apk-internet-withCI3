<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $judul ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords"
        content="wifi kassandra my id, kassandra my id, kassandra wifi, kassandra, kassandra hd production, KASSANDRA, KASSANDRA HD PRODUCTION">
    <meta name="description"
        content="Layanan hotspot wifi unlimited 24 jam non stop tanpa lemot kecuali saat wifi down">
    <meta name="author" content="KASSANDRA, KASSANDRA HD PRODUCTION">
    <meta content='index,follow' name='robots' />

    <!-- Favicon -->
    <link href="<?= base_url('template/kassandra-wifi') ?>/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('template/kassandra-wifi') ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('template/kassandra-wifi') ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('template/kassandra-wifi') ?>/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('template/kassandra-wifi') ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('template/kassandra-wifi') ?>/css/style.css" rel="stylesheet">

    <!-- sweetalert -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

    <!-- ttd digital -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= base_url('template/kassandra-wifi') ?>/signature/js/jquery.signature.min.js"></script>
    <script type="text/javascript" src="<?= base_url('template/kassandra-wifi') ?>/signature/js/jquery.ui.touch-punch.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/kassandra-wifi') ?>/signature/css/jquery.signature.css">

    <style>
        .kbw-signature { width: 100%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
        #preview_ktp{
	    display:none;
		}
    </style>

</head>

<body>

    <!-- Spinner Start -->
    <!-- <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status">
        </div>
        <i class="fa fa-wifi fa-2x text-primary position-absolute top-50 start-50 translate-middle"></i>
    </div> -->
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <!-- <div class="container-fluid bg-light px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Career</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Terms</a></li>
                    <li class="breadcrumb-item"><a class="small text-secondary" href="#">Privacy</a></li>
                </ol>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn-square text-primary pe-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Topbar End -->


    <!-- Brand & Contact Start -->
    <div class="container-fluid py-4 px-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row align-items-center top-bar">
            <div class="col-lg-4 col-md-12 text-center text-lg-start">
                <a href="" class="navbar-brand m-0 p-0">
                    <h1 class="fw-bold text-primary m-0"><i class="fa fa-wifi" aria-hidden="true"></i> KASSANDRAWIFI
                    </h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
            </div>
            <div class="col-lg-8 col-md-7 d-none d-lg-block">
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                                <i class="far fa-clock text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Jam layanan</p>
                                <h6 class="mb-0">Senin - Jum'at, <br> 08:00 a.m - 16:00 p.m</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                                <i class="fa fa-phone text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Call Us</p>
                                <h6 class="mb-0"><a href="https://wa.me/6281456141227">0814 - 5614 - 1227</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                                <i class="far fa-envelope text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Email Us</p>
                                <h6 class="mb-0"><a href="mailto:wifi@kassandra.my.id">wifi@kassandra.my.id</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand & Contact End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
        <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto p-3 p-lg-0">
                <a href="landingpage" class="nav-item nav-link ">Home</a>
                <a href="promo" class="nav-item nav-link active">Promo</a>
                <a href="about" class="nav-item nav-link">About Us</a>
                <a href="service" class="nav-item nav-link">Services</a>
                <a href="project" class="nav-item nav-link">Projects</a>
                <a href="speedtest" class="nav-item nav-link">Speedtest</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="feedback" class="dropdown-item">Feedback</a>
                        <a href="lapor" class="dropdown-item">Lapor ada kendala</a>
                        <a href="feature" class="dropdown-item">Features</a>
                        <a href="team" class="dropdown-item">Our Team</a>
                        <a href="testimonial" class="dropdown-item">Testimonial</a>
                        <a href="404" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact" class="nav-item nav-link">Contact Us</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Login Aplikasi</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="login" target="" class="dropdown-item">Login</a>
                    </div>
                </div>
            </div>
            <a href="register" target="" class="btn btn-sm btn-light rounded-pill py-2 px-4">Daftar sekarang ?</a>
        </div>
    </nav>
    <!-- Navbar End -->

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
			<b>PROMO PEMASANGAN HOTSPOT WIFI KASSANDRAWIFI</b>
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
                        <h5 class="mb-3">Teknisi yang selalu standbay 24 jam jika ada kendala / masalah jaringan</h5>
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
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Daftar Sekarang</button>
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
$(window).on('load',function(){
    $('#exampleModal').modal('show');
});
</script>
    <!-- Register Start -->
    <div class="container-xxl">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Register Us</h6>
                <p class="text-center mb-4">*Pastikan anda mengisi data dengan benar dan lengkap agar proses registrasi anda dapat selesai dengan cepat</p>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="name@example.com" autocomplete="off" required>
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No HP / WA" value="62" autocomplete="off" required>
                                    <label for="no_hp">Nomor HP / WA</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Jln, Rt/Rw, Desa, Kecamatan, Kabupaten" required>
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
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email aktif" required>
                                    <label for="email">Email Aktif</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Password (bebas)" autocomplete="off" required>
                                    <label for="password">Password (bebas)</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <input type="file" class="form-control" style="background-color: white;" id="bukti_ktp" name="bukti_ktp" placeholder="bukti_ktp" autocomplete="off" onchange="previewKTP()" required>
                                    <label class="input-group-text" style="background-color: white;" for="bukti_ktp">Upload Bukti (foto terlihat jelas yaa)</label>
                                </div>
                                <img id="preview_ktp" alt="image preview" width="50%" />
                            </div>
                            <div class="col-12">
                                <div class="form-floating" >
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
                                <input type="submit" name="kirim" value="Daftar sekarang" class="btn btn-primary rounded-pill py-3 px-5">
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

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Ponorogo, Indonesia. 634 61</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0814 - 5614 - 1227</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>wifi@kassandra.my.id</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-0" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Gallery</h5>
                    <div class="row g-2">
                        <div class="col-4">
                            <img class="img-fluid rounded" src="<?= base_url('template/kassandra-wifi') ?>/img/1.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="<?= base_url('template/kassandra-wifi') ?>/img/2.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="<?= base_url('template/kassandra-wifi') ?>/img/3.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="<?= base_url('template/kassandra-wifi') ?>/img/4.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="<?= base_url('template/kassandra-wifi') ?>/img/5.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="<?= base_url('template/kassandra-wifi') ?>/img/6.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent border-secondary w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="any question ?" readonly>
                        <a href="contact" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">klik..</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <?php echo date('Y'); ?></span> <a href="#">KASSANDRAWIFI</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        <br>Distributed By: <a class="border-bottom" href="https://themewagon.com"
                            target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a> -->

<script>
     //ttd digital
     var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
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
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('template/kassandra-wifi') ?>/lib/wow/wow.min.js"></script>
    <script src="<?= base_url('template/kassandra-wifi') ?>/lib/easing/easing.min.js"></script>
    <script src="<?= base_url('template/kassandra-wifi') ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url('template/kassandra-wifi') ?>/lib/counterup/counterup.min.js"></script>
    <script src="<?= base_url('template/kassandra-wifi') ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url('template/kassandra-wifi') ?>/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('template/kassandra-wifi') ?>/js/main.js"></script>
</body>

</html>

<?php 

function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
}
?>
