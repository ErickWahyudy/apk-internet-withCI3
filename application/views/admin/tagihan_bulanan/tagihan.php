<?php $this->load->view('template/header'); ?>

<?php if($depan == TRUE): 
      $kode_tahun = date("Y");
      $kode_bulan = date("m");
      
?>
<?= $this->session->flashdata('pesan') ?>
<table class="table table-striped">
    <form action="" method="POST">
        <tr>
            <th>Bulan</th>
            <td>
                <select name="bulan" class="form-control" required="">
                    <option value="">--Pilih Bulan--</option>
                    <?php foreach($bulan as $bln): ?>
                    <option value="<?= $bln['id_bulan'] ?>" <?= $bln['id_bulan'] == $kode_bulan ? 'selected' : '' ?>>
                        <?= ucfirst($bln['bulan']) ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Tahun</th>
            <td>
                <select name="tahun" class="form-control" required="">
                        <option value="">--Pilih Tahun--</option>
                        <?php for($i = date('Y'); $i >= date('Y')-5; $i--){ ?>
                        <option value="<?= $i ?>" <?= $i == $kode_tahun ? 'selected' : '' ?>><?= $i ?></option>
                        <?php } ?>
                    </select>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input type="submit" name="cari" value="Buka Tagihan" class="btn btn-primary">
            </td>
        </tr>
    </form>
</table>

<?php elseif($depan == FALSE): ?>

<?php if($cetak == TRUE ): ?>
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>
        <i class="icon fa fa-info"></i> Data Tagihan <br>
        Bulan <?= bulan($bulan) ?> Tahun <?= $tahun ?>
    </h4>
</div>

<a href="<?= base_url('email/sendmail_bulanan') ?>" class="btn btn-warning"><i class="fa fa-envelope"></i> Kirim
    Email</a>
<?php elseif($cetak == FALSE): ?>
<script type="text/javascript">
window.print()
</script>
<link rel="stylesheet" href="<?= base_url('/template/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
<center>
    <h2><?= ucfirst($judul) ?></h2>
    <hr />
    <span color="red"><i>Dicetak Pada Dari <?= tgl_indonesia(date("Y-m-d")) ?></i></span>
</center>

<?php endif; 
$kode_tgl = date("d-m-Y");
?>

<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>ID tagihan</th>
                <th>Nama</th>
                <th>Bulan</th>
                <th>Tagihan</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($data->result_array() as $tagihan): ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $tagihan['id_tagihan'] ?></td>
                <td><?= $tagihan['nama'] ?></td>
                <td><?= $tagihan['bulan'] ?> / <?= $tagihan['tahun'] ?></td>
                <td><?= rupiah($tagihan['tagihan']) ?></td>
                <td>
                    <?php $stt = $tagihan['status']  ?>
                    <?php if($stt == 'BL'){ ?>
                    <span class="label label-danger">Belum Bayar</span>
                    <?php }elseif($stt == 'LS'){ ?>
                    <span class="label label-success">Lunas</span>
                    <?php } ?>
                </td>
                <td>
                <a href="javascript:void(0)" onclick="bayar_tagihan('<?= $tagihan['id_tagihan'] ?>')"
                                        class="btn btn-info"><i class="fa fa-check"></i> Bayar</a>
                    <a href="" class="btn btn-warning" data-toggle="modal"
                        data-target="#editBL<?= $tagihan['id_tagihan'] ?>"><i class="fa fa-edit"></i></a>
                    <a href="<?= base_url('email/kirim_email_tagihan_bulanan/'.$tagihan['id_tagihan']) ?>" name="kirim"
                        target="_blank" class="btn btn-primary"><i class="fa fa-envelope"></i></a> &nbsp; &nbsp;

                    <?php $stt = $kode_tgl  ?>
                    <?php if($stt <= date('09-m-Y')){ ?>
                    <a href="https://api.whatsapp.com/send?phone=<?= $tagihan['no_hp']; ?>&text=Pelanggan Yth. Sdr/i%20<?= $tagihan['nama']; ?>, Tagihan hotspot KassandraWiFi untuk Bulan <?= $tagihan['bulan'] ?> Tahun <?= $tagihan['tahun'] ?> dgn rincian
					%0ABiaya Tagihan : <?= rupiah($tagihan['tagihan']); ?>
					%0ASudah dapat dibayarkan mulai hari ini. Mohon melakukan pembayaran sebelum tgl 10 - <?= $tagihan['bulan'] ?> - <?= $tagihan['tahun'] ?> demi kenyamanan internet bersama.
                    %0A%0ABayar lebih mudah dngn QRIS, karena tanpa biaya tambahan.
                    %0A%0ABerikut link pembayaran via QRIS Anda.
                    %0A<?= base_url('api/payment/qris/'.$tagihan['id_tagihan']) ?>
                    %0A%0AAnda jg dapat melakukan konfirmasi scr langsung dngn mengirim bukti pembayaran pada whatsapp ini.

                    %0A%0A_Pesan ini dikirim otomatis oleh system aplikasi KassandraWiFi._
                    %0A-wifi@kassandra.my.id-" id="whatsappButton<?= $tagihan['id_tagihan'] ?>" onclick="disableButton(<?= $tagihan['id_tagihan'] ?>)" target=" _blank" title="Pesan WhatsApp" class="btn btn-success">
                        <b>Whatsapp</b>
                    </a>

                    <?php }elseif($stt >= date('10-m-Y')){ ?>
                    <a href="https://api.whatsapp.com/send?phone=<?= $tagihan['no_hp']; ?>&text=Pelanggan Yth. Sdr/i <?= $tagihan['nama']; ?>, Tagihan hotspot KassandraWiFi untuk Bulan <?= $tagihan['bulan'] ?> Tahun <?= $tagihan['tahun'] ?> dgn rincian
					%0ABiaya Tagihan : <?= rupiah($tagihan['tagihan']); ?>
                    %0A*Hari ini adalah batas terakhir pembayaran sdr/i <?= $tagihan['nama']; ?>*. Mohon segera melakukan pembayaran demi kenyamanan internet bersama.
                    %0A%0ABayar lebih mudah dngn QRIS, karena tanpa biaya tambahan.
                    %0A_Abaikan pesan jika sudah melakukan pembayaran. Terima kasih._
                    %0A%0ABerikut link pembayaran via QRIS Anda.
                    %0A<?= base_url('api/payment/qris/'.$tagihan['id_tagihan']) ?>
                    %0A%0AAnda jg dapat melakukan konfirmasi scr langsung dngn mengirim bukti pembayaran pada whatsapp ini.

                    %0A%0A_Pesan ini dikirim otomatis oleh system aplikasi KassandraWiFi._
                    %0A-wifi@kassandra.my.id-" id="whatsappButton<?= $tagihan['id_tagihan'] ?>" onclick="disableButton(<?= $tagihan['id_tagihan'] ?>)" target=" _blank" title="Pesan WhatsApp" class="btn btn-success">
                        <b>Whatsapp</b>
                    </a>
                    <?php } ?>

                </td>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
    </table>
    <script>
        function disableButton(id_tagihan) {
                var whatsappButton = document.getElementById("whatsappButton" + id_tagihan);
                whatsappButton.setAttribute("disabled", "true");
                whatsappButton.classList.add("disabled");
            }
    </script>


    <!-- Modal edit tagihan bulanan-->
    <?php foreach($data->result_array() as $tagihan): ?>
    <div class="modal fade" id="editBL<?= $tagihan['id_tagihan'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-purple">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit <?= $judul ?></h4>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped">
                    <form id="edit" method="post">
                            <tr>
                                <th class="">ID Tagihan</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="id_tagihan"
                                        value="<?= $tagihan['id_tagihan'] ?>" class="form-control" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Pelanggan</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="nama" value="<?= $tagihan['nama'] ?>" class="form-control"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>Bulan / Tahun</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="bulan" value="<?= $tagihan['bulan'] ?> / <?= $tagihan['tahun'] ?>" class="form-control"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>Biaya</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="tagihan"
                                        value="<?= $tagihan['tagihan'] ?>" class="form-control"
                                        required="">
                                </td>
                            </tr>

                            <tr>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="status" class="form-control">
                                        <option value="BL"
                                            <?php if($tagihan['status'] == "BL"){echo "selected";} ?>>
                                            Belum Saya Bayar</option>
                                        <option value="LS"
                                            <?php if($tagihan['status'] == "LS"){echo "selected";} ?>>LUNAS
                                        </option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <button href="" class="btn btn-warning" data-dismiss="modal">Kembali</button>
                                    &nbsp;&nbsp;
                                    <input type="submit" name="kirim" value="Simpan" class="btn btn-success"> &nbsp;&nbsp;
                                    <a href="javascript:void(0)" onclick="hapustagihan('<?= $tagihan['id_tagihan'] ?>')"
                                        class="btn btn-danger">Hapus</a>
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

    <script>
        //ajax bayar tagihan
        function bayar_tagihan(id_tagihan) {
        swal({
            title: "Konfirmasi Pembayaran",
            text: "Bayar Tagihan ini?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#3CB371",
            confirmButtonText: "Ya, Bayar!",
            cancelButtonColor: "#DD6B55",
            cancelButtonText: "Tidak, Batalkan!",
            closeOnConfirm: false,
            closeOnCancel: true // Set this to true to close the dialog when the cancel button is clicked
        }).then(function(result) {
            if (result.value) { // Only delete the data if the user clicked on the confirm button
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('admin/tagihan/api_bayar/') ?>" + id_tagihan,
                    dataType: "json",
                }).done(function() {
                    swal({
                        title: "Berhasil",
                        text: "Tagihan Berhasil Dibayar",
                        type: "success",
                        showConfirmButton: true,
                        confirmButtonText: "OKEE"
                    }).then(function() {
                        location.reload();
                    });
                }).fail(function() {
                    swal({
                        title: "Gagal",
                        text: "Tagihan Gagal Dibayar",
                        type: "error",
                        showConfirmButton: true,
                        confirmButtonText: "OKEE"
                    }).then(function() {
                        location.reload();
                    });
                });
            } else { // If the user clicked on the cancel button, show a message indicating that the deletion was cancelled
                swal("Batal bayar", "Tagihan tidak jadi dibayar", "error");
            }
        });
    }
    
    //edit tagihan
    $(document).on('submit', '#edit', function(e) {
        e.preventDefault();
        var form_data = new FormData(this);

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/tagihan/api_editBL/') ?>" + form_data.get('id_tagihan'),
            dataType: "json",
            data: form_data,
            processData: false,
            contentType: false,
            //memanggil swall ketika berhasil
            success: function(data) {
                $('#edit' + form_data.get('id_tagihan'));
                swal({
                    title: "Berhasil",
                    text: "Data Berhasil Diubah",
                    type: "success",
                    showConfirmButton: true,
                    confirmButtonText: "OKEE",
                }).then(function() {
                    location.reload();
                });
            },
            //memanggil swall ketika gagal
            error: function(data) {
                swal({
                    title: "Gagal",
                    text: "Data Gagal Diubah",
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonText: "OKEE",
                }).then(function() {
                    location.reload();
                });
            }
        });
    });

        //ajax hapus tagihan
        function hapustagihan(id_tagihan) {
        swal({
            title: "Apakah Anda Yakin?",
            text: "Data Akan Dihapus",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak, Batalkan!",
            closeOnConfirm: false,
            closeOnCancel: true // Set this to true to close the dialog when the cancel button is clicked
        }).then(function(result) {
            if (result.value) { // Only delete the data if the user clicked on the confirm button
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('admin/tagihan/api_hapus/') ?>" + id_tagihan,
                    dataType: "json",
                }).done(function() {
                    swal({
                        title: "Berhasil",
                        text: "Data Berhasil Dihapus",
                        type: "success",
                        showConfirmButton: true,
                        confirmButtonText: "OKEE"
                    }).then(function() {
                        location.reload();
                    });
                }).fail(function() {
                    swal({
                        title: "Gagal",
                        text: "Data Gagal Dihapus",
                        type: "error",
                        showConfirmButton: true,
                        confirmButtonText: "OKEE"
                    }).then(function() {
                        location.reload();
                    });
                });
            } else { // If the user clicked on the cancel button, show a message indicating that the deletion was cancelled
                swal("Batal hapus", "Data Tidak Jadi Dihapus", "error");
            }
        });
    }
    </script>

    <?php endif; ?>
    <?php $this->load->view('template/footer'); ?>

    <?php 

function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
}

function bulan ($bln){
    switch ($bln){
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}