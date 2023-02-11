<?php $this->load->view('template/header'); ?>

<?= $this->session->flashdata('pesan') ?>
<?php 
if($aksi == "tagihan"):
?>
<div class="table-responsive">
    <table id="example1" class="table table-bordered  table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Bulan / Tahun</th>
                <th>Tagihan</th>
                <th>Status</th>
                <th>Tgl Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($data->result_array() as $tagihan): ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $tagihan['bulan'] ?> / <?= $tagihan['tahun'] ?></td>
                <td><?= rupiah($tagihan['tagihan']); ?></td>
                <td>
                    <?php $stt = $tagihan['status']  ?>
                    <?php if($stt == 'BL'){ ?>
                    <span class="label label-danger">Belum Bayar</span>
                    <?php }elseif($stt == 'LS'){ ?>
                    <span class="label label-success">Lunas</span>
                    <?php } ?>
                </td>
                <td><?php $stt = $tagihan['tgl_bayar']  ?>
                    <?php if($stt == '0000-00-00'){ ?>
                    <span>00-00-0000</span>
                    <?php }elseif($stt == $tagihan['tgl_bayar']){ ?>
                    <span><?= tgl_indo($tagihan['tgl_bayar']) ?></span>
                    <?php } ?>
                </td>
                <td>
                    <?php $stt = $tagihan['status']  ?>
                    <?php if($stt == 'BL'){ ?>
                    <span><a href="<?= base_url('pelanggan/tagihan/bayar/'.$tagihan['id_tagihan']) ?>"
                            class="btn btn-warning"><i class="fa fa-money"></i> Bayar tagihan</a></span>
                    <?php }elseif($stt == 'LS'){ ?>
                    <span><a href="<?= base_url('struk/cetak_struk_bulanan/'.$tagihan['id_tagihan']) ?>"
                            class="btn btn-info" target="_blank"><i class="fa fa-print"></i> Lihat Struk</a></span>
                    <?php } ?>
                </td>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
    </table>

    <?php 
elseif($aksi == "bayar_tagihan"):
?>
    <?= $this->session->flashdata('pesan') ?>
    <b style="font-size: 14pt">Tagihan Anda</b>
    <div class="box-tools pull-right">
    </div>
    <br>
    <span class="">
        <?php $stt = $status  ?>
        <?php if($stt == 'BL'){ ?>
        <span class="">
            Segera selesaikan pembayaran tagihan Anda agar selalu dapat terhubung dengan layanan hotspot KassandraWiFi.
            Terima Kasih 🙂
        </span>
        <?php }elseif($stt == 'LS'){ ?>
        <span class="">
            Terima Kasih sudah melunasi tagihan anda. Tetap nikmati layanan hotspot unlimited 24 jam non stop tanpa
            lemot kecuali saat wifi down dari KassandraWiFi 🙂
        </span>
        <?php } ?>
        </a>
    </span>
    <span style='font-size:15pt' class="pull-right">
        <?php $stt = $status  ?>
        <?php if($stt == 'BL'){ ?>
        <span class="label label-danger">Belum Anda Bayar</span>
        <?php }elseif($stt == 'LS'){ ?>
        <span class="label label-info">Lunas</span>
        <?php } ?>
</div>
<!-- /.box-header -->

<div class="box-body">
    <div class="table-responsive">
        <table id="" class="table" border="0" cellspacing="0" style="width: 100%">
            <thead>

                <td class="col-sm-2" width='70%' align='left' style='padding-right:80px; vertical-align:top;'>
                    <span style='font-size:12pt'><b>Periode Tagihan</b></span></br>
                    <?= $bulan ?> / <?= $tahun ?>
                </td>
                <td style='vertical-align:top' width='30%' align='left'>
                    <b>
                <td class="col-sm-2" style='vertical-align:top' width='30%' align='left'>
                    <b>Batas Waktu Pembayaran</b><br>
                    Tanggal 10 - Bulan <?= $bulan ?> / <?= $tahun ?>
                </td>

        </table>
        <table id="" class="table table-striped" border="0" cellspacing="0" style="width: 100%">

            <tr>
                <th class="col-sm-2">Detail Tagihan</th>
                <td>
                    :
                </td>
            </tr>


            <tr>
                <th class="col-sm-2">Nama Pelanggan</th>
                <td>
                    : <?= $nama ?>
                </td>
            </tr>

            <tr>
                <th class="col-sm-2">Paket Internet</th>
                <td>
                    : <?= $id_paket ?> | <?= $paket ?>
                </td>
            </tr>

            <tr>
                <th class="col-sm-2">Nomor Tagihan</th>
                <td>
                    : <?= $id_tagihan ?>
                </td>
            </tr>

            <tr>
                <th class="col-sm-2">Deskripsi</th>
                <td>
                    : Iuran Hotspot WiFi Bulan <?= $bulan ?> / <?= $tahun ?>
                </td>
            </tr>

            <tr>
                <th class="col-sm-2">Total Biaya</th>
                <td>
                    : <?= rupiah($tagihan); ?>
                </td>
            </tr>

            <?php $tgl = $tgl_bayar  ?>
            <?php if($tgl == '0000-00-00'){ ?>
            <span class="">
            </span>

            <?php }elseif($tgl = $tgl_bayar){ ?>
            <tr>
                <th>Tanggal Bayar</th>
                <td>
                    <span class="">: <?php tgl_indo ($tgl_bayar); ?></span>
                </td>
            </tr>
            <?php } ?>
        </table>

        <!-- /.box-body -->
    </div>
    <center>
        <span class="">
            <?php $stt = $status  ?>
            <?php if($stt == 'BL'){ ?>
            <span class="">
				<a href="<?= base_url('pelanggan/tagihan/merchant/'.$id_tagihan) ?>" title="Bayar" class="btn btn-warning"
                    style="font-size:16px;">
                    <i class="fa fa-dollar"></i> Bayar Sekarang
                </a>
                <a href="<?= base_url('pelanggan/tagihan/konfirmasi_bayar/'.$id_tagihan) ?>" title="Konfirmasi Pembayaran"
                    class="btn btn-primary" style="font-size:16px;">
                    <i class="fa fa-money"></i> Konfirmasi pembayaran
                </a>
            </span>
            <?php }elseif($stt == 'LS'){ ?>
            <span class="btn btn-success" style="font-size:16px;">
                <i class="fa fa-money"></i> Anda Sudah Melunasi Tagihan
            </span>
            <span class="btn btn" style="font-size:16px;">
                <a href="<?= base_url('struk/cetak_struk_bulanan/'.$id_tagihan) ?>" target="_blank" title="Cetak Struk"
                    class="btn btn-primary">
                    <i class="glyphicon glyphicon-print"></i> Download / Cetak Struk</a>
            </span>
            <?php } ?>
            </a>
        </span>

    </center>

    <?php 
elseif($aksi == "konfirmasi_byr"):
?>

<?php $stt = $status  ?>
 <?php if($stt == 'BL'){ ?>
    <b style="font-size: 14pt">Konfirmasi Pembayaran</b>
    </table>
    <table id="" class="table table-striped" border="0" cellspacing="0" style="width: 100%">
        <form action="" method="post" enctype="multipart/form-data">
            <tr>
                <th class="col-sm-2">Detail Tagihan</th>
                <td>
                    :
                </td>
            </tr>


            <tr>
                <th class="col-sm-2">ID Pelanggan</th>
                <td>
                    : <input type="text" name="nama" value="<?= $nama ?>" hidden><?= $nama ?>
                </td>
            </tr>


            <tr>
                <th class="col-sm-2">Total Biaya</th>
                <td>
                    : <?= rupiah($tagihan); ?>
                </td>
            </tr>

            <tr>
                <th>Upload Bukti</th>
                <td>

                    <input type="file" class="form-control" style="background-color: white;" id="bukti_bayar"
                        name="bukti_bayar" placeholder="bukti_bayar" autocomplete="off" onchange="previewBAYAR()"
                        required>
                    <img id="preview_bayar" alt="image preview" width="50%" />
                    <!-- kembali -->
                    <a href="javascript:history.back()" class="btn btn-warning btn-sm"
                        style="margin-top: 10px">Kembali</a>
                    <button type="submit" name="kirim" class="btn btn-primary btn-sm"
                        style="margin-top: 10px">Konfirmasi</button>
        </form>
        </tr>


    </table>

    <?php }elseif($stt == 'LS'){ ?>
    <h2>Anda Sudah Melakukan Pembayaran</h2>
    <?php } ?>

    <?php 
elseif($aksi == "merchant"):
?>



    <center>
        <a href="<?= base_url('template') ?>/Linkpembayaran.txt" class="btn btn" target="blank">
            <img src="<?= base_url('template/kassandra-wifi') ?>/img/img/transferbank.png" alt="" style="height:50px">
        </a>
        <a href="https://shopee.co.id" class="btn btn">
            <img src="<?= base_url('template/kassandra-wifi') ?>/img/img/shopeepay.png" alt="" style="height:35px">
            <a href="https://linkaja.onelink.me/Mk5Y/app" lass="btn btn">
                <img src="<?= base_url('template/kassandra-wifi') ?>/img/img/linkaja.png" alt="" style="height:50px">
                <a href="https://link.dana.id/lBx7Kcflieb" lass="btn btn"> &emsp;
                    <img src="<?= base_url('template/kassandra-wifi') ?>/img/img/dana.png" alt="" style="height:50px">
                    <a href="<?= base_url('template') ?>/Linkpembayaran.txt" class="btn btn" target="blank">
                        <img src="<?= base_url('template/kassandra-wifi') ?>/img/img/alfamart.png" alt=""
                            style="height:45px">
                    </a>
                    <a href="<?= base_url('template') ?>/Linkpembayaran.txt" class="btn btn" target="blank">
                        <img src="<?= base_url('template/kassandra-wifi') ?>/img/img/indomaret.png" alt=""
                            style="height:45px">
                    </a>
    </center>

    <div class="box-header with-border">
        <ul>
            <li>
                <p>Nomor pembayaran yang perlu dimasukkan bisa dilihat disini
                    <a href="<?= base_url('template') ?>/Linkpembayaran.txt" target="blank">
                        <u>Nomor Pembayaran</u></a>
                </p>
            </li>
            <li>
                <p>Setelah melakukan pembayaran, silahkan konfirmasi melalui link berikut
                    <a href="<?= base_url('pelanggan/tagihan/konfirmasi_bayar/'.$id_tagihan) ?>" title="Konfirmasi">
                        <button class="btn btn-primary btn-sm">Konfirmasi Pembayaran</button></a>
                </p>
            </li>
        </ul>
    </div>

    <!-- /.box-body -->
</div>
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