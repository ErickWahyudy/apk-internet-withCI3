<?php $this->load->view('template/header'); ?>

<a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahFeedback"><i class="fa fa-plus"></i>
    Tambah</a>
<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>
<div class="table-responsive">
    <table id="example1" class="table table-bordered  table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No HP / Email</th>
                <th>Nilai</th>
                <th>Feedback</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($data->result_array() as $feedback): ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $feedback['nama'] ?></td>
                <td><?= $feedback['no_hp'] ?></td>
                <td><?= $feedback['nilai'] ?></td>
                <td>
                    <?= $feedback['feedback'] ?>
                </td>
                <td>
                    <?= tgl_indo($feedback['tanggal']) ?>
                </td>
                <td>
                    <a href="" class="btn btn-warning" data-toggle="modal"
                        data-target="#edit<?= $feedback['id_feedback'] ?>"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
    </table>

    <!-- Modal tambah data feedback-->
    <div class="modal fade" id="modalTambahFeedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <form id="add" method="post">
                            <tr>
                                <th>Nama</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                                </td>
                            </tr>
                            <tr>
                                <th>No HP / Email</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="no_hp" class="form-control" placeholder="No HP / Email"
                                        required>
                                </td>
                            </tr>
                            <tr>
                                <th>Nilai</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="nilai" class="form-control" placeholder="Nilai" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Feedback</th>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="feedback" class="form-control" required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>"
                                        required>
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



    <!-- Modal edit feedback-->
    <?php foreach($data->result_array() as $feedback): ?>
    <div class="modal fade" id="edit<?= $feedback['id_feedback'] ?>" tabindex="-1" role="dialog"
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
                                <th class="">ID feedback</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="id_feedback"
                                        value="<?= $feedback['id_feedback'] ?>" class="form-control" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="">Nama</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="nama"
                                        value="<?= $feedback['nama'] ?>" class="form-control" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>No HP / Email</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="no_hp"
                                        value="<?= $feedback['no_hp'] ?>" class="form-control" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>Nilai</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="nilai"
                                        value="<?= $feedback['nilai'] ?>" class="form-control"
                                        required="">
                                </td>
                            </tr>
                            <tr>
                                <th>Feedback</th>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="feedback" class="form-control" required><?= $feedback['feedback'] ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" name="tanggal" value="<?= $feedback['tanggal'] ?>"
                                        class="form-control" required="">
                                </td>
                            </tr>
    
                            <tr>
                                <td>
                                    <button href="" class="btn btn-warning" data-dismiss="modal">Kembali</button>
                                    &nbsp;&nbsp;
                                    <input type="submit" name="kirim" value="Simpan" class="btn btn-success"> &nbsp;&nbsp;
                                    <a href="javascript:void(0)" onclick="hapusfeedback('<?= $feedback['id_feedback'] ?>')"
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
    <!-- End Modal edit feedback-->

    <script>
    //add data
    $(document).ready(function() {
        $('#add').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('admin/feedback/api_add') ?>",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    $('#modalTambahFeedback');
                    $('#add')[0].reset();
                    swal({
                        title: "Berhasil",
                        text: "Data berhasil ditambahkan",
                        type: "success",
                        showConfirmButton: true,
                        confirmButtonText: "OKEE",
                    }).then(function() {
                        location.reload();
                    });
                }
            });
        });
    });

     //edit feedback
     $(document).on('submit', '#edit', function(e) {
        e.preventDefault();
        var form_data = new FormData(this);

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/feedback/api_edit/') ?>" + form_data.get('id_feedback'),
            dataType: "json",
            data: form_data,
            processData: false,
            contentType: false,
            //memanggil swall ketika berhasil
            success: function(data) {
                $('#edit' + form_data.get('id_feedback'));
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


    //ajax hapus feedback
    function hapusfeedback(id_feedback) {
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
                    url: "<?php echo site_url('admin/feedback/api_hapus/') ?>" + id_feedback,
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