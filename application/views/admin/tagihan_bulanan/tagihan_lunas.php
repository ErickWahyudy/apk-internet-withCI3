<?php $this->load->view('template/header'); ?>

<?php if($depan == TRUE): 
    $kode_tahun = date('Y');
?>
<table class="table table-striped">
    <form action="" method="POST">
        <tr>
            <th>Dari</th>
            <td><input type="number" name="dari" class="form-control" value="<?= $kode_tahun; ?>"></td>
        </tr>
        <tr>
            <th>Sampai</th>
            <td><input type="number" name="sampai" class="form-control" value="<?= $kode_tahun; ?>"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="cari" class="btn btn-primary" value="Buka Tagihan"></td>
        </tr>
    </form>
</table>

<?php elseif($depan == FALSE): ?>

<?= $this->session->flashdata('pesan') ?>

<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>
        <i class="icon fa fa-info"></i> Total Pembayaran Pelanggan Bulan <?= date('F'); ?> Tahun <?= $dari ?> <?= rupiah($sum_tagihanLS);?>
    </h4>
    <h4>Laporan Pembayaran Tahun <?= $dari ?> Sampai <?= $sampai ?></h4>
</div>
<div class="table-responsive">
    <table id="example1" class="table table-bordered  table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
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
                <td><?= $tagihan['nama'] ?></td>
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
                <td><?= tgl_indo($tagihan['tgl_bayar']) ?></td>
                <td>
                    <a href="" class="btn btn-warning" data-toggle="modal"
                        data-target="#editLS<?= $tagihan['id_tagihan'] ?>"><i class="fa fa-edit"></i></a> &nbsp; &nbsp;
                    <a href="../../struk/cetak_struk_bulanan/<?= $tagihan['id_tagihan']; ?>" target=" _blank"
                        title="Cetak Struk" class="btn btn-primary">
                        <i class="glyphicon glyphicon-print"></i> Struk</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://api.whatsapp.com/send?phone=<?= $tagihan['no_hp']; ?>&text=Terima kasih Sdr/i%20<?= $tagihan['nama']; ?>,%20
									Sudah melakukan pembayaran Tagihan%20hotspot%20KassandraWiFi%20untuk%20Bulan%20<?= $tagihan['bulan']; ?>%20Tahun%20<?= $tagihan['tahun']; ?>%0A
									Sebesar%20<?= rupiah($tagihan['tagihan']); ?> pada tanggal <?= tgl_indo($tagihan['tgl_bayar']) ?>%0A%0A
									Tetap nikmati layanan hotspot unlimited 24 jam non stop tanpa lemot kecuali saat wifi down dari KassandraWiFi.%0A%0A
									Anda juga bisa mendownload ataupun melihat struk pembayaran lunas tagihan di aplikasi KassandraWiFi%0A
									<?= base_url('struk/bayar_tagihan/'.$tagihan['id_tagihan']) ?> %0A%0A
									_Pesan ini dikirim otomatis oleh system aplikasi KassandraWifi._%0A
									-wifi@kassandra.my.id-" target=" _blank" title="Pesan WhatsApp" class="btn btn-success">
                        <i class="fa fa-whatsapp"> WA</i>
                    </a>
                </td>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
    </table>

    <!-- Modal edit tagihan bulanan-->
    <?php foreach($data->result_array() as $tagihan): ?>
    <div class="modal fade" id="editLS<?= $tagihan['id_tagihan'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-purple">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit <?= $judul ?> Lunas</h4>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <form action="<?= base_url('admin/tagihan/editLS/'.$tagihan['id_tagihan']) ?>" method="post">
                            <tr>
                                <th class="col-md-2">ID Tagihan</th>
                            </tr>
                            <tr>
                                <td>
                                    <p class="form-control"><?= $tagihan['id_tagihan'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th>ID Pelanggan</th>
                            </tr>
                            <tr>
                                <td>
                                    <p class="form-control"><?= $tagihan['id_pelanggan'] ?> | <?= $tagihan['nama'] ?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th>Bulan / Tahun</th>
                            </tr>
                            <tr>
                                <td>
                                    <p class="form-control"><?= $tagihan['bulan'] ?> / <?= $tagihan['tahun'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="status" class="form-control">
                                        <option value="BL" <?php if($tagihan['status'] == "BL"){echo "selected";} ?>>
                                            Belum Di Bayar</option>
                                        <option value="LS" <?php if($tagihan['status'] == "LS"){echo "selected";} ?>>
                                            LUNAS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Tgl bayar</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" name="tgl_bayar" value="<?= $tagihan['tgl_bayar'] ?>"
                                        class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <th>tagihan</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="tagihan" value="<?= $tagihan['tagihan'] ?>"
                                        class="form-control">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    &nbsp;&nbsp;
                                    <input type="submit" name="kirim" value="Simpan" class="btn btn-success">
                                    &nbsp;&nbsp;
                                    <a href="<?= base_url('admin/tagihan/hapus/'.$tagihan['id_tagihan']) ?>"
                                        class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i
                                            class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>

                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <!-- End Modal edit tagihan bulanan-->
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
    'Desember',
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
  
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>