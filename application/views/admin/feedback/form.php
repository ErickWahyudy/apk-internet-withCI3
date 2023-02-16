<?php $this->load->view('template/header'); ?>

<a href="<?= base_url('admin/feedback_data/') ?>" class="btn btn-primary"><i class="fa fa-users"></i> Tambah</a>
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
                        <form action="<?= base_url('admin/feedback/edit/'.$feedback['id_feedback']) ?>" method="post">
                            <tr>
                                <th>ID Feedback</th>
                            </tr>
                            <tr>
                                <td>
                                    <p class="form-control"><?= $feedback['id_feedback'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                            </tr>
                            <tr>
                                <td>
                                    <p class="form-control"><?= $feedback['nama'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th>No HP / Email</th>
                            </tr>
                            <tr>
                                <td>
                                    <p class="form-control"><?= $feedback['no_hp'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th>Nilai</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="nilai" value="<?= $feedback['nilai'] ?>"
                                        class="form-control" placeholder="Nilai" required="">
                                </td>
                            </tr>
                            <tr>
                                <th>Feedback</th>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="feedback" class="form-control"
                                        required=""><?= $feedback['feedback'] ?></textarea>
                                </td>
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
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    &nbsp;&nbsp;
                                    <input type="submit" name="kirim" value="Simpan" class="btn btn-success">
                                    &nbsp;&nbsp;
                                    <a href="<?= base_url('admin/feedback_hapus/'.$feedback['id_feedback']) ?>"
                                        class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i
                                            class="fa fa-trash"> Hapus</i></a>
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