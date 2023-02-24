<?php $this->load->view('landingpage/header') ?>

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
                                <div class="form-floating">
                                <input type="checkbox" required> Saya memastikan data yang saya tuliskan sudah benar
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <input type="submit" name="kirim" value="Daftar sekarang" class="btn btn-primary rounded-pill py-3 px-5">
                            </div>
                            <p>Sudah punya akun ? <a href="<?= base_url('login') ?>">Login disini</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Register End -->

<?php $this->load->view('landingpage/footer') ?>