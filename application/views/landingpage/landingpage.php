<?php $this->load->view('landingpage/header') ?>

<!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                    <img class="img-fluid" src="<?= base_url('themes/kassandra-wifi') ?>/img/iklan1.jpg" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                    <img class="img-fluid" src="<?= base_url('themes/kassandra-wifi') ?>/img/iklan2.jpg" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                    <img class="img-fluid" src="<?= base_url('themes/kassandra-wifi') ?>/img/iklan3.jpg" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="3" aria-label="Slide 4">
                    <img class="img-fluid" src="<?= base_url('themes/kassandra-wifi') ?>/img/iklan4.jpg" alt="Image">
                </button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="<?= base_url('themes/kassandra-wifi') ?>/img/iklan1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4 animated zoomIn">Kami hadir untuk memenuhi</h4>
                            <h1 class="display-1 text-white mb-0 animated zoomIn">Kebutuhan internet yang semakin bertambah</h1>
                            <p><a href="register" class="btn btn-primary rounded-pill py-2 px-4 mt-4 animated zoomIn">Daftar sekarang</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?= base_url('themes/kassandra-wifi') ?>/img/iklan2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4 animated zoomIn">Komitmen kami adalah mengutamakan</h4>
                            <h1 class="display-1 text-white mb-0 animated zoomIn">kualitas dan kenyamanan pelanggan</h1>
                            <p><a href="register" class="btn btn-primary rounded-pill py-2 px-4 mt-4 animated zoomIn">Daftar sekarang</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?= base_url('themes/kassandra-wifi') ?>/img/iklan3.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4 animated zoomIn">layanan internet hotspot wifi</h4>
                            <h1 class="display-1 text-white mb-0 animated zoomIn">Berbasis kabel fiber optic & wireless</h1>
                            <p><a href="register" class="btn btn-primary rounded-pill py-2 px-4 mt-4 animated zoomIn">Daftar sekarang</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?= base_url('themes/kassandra-wifi') ?>/img/iklan4.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4 animated zoomIn">Memenuhi kebutuhan masyarakat dengan</h4>
                            <h1 class="display-1 text-white mb-0 animated zoomIn">Harga yang terjangkau</h1>
                            <p><a href="register" class="btn btn-primary rounded-pill py-2 px-4 mt-4 animated zoomIn">Daftar sekarang</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-certificate fa-4x text-primary mb-4"></i>
                        <h5 class="mb-3">Biaya Pemasangan</h5>
                        <h4 class="mb-3"><del style="color:red">Rp. 500.000</del></h4>
                        <h4 class="mb-3">Rp. 250.000</h4>
                        <h6 class="text-muted"><small>S&k berlaku</small></h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-check fa-4x text-primary mb-4"></i>
                        <h5 class="mb-3">Iuran Bulanan</h5>
                        <h4 class="mb-3">Rp. 100.000 s/d <br> Rp. 300.000</h4>
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
        </div>
    </div>
    <!-- Facts End -->


    <!-- About Start -->
    <!-- <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="img-border">
                        <img class="img-fluid" src="img/about.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                        <h1 class="display-6 mb-4">#1 Digital Solution With <span class="text-primary">10 Years</span> Of Experience</h1>
                        <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus dolor eos.</p>
                        <div class="d-flex align-items-center mb-4 pb-2">
                            <img class="flex-shrink-0 rounded-circle" src="img/team-1.jpg" alt="" style="width: 50px; height: 50px;">
                            <div class="ps-4">
                                <h6>Jhon Doe</h6>
                                <small>SEO & Founder</small>
                            </div>
                        </div>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
                <h1 class="display-6 mb-4">We Focuse On Making The Best In All Sectors</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="#">
                        <img class="img-fluid rounded mb-4" src="<?= base_url('themes/kassandra-wifi') ?>/img/1.jpg" alt="">
                        <h4 class="mb-0">KASSANDRA WIFI</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="#">
                        <img class="img-fluid rounded mb-4" src="<?= base_url('themes/kassandra-wifi') ?>/img/2.jpg" alt="">
                        <h4 class="mb-0">Game online stabil</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="#">
                        <img class="img-fluid rounded mb-4" src="<?= base_url('themes/kassandra-wifi') ?>/img/3.jpg" alt="">
                        <h4 class="mb-0">Menemani waktu santai</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="#">
                        <img class="img-fluid rounded mb-4" src="<?= base_url('themes/kassandra-wifi') ?>/img/4.jpg" alt="">
                        <h4 class="mb-0">Iuran bulanan yang terjangkau</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="#">
                        <img class="img-fluid rounded mb-4" src="<?= base_url('themes/kassandra-wifi') ?>/img/5.jpg" alt="">
                        <h4 class="mb-0">Teknisi yang stanbay 24 jam kecuali saat sibuk</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="#">
                        <img class="img-fluid rounded mb-4" src="<?= base_url('themes/kassandra-wifi') ?>/img/6.jpg" alt="">
                        <h4 class="mb-0">Let's join our us!</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h6 class="section-title bg-white text-start text-primary pe-3">Why Choose Us</h6>
                        <h1 class="display-6 mb-4">Mengapa harus memilih layanan kami !</h1>
                        <p class="mb-4">Kami selalu menjaga kualitas layanan hotspot wifi yang kami berikan, jaringan anti lemot kecuali saat wifi down. Teknisi andalan pilihan kami yang selalu stanbay. harga yang terjangkau adalah solusi kami untuk masyarakat</p>
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="skill">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Kualitas layanan</p>
                                        <p class="mb-2">85%</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="skill">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Kualitas teknisi</p>
                                        <p class="mb-2">85%</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="skill">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Kualitas jaringan hotspot wifi</p>
                                        <p class="mb-2">90%</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="img-border">
                        <img class="img-fluid" src="<?= base_url('themes/kassandra-wifi') ?>/img/iklan4.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

        <!-- Feedback Pelanggan -->
        <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Feedback Pelanggan</h6>
                <h1 class="display-6 mb-4">What Our Client Say</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <?php foreach($data->result_array() as $feedback): ?>
                <div class="testimonial-item bg-light rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" style="width:22%" src="<?= base_url('themes/kassandra-wifi') ?>/img/img/user.png" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">
                                <?= htmlentities(shortname($feedback['nama'])) ?>
                            </h5>
                            <span>
                                <?= htmlentities(tgl_indo($feedback['tanggal'])) ?>
                            </span>
                        </div>
                    </div>
                    <span>
                        <?= rating($feedback['nilai']) ?>
                    </span> <br>
                    <p class="mb-0">"
                         <?= htmlentities($feedback['feedback']) ?>
                        "</p>
                </div>
                <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Feedback Pelanggan End -->

    <!-- Transaction Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Transaction</h6>
                <h1 class="display-6 mb-4">What Our transaction say</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-light rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-square border p-1" style="width:50%" src="<?= base_url('themes/kassandra-wifi') ?>/img/img/transferbank.png" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Transfer Antar Bank</h5>
                            <span>Payment</span>
                        </div>
                    </div>
                    
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-square border p-1" style="width:50%" src="<?= base_url('themes/kassandra-wifi') ?>/img/img/dana.png" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Dana</h5>
                            <span>Payment</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-square border p-1" style="width:50%" src="<?= base_url('themes/kassandra-wifi') ?>/img/img/linkaja.png" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">LinkAja</h5>
                            <span>Payment</span>
                        </div>
                    </div>
                   
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-square border p-1" style="width:50%" src="<?= base_url('themes/kassandra-wifi') ?>/img/img/shopeepay.png" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">ShopeePay</h5>
                            <span>Payment</span>
                        </div>
                    </div>
                   
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-square border p-1" style="width:50%" src="<?= base_url('themes/kassandra-wifi') ?>/img/img/alfamart.png" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Alfamart</h5>
                            <span>Payment</span>
                        </div>
                    </div>
                    
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-square border p-1" style="width:50%" src="<?= base_url('themes/kassandra-wifi') ?>/img/img/indomaret.png" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Indomart</h5>
                            <span>Payment</span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Transaction End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Our Team</h6>
                <h1 class="display-6 mb-4">We Are A Creative Team For Your Dream Project</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center p-4">
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="<?= base_url('themes/kassandra-wifi') ?>/img/team-1.jpg" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Kassandra WiFi</h5>
                                <span>Manager</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item text-center p-4">
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="<?= base_url('themes/kassandra-wifi') ?>/img/team-2.jpg" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Kassandra WiFi</h5>
                                <span>Sales</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item text-center p-4">
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="<?= base_url('themes/kassandra-wifi') ?>/img/team-3.jpg" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Kassandra WiFi</h5>
                                <span>Teknisi</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

<?php $this->load->view('landingpage/footer') ?>


<?php
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

//membuat shortname
function shortname($name){
	$short = explode(" ", $name);
	$shortname = $short[0];
	return $shortname;
}

//menampilkan hasil nilai dengan format rating ( * )
function rating($nilai){
	$hasil = "";
	for ($i=0; $i < $nilai; $i++) { 
		$hasil .= "<span class='fa fa-star checked'></span>";
	}
	return $hasil;
}
?>