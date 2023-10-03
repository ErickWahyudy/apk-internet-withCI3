<?php $this->load->view('template/header'); ?>

<a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalInformasiMaintenance"><i class="fa fa-edit"></i>
    Edit Informasi Maintenance</a> &nbsp;&nbsp;
<a href="<?= base_url('maintenance-server') ?>" class="btn btn-success" target="_blank"><i class="fa fa-globe"></i> Buka web</a>
<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>

<div class="table-responsive">
    <table id="example2" class="table table-bordered  table-striped">
        <thead>
            <tr>
                <th>Informasi Maintenance</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $pesan ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Modal informasi maintenance-->
    <div class="modal fade" id="modalInformasiMaintenance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-purple">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit <?= $judul ?></h4>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <form id="add">
                            <tr>
                                <th>Informasi Maintenance</th>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="pesan" class="form-control" rows="5" required><?= $pesan ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                    &nbsp;&nbsp;
                                    <button type="submit" name="kirim" class="btn btn-success">Simpan</button>
                                </td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

<script>
        //add data
        $(document).ready(function () {
        $('#add').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('admin/maintenance/api_add') ?>",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    $('#modalInformasiMaintenance');
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

    </script>
    
<?php $this->load->view('template/footer'); ?>