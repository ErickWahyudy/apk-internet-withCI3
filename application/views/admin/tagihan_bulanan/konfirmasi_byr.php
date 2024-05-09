<?php $this->load->view('template/header'); ?>

<?= $this->session->flashdata('pesan') ?>

<div class="table-responsive">
 <table id="example1" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Bulan / Tahun</th>
                  <th>Tagihan</th>
                  <th>Status</th>
                  <th>Bukti Bayar</th>
                  <th>Tanggal Konfirmasi</th>
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
                <td>
                <a href="<?= base_url('themes/bukti_bayar/'.$tagihan['bukti_bayar']) ?>" target="_blank">
                  <img src="<?= base_url('themes/bukti_bayar/'.$tagihan['bukti_bayar']) ?>" class="img-responsive" style="width: 100px;height: 100xp">
                </td>
                <td><?= tgl_indo($tagihan['tgl_konfirmasi']) ?></td>
                <td>
                 <a href="javascript:void(0)" onclick="hapusdata('<?= $tagihan['id_konfirmasi'] ?>')"
                                    class="btn btn-danger"><i class="fa fa-trash"></i></a>
                 </td>
                                   
                 </tr>
                 <?php $no++; endforeach; ?>
                 </tbody>
               </table>
<?php $this->load->view('template/footer'); ?>

<script type="text/javascript">

//ajax hapus 
function hapusdata(id_konfirmasi) {
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
                url: "<?php echo site_url('admin/tagihan/api_hapus_konfir_bayar/') ?>" +
                id_konfirmasi,
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