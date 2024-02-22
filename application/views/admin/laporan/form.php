<?php $this->load->view('template/header'); ?>
<?= $this->session->flashdata('pesan') ?>

<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>
        <i class="icon fa fa-info"></i>laporan Pemasukan dan Pengeluaran
    </h4>
</div>
<div class="table-responsive">
    <table id="example1" class="table table-bordered  table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th colspan="2">Jenis Laporan</th>
                
            </tr>
        </thead>
        <!-- Bagian Tampilan Laporan -->
        <tbody>
            <?php $no=1; foreach ($years_range as $year): ?>
            <tr>
                <td><b><?= $no; ?></b></td>
                <td><b>Laporan Tahun <?= $year; ?></b></td>
            </tr>
            <tr>
                <td style="width: 20%; text-align:right;">Pemasukan </td>
                <td style="width: 80%;"><?= rupiah($data[$year]['sum_tagihanLS']); ?></td>
            </tr>
            <tr>
                <td style="width: 20%; text-align:right;">Pengeluaran </td>
                <td><?= rupiah($data[$year]['pengeluaran']); ?></td>
            </tr>
            <tr>
                <td style="width: 20%; text-align:right;">Total Pendapatan Bersih </td>
                <td><?= rupiah($data[$year]['sum_tagihanLS'] - $data[$year]['pengeluaran']); ?></td>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>

    </table>
</div>

<?php $this->load->view('template/footer'); ?>

<?php
function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 => 'Januari',
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

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>