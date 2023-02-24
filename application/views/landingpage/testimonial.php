<?php $this->load->view('landingpage/header') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Testimonial</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Testimonial</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


        <!-- Feedback Pelanggan -->
        <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Feedback Pelanggan</h6>
                <h1 class="display-6 mb-4">What Our Client Say</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tb_feedback order by id_feedback desc");
                  while ($data = $sql->fetch_assoc()) {
            ?> 
                <div class="testimonial-item bg-light rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" style="width:22%" src="dist/img/user.png" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1"><?php echo shortname ($data['nama']); ?></h5>
                            <span><?php echo tanggal ($data['tanggal']); ?></span> 
                        </div>
                    </div>
                    <span><?php echo rating($data['nilai']); ?></span> <br>
                    <p class="mb-0">"<?php echo $data['feedback']; ?>"</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Feedback Pelanggan End -->

<?php $this->load->view('landingpage/footer') ?>