<?php $this->load->view('template/header'); ?>

<a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahTagihanlain"><i class="fa fa-plus"></i>
    Tambah</a>
<a href="<?= base_url('email/sendmail_bl_lain') ?>" class="btn btn-warning"><i class="fa fa-envelope"></i> Kirim
    Email</a>
<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>

<div class="table-responsive">
    <table id="example1" class="table table-bordered  table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Pelangan</th>
                <th>Total Biaya</th>
                <th>Status</th>
                <th>Tgl Bayar</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($data->result_array() as $tagihan_lain): ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $tagihan_lain['nama'] ?></td>
                <td><?= rupiah($tagihan_lain['tagihan']); ?></td>
                <td>
                    <?php $stt = $tagihan_lain['status']  ?>
                    <?php if($stt == 'BL'){ ?>
                    <span class="label label-danger">Belum Bayar</span>
                    <?php }elseif($stt == 'LS'){ ?>
                    <span class="label label-success">Lunas</span>
                    <?php } ?>
                </td>
                <td>
                    <?php $stt = $tagihan_lain['tgl_bayar']  ?>
                    <?php if($stt == '0000-00-00'){ ?>
                    <span class="">-- / -- / ----</span>
                    <?php }elseif($stt = $tagihan_lain['tgl_bayar']){ ?>
                    <span class=""><?= tgl_indo($tagihan_lain['tgl_bayar']) ?></span>
                    <?php } ?>
                </td>
                <td><?= $tagihan_lain['keterangan'] ?></td>
                <td>
                    <a href="" class="btn btn-warning" data-toggle="modal"
                        data-target="#edit<?= $tagihan_lain['id_tagihan_lain'] ?>"><i class="fa fa-edit"></i></a>&nbsp;
                    &nbsp;
                    <a href="<?= base_url('struk/cetak_struk_tagihan_lain/'.$tagihan_lain['id_tagihan_lain']) ?>"
                        class="btn btn-info" target="_blank"><i class="fa fa-print"></i></a> <br>
                    <a href="https://api.whatsapp.com/send?phone=<?= $tagihan_lain['no_hp']; ?>&text=Terima kasih Sdr/i%20<?= $tagihan_lain['nama'] ?>, Sudah mempercayai layanan kami ( KassandraWiFi )
                  Berikut adalah total biaya <?= $tagihan_lain['keterangan']; ?> anda : <?= rupiah($tagihan_lain['tagihan']); ?> dengan status tagihan <?php $stt = $tagihan_lain['status'] ?> <?php if($stt == 'BL'){ ?>*Belum di bayar*. <?php }elseif($stt == 'LS'){ ?>LUNAS.<?php } ?>
                  %0ATetap nikmati layanan hotspot unlimited 24 jam non stop tanpa lemot dari KassandraWiFi.
                  %0A%0AAnda juga bisa mendownload ataupun melihat struk total biaya anda di aplikasi KassandraWiFi
                  %0A<?= base_url('struk/cetak_struk_tagihan_lain/'.$tagihan_lain['id_tagihan_lain']) ?>
                  
                  %0A%0A_Pesan ini dikirim otomatis oleh system aplikasi KassandraWiFi._
                  %0A-wifi@kassandra.my.id-" target=" _blank" title="Pesan WhatsApp" class="btn btn-success">
                        <b>Whatsapp</b>
                    </a>
                </td>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
    </table>

    <!-- Modal tambah tagihan lain-->
    <div class="modal fade" id="modalTambahTagihanlain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <form action="<?= base_url('admin/tagihan_lain/add') ?>" method="post">

                            <tr>
                                <th>Nama Pelanggan</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="id_pelanggan" class="form-control" required="">
                                        <option value="">--Pilih Pelanggan--</option>
                                        <?php 
                                        $pelanggan = $this->db->get('tb_pelanggan')->result_array(); 
                                        foreach($pelanggan as $plg): ?>
                                        <option value="<?= $plg['id_pelanggan'] ?>">
                                            <?= ucfirst($plg['id_pelanggan']) ?> |
                                            <?= ucfirst($plg['nama']) ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Tagihan</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="tagihan" class="form-control"
                                        placeholder="Total biaya tagihan" required="">
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="status" class="form-control" required="">
                                        <option value="">--Pilih Status--</option>
                                        <option value="BL">Belum Lunas</option>
                                        <option value="LS">Lunas</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Tgl Bayar</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" name="tgl_bayar" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <th>keterangan</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="keterangan" class="form-control"
                                        placeholder="Tagihan lainnya ?" required="">
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
    <!-- End Modal-->

    <!-- Modal edit tagihan lain-->
    <?php foreach($data->result_array() as $tagihan_lain): ?>
    <div class="modal fade" id="edit<?= $tagihan_lain['id_tagihan_lain'] ?>" tabindex="-1" role="dialog"
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
                        <form action="<?= base_url('admin/tagihan_lain/edit/'.$tagihan_lain['id_tagihan_lain']) ?>"
                            method="post">
                            <tr>
                                <th class="col-md-2">ID Tagihan Lain</th>
                                <td>
                                    <input type="text" name="id_tagihan_lain"
                                        value="<?= $tagihan_lain['id_tagihan_lain'] ?>" class="form-control" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>ID Pelanggan</th>
                                <td>
                                    <input type="text" name="id_pelanggan"
                                        value="<?= $tagihan_lain['id_pelanggan'] ?> | <?= $tagihan_lain['nama'] ?>"
                                        class="form-control" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <select name="status" class="form-control">
                                        <option value="BL"
                                            <?php if($tagihan_lain['status'] == "BL"){echo "selected";} ?>>Belum Saya
                                            Bayar</option>
                                        <option value="LS"
                                            <?php if($tagihan_lain['status'] == "LS"){echo "selected";} ?>>LUNAS
                                        </option>
                                    </select>
                            </tr>
                            <tr>
                                <th>Tgl bayar</th>
                                <td>
                                    <input type="date" name="tgl_bayar" value="<?= $tagihan_lain['tgl_bayar'] ?>"
                                        class="form-control" required="">
                                </td>
                            </tr>
                            <tr>
                                <th>tagihan</th>
                                <td>
                                    <input type="number" name="tagihan" value="<?= $tagihan_lain['tagihan'] ?>"
                                        class="form-control" required="">
                                </td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>
                                    <input type="text" name="keterangan" value="<?= $tagihan_lain['keterangan'] ?>"
                                        class="form-control" required="">
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <button href="" class="btn btn-warning" data-dismiss="modal">Kembali</button>
                                    &nbsp;&nbsp;
                                    <input type="submit" name="kirim" value="Simpan" class="btn btn-success">
                                    &nbsp;&nbsp;
                                    <a href="<?= base_url('admin/tagihan_lain/hapus/'.$tagihan_lain['id_tagihan_lain']) ?>"
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
    <!-- End Modal-->

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