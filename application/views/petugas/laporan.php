<!-- DataTales Example -->
<div class="container">
    <?= $this->session->userdata('petugas_message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
            <!-- Button trigger modal -->

            <div class="col mt-3">
                <a href="<?= base_url('petugas/cetakLaporan'); ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>Cetak</a>
                <a href="<?= base_url('petugas/getPembayaranByMonth'); ?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-print"></i>Cetak Bulan Ini</a>
            </div>

        </div>
        <div class="card-body">
            <div class="">
                <table class="table table-bordered">

                    <th>No.</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Tanggal</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>SPP</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['nisn']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['nama_kelas']; ?></td>
                            <td><?= $row['tgl_bayar']; ?></td>
                            <td><?= $row['bulan_bayar']; ?></td>
                            <td><?= $row['tahun_bayar']; ?></td>
                            <td><?= $row['jumlah_bayar']; ?></td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>

                </table>
            </div>
        </div>
    </div>
</div>