<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $judul ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="keywords" content="wifi kassandra my id, kassandra my id, kassandra wifi, kassandra, kassandra hd production, KASSANDRA, KASSANDRA HD PRODUCTION">
  <meta name="description" content="Layanan hotspot wifi unlimited 24 jam non stop tanpa lemot kecuali saat wifi down">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 4.5.2 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Favicon -->
  <link href="<?= base_url('themes/kassandra-wifi') ?>/img/favicon.ico" rel="icon">

  <!-- sweetalert -->
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
</head>
<body style="background: url('<?= base_url('themes/kassandra-wifi/img/img/bgmember.jpg') ?>') no-repeat center center fixed; background-size: cover;">
<div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                      <img src="<?= base_url('themes/kassandra-wifi/img/img/komp.png') ?>" width="170px" alt="Logo">
                        <h5 class="card-title">
                          <b>
                          APLIKASI TAGIHAN INTERNET <br>
                          (KASSANDRA WIFI)
                          </b>
                        </h5>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('pesan') ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Email / Username / No HP" required="" autocomplete="off">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                  </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="" autocomplete="off">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                  </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                            <div class="form-group mt-2">
                                <a href="<?= base_url('reset_password') ?>">Lupa password?</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                      <p>
                        <strong>Copyright &copy; <?php echo date('Y'); ?>
                        <a href="https://bit.ly/kassandrahdproduction" target="_blank">KassandraWifi</a>.</strong> All rights reserved.
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Tautan ke file JavaScript Bootstrap 4 (jika diperlukan) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
