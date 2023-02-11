<?php $this->load->view('template/header'); ?>

<?php
 if($this->session->userdata('level') == "PLG" ){

 ?>
<?= $this->session->flashdata('pesan'); ?>

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
        <div class="inner">
            <h3><?= $count_tagihanBL;?> </h3>

            <p>Tagihan Bulanan</p>
        </div>
        <div class="icon">
            <i class="fa fa-dollar"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>


<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
        <div class="inner">
            <h3><?= $count_tagihanBL_lain;?></h3>

            <p>Tagihan Lain</p>
        </div>
        <div class="icon">
            <i class="fa fa-money"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
</div>
</div>


<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="box box-default">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-money"></i>
                    <b style="font-size: 12pt">TAGIHAN TERBARU ANDA</b>
                    <br>Silakan cek tagihan anda selengkapnya atau download nota tagihan di lihat <a
                        href="<?= base_url('pelanggan/tagihan') ?>">disini ! !</a>
                    <div class="box-tools pull-right">
                    </div>
                </div>
                <table id="" class="table table-striped" border="0" cellspacing="0" style="width: 100%">

                    <tr>
                        <th class="col-sm-4">Detail Tagihan</th>
                        <td>
                            :
                        </td>
                    </tr>

                    <tr>
                        <th class="col-sm-4">Paket Internet</th>
                        <td>
                            : <?= $id_paket ?> | <?= $paket ?>
                        </td>
                    </tr>

                    <tr>
                        <th class="col-sm-4">Nomor Tagihan</th>
                        <td>
                            : <?= $id_tagihan ?>
                        </td>
                    </tr>

                    <tr>
                        <th class="col-sm-4">Deskripsi</th>
                        <td>
                            : Iuran Hotspot WiFi Bulan <?= $bulan ?> / <?= $tahun ?>
                        </td>
                    </tr>

                    <tr>
                        <th class="col-sm-4">Total Biaya</th>
                        <td>
                            : <?= rupiah($tagihan); ?>
                        </td>
                    </tr>
                    

                    <tr>
                        <th>Status</th>
                        <?php $stt = $status  ?>
                        <?php if($stt == 'BL'){ ?>
                        <td>:
                            <span class="label label-danger">Belum bayar</span>
                        </td>
                            <?php }elseif($stt == 'LS'){ ?>
                        <td>:
                                <span class="label label-success">Lunas</span> 
                        </td>
                    </tr>
                    <?php } ?>
                    
                    <?php $tgl = $tgl_bayar; ?>
                    <?php if($tgl == '0000-00-00'){ ?>
                    <tr>
                        <th>Bayar Sekarang</th>
                        <td>:
                            <a href="<?= base_url('pelanggan/tagihan/bayar/'.$id_tagihan) ?>" title="Bayar"
                                class="btn btn-warning btn-sm">
                                <i class="fa fa-dollar"></i> Bayar Sekarang
                            </a>
                        </td>
                    </tr>

                    <?php }elseif($tgl = $tgl_bayar){ ?>
                    <tr>
                        <th>Tanggal Bayar</th>
                        <td>
                            <span class="">: <?= tgl_indo ($tgl_bayar); ?></span>
                        </td>
                    </tr>
                    <?php } ?>

                </table>
            </div>
        </div>

    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="box box-default">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-header with-border">
                        <i class="fa fa-bullhorn"></i>
                        <b style="font-size: 12pt">LAYANAN INFORMASI</b>
                        <u><a href="<?= base_url('pelanggan/informasi') ?>">Help Desk</a></u>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered  table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Informasi</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($informasi->result_array() as $informasi): ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $informasi['informasi'] ?></td>
                                    <td>
                                        <a href="<?= base_url('template/file_informasi/'.$informasi['berkas']) ?>"
                                            target="_blank"><?= $informasi['berkas'] ?></a> <br>
                                    </td>
                                </tr>
                                <?php $no++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<?php $this->load->view('template/footer'); ?>


        <?php } ?>

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