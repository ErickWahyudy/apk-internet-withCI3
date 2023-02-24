<?php $this->load->view('landingpage/header') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Feedback</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Feedback</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <?= $this->session->flashdata('pesan'); ?>
    <!-- Feedback Start -->
    <div class="container-xxl">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Feedback Us</h6>
                <p class="text-center mb-4">*Berikan penilaianmu kepada kami untuk menjaga, meningkatkan kualitas layanan kami.</p>
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
                            <div class="col-md-12">
                                <div class="form-group" style="border: 2px solid #E5E4E2; border-radius: 4px;">
                               <label for="nilai" class="form-label">Berikan Penilaianmu Untuk Kami <br>
							    <small>1 = Jelek - 10 = Sangat baik</small></label> <br>
                                <!-- <input type="range" class="form-range" min="0" max="10" id="nilai" name="nilai" required> -->
                                <input type="radio" value="1" name="nilai" id="nilai" required> 1
                                <input type="radio" value="2" name="nilai" id="nilai" required> 2
                                <input type="radio" value="3" name="nilai" id="nilai" required> 3
                                <input type="radio" value="4" name="nilai" id="nilai" required> 4
                                <input type="radio" value="5" name="nilai" id="nilai" required> 5
                                <input type="radio" value="6" name="nilai" id="nilai" required> 6
                                <input type="radio" value="7" name="nilai" id="nilai" required> 7
                                <input type="radio" value="8" name="nilai" id="nilai" required> 8
                                <input type="radio" value="9" name="nilai" id="nilai" required> 9
                                <input type="radio" value="10" name="nilai" id="nilai" required> 10
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea type="text" style="height: 100pt;" class="form-control" id="feedback" name="feedback" placeholder="Tuliskan apa yang sudah baik dan perlu ditingkatkan lagi" required></textarea>
                                    <label for="feedback">Tuliskan apa yang sudah baik dan perlu ditingkatkan lagi</label>
                                </div>
                            </div>
                            
                            <div class="col-12 text-center">
                                <input type="submit" name="kirim" value="Kirim feedback" class="btn btn-primary rounded-pill py-3 px-5">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Register End -->

<?php $this->load->view('landingpage/footer') ?>
