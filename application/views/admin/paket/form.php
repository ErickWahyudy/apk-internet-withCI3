<?php $this->load->view('template/header'); ?>

<a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPaket"><i class="fa fa-plus"></i>
    Tambah</a>
<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>
<div class="table-responsive">
    <table id="example1" class="table table-bordered  table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Paket</th>
                <th>Tarif</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($data->result_array() as $paket): ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $paket['id_paket'] ?></td>
                <td><?= $paket['paket'] ?></td>
                <td><?= rupiah ($paket['tarif']) ?></td>
                <td>
                    <a href="" class="btn btn-warning" data-toggle="modal"
                        data-target="#edit<?= $paket['id_paket'] ?>"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
    </table>

    <!-- Modal tambah data paket-->
    <div class="modal fade" id="modalTambahPaket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <th>Paket</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="paket" class="form-control" placeholder="Paket"
                                        required="">
                                </td>
                            </tr>
                            <tr>
                                <th>Tarif</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="tarif" class="form-control" placeholder="Tarif"
                                        required="">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
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

    <!-- Modal edit data paket-->
    <?php foreach($data->result_array() as $paket): ?>
    <div class="modal fade" id="edit<?= $paket['id_paket'] ?>" tabindex="-1" role="dialog"
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
                                <th>ID Paket</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="id_paket" value="<?= $paket['id_paket'] ?>"
                                        class="form-control" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>Paket</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="paket" value="<?= $paket['paket'] ?>" class="form-control"
                                        required="">
                                </td>
                            </tr>
                            <tr>
                                <th>Tarif</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="tarif" value="<?= $paket['tarif'] ?>"
                                        class="form-control" required="">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                    &nbsp;&nbsp;
                                    <input type="submit" name="kirim" value="Simpan" class="btn btn-success"> &nbsp;&nbsp;
                                    <a href="javascript:void(0)" onclick="hapuspaket('<?= $paket['id_paket'] ?>')"
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
        //add data
        $(document).ready(function () {
        $('#add').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('admin/paket/api_add') ?>",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    $('#modalTambahPaket');
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

        //edit file
        $(document).on('submit', '#edit', function(e) {
        e.preventDefault();
        var form_data = new FormData(this);

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/paket/api_edit/') ?>" + form_data.get('id_paket'),
            dataType: "json",
            data: form_data,
            processData: false,
            contentType: false,
            //memanggil swall ketika berhasil
            success: function(data) {
                $('#edit' + form_data.get('id_paket'));
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

        //ajax hapus paket
        function hapuspaket(id_paket) {
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
                    url: "<?php echo site_url('admin/paket/api_hapus/') ?>" + id_paket,
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
?>