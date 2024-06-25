<?php $this->load->view('template/header'); ?>
<?php if($depan == TRUE): 
      $kode_tahun = date("Y");
      
?>
<?= $this->session->flashdata('pesan') ?>
<table class="table table-striped">
    <form action="" method="POST">
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
                <input type="submit" name="cari" value="Buka Data" class="btn btn-primary">
            </td>
        </tr>
    </form>
</table>

<?php elseif($depan == FALSE): ?>
<a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPengeluaran"><i class="fa fa-plus"></i>
    Tambah</a>
<br /><br />
<?= $this->session->flashdata('pesan') ?>

<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>
        <i class="icon fa fa-info"></i> Total Pengeluaran Tahun <?= $tahun ?>
    </h4>
    <h4>
        <?= rupiah($pengeluaran);?>
    </h4>
</div>
<div class="table-responsive">
    <table id="example1" class="table table-bordered  table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Pengeluaran</th>
                <th>Biaya</th>
                <th>Bulan/Tahun</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($data->result_array() as $pengeluaran): ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $pengeluaran['jenis_pengeluaran'] ?></td>
                <td><?= rupiah ($pengeluaran['biaya_pengeluaran']) ?></td>
                <td>
                    <?php $stt = $pengeluaran['tanggal']  ?>
                    <?php if($stt == '0000-00-00'){ ?>
                    <span class="">-- / -- / ----</span>
                    <?php }elseif($stt = $pengeluaran['tanggal']){ ?>
                    <span class=""><?= tgl_indo($pengeluaran['tanggal']) ?></span>
                    <?php } ?>
                </td>
                <td>
                    <?php $stt = $pengeluaran['keterangan']  ?>
                    <?php if($stt == 'Belum Saya Bayar'){ ?>
                    <span class="label label-danger">Belum Saya Bayar</span>
                    <?php }elseif($stt == 'LUNAS'){ ?>
                    <span class="label label-success">Lunas</span>
                    <?php } ?>
                </td>
                <td>
                    <a href="" class="btn btn-warning" data-toggle="modal"
                        data-target="#edit<?= $pengeluaran['id_pengeluaran'] ?>"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
    </table>

    <!-- Modal tambah data pelanggan-->
    <div class="modal fade" id="modalTambahPengeluaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-purple">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah <?= $judul ?></h4>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <form id="add" method="post" >

                            <tr>
                                <th>Jenis Pengeluaran</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="jenis_pengeluaran" class="form-control"
                                        placeholder="Jenis pengeluaran" required="">
                                </td>
                            </tr>
                            <tr>
                                <th>Biaya</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="biaya_pengeluaran" class="form-control"
                                        placeholder="Biaya pengeluaran" required="">
                                </td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="keterangan" class="form-control">
                                        <option value="Belum Saya Bayar">Belum Saya Bayar</option>
                                        <option value="LUNAS">LUNAS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="<?= date('Y-m-d') ?>" >
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <button href="" class="btn btn-warning" data-dismiss="modal">Kembali</button>
                                    &nbsp;&nbsp;
                                    <input type="submit" name="kirim" value="Submit" class="btn btn-success">
                                </td>
                            </tr>

                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal edit pengeluaran-->
    <?php foreach($data->result_array() as $pengeluaran): ?>
    <div class="modal fade" id="edit<?= $pengeluaran['id_pengeluaran'] ?>" tabindex="-1" role="dialog"
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
                                <th class="">ID Pengeluaran</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="id_pengeluaran"
                                        value="<?= $pengeluaran['id_pengeluaran'] ?>" class="form-control" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>Jenis Pengeluaran</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="jenis_pengeluaran"
                                        value="<?= $pengeluaran['jenis_pengeluaran'] ?>" class="form-control"
                                        required="">
                                </td>
                            </tr>
                            <tr>
                                <th>Biaya Pengeluaran</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="biaya_pengeluaran"
                                        value="<?= $pengeluaran['biaya_pengeluaran'] ?>" class="form-control"
                                        required="">
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" name="tanggal" value="<?= $pengeluaran['tanggal'] ?>"
                                        class="form-control" required="">
                                </td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="keterangan" class="form-control">
                                        <option value="Belum Saya Bayar"
                                            <?php if($pengeluaran['keterangan'] == "Belum Saya Bayar"){echo "selected";} ?>>
                                            Belum Saya Bayar</option>
                                        <option value="LUNAS"
                                            <?php if($pengeluaran['keterangan'] == "LUNAS"){echo "selected";} ?>>LUNAS
                                        </option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <button href="" class="btn btn-warning" data-dismiss="modal">Kembali</button>
                                    &nbsp;&nbsp;
                                    <input type="submit" name="kirim" value="Simpan" class="btn btn-success"> &nbsp;&nbsp;
                                    <a href="javascript:void(0)" onclick="hapuspengeluaran('<?= $pengeluaran['id_pengeluaran'] ?>')"
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
    <!-- End Modal -->

    <script>
        //add pengeluaran
        $(document).ready(function () {
        $('#add').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('admin/pengeluaran/api_add') ?>",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    $('#modalTambahPengeluaran');
                    $('#add')[0].reset();
                    swal({
                        title: "Berhasil",
                        text: "Data berhasil ditambahkan",
                        type: "success",
                        showConfirmButton: true,
                        confirmButtonText: "OKEE",
                    }).then(function () {
                        location.reload();
                    });
                }
            });
        });
    });

        //edit pengeluaran
        $(document).on('submit', '#edit', function(e) {
        e.preventDefault();
        var form_data = new FormData(this);

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/pengeluaran/api_edit/') ?>" + form_data.get('id_pengeluaran'),
            dataType: "json",
            data: form_data,
            processData: false,
            contentType: false,
            //memanggil swall ketika berhasil
            success: function(data) {
                $('#edit' + form_data.get('id_pengeluaran'));
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

        //ajax hapus pengeluaran
        function hapuspengeluaran(id_pengeluaran) {
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
                    url: "<?php echo site_url('admin/pengeluaran/api_hapus/') ?>" + id_pengeluaran,
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