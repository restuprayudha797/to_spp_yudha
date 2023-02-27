<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row text-center">
            <div class="col align-self-center">
                <img src="<?= base_url('assets/img/kop.jpg'); ?>" width="100%" class="text-center">
                <div class="col mt-3">
                    <table class="table table-bordered">
                        <tr>
                            <th>No.</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Tanggal</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>SPP</th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($spp as $s) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $s['nisn']; ?></td>
                                <td><?= $s['nama']; ?></td>
                                <td><?= $s['nama_kelas']; ?></td>
                                <td><?= $s['tgl_bayar']; ?></td>
                                <td><?= $s['bulan_bayar']; ?></td>
                                <td><?= $s['tahun_bayar']; ?></td>
                                <td><?= $s['jumlah_bayar']; ?></td>

                            </tr>
                        <?php $no++;
                        endforeach;
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- tabel -->

    <!-- create auto print script -->
    <script>
        window.print()
    </script>
    <!-- create auto print script -->


</body>

</html>