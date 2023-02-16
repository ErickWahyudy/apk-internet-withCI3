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
                        <form action="<?= base_url('admin/paket/add') ?>" method="post">
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
                        <form action="<?= base_url('admin/paket/edit/'.$paket['id_paket']) ?>" method="post">
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
                                    <a href="<?= base_url('admin/paket/hapus/'.$paket['id_paket']) ?>"
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
    <!-- End Modal -->

    <?php $this->load->view('template/footer'); ?>

    <?php 

function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
}