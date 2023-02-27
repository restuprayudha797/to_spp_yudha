<!-- DataTales Example -->
<div class="container">
    <?= $this->session->userdata('petugas_message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
            <!-- Button trigger modal -->



        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>No.</th>
                        <th>Nisn</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Spp</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($siswa as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['nisn']; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['nama_kelas']; ?></td>
                                <td><?= $row['nominal']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning mt-3" data-toggle="modal" data-target="#bayar<?= $row['nisn'] ?>">
                                        Bayar
                                    </button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= validation_errors(); ?>

<?php foreach ($siswa as $row) : ?>

    <!-- Modal -->
    <div class="modal fade" id="bayar<?= $row['nisn'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $row['nama'] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('petugas/tambahBayar') ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_petugas" value="<?= $this->session->userdata('id_user'); ?>">
                        <input type="hidden" name="id_kelas" value="<?= $siswa['id_kelas']; ?>">
                        <input type="hidden" name="id_spp" value="<?= $siswa['id_spp']; ?>">
                        <div class="form-group">
                            <label for="nisn">Nisn</label>
                            <input type="text" name="nisn" class="form-control" value="<?= $row['nisn'] ?>" placeholder="Masukkan Username" required readonly>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="nama_siswa" class="form-control" value="<?= $row['nama'] ?>" placeholder="Masukkan Nama petugas" required>
                        </div>
                        <div class="form-group">
                            <label for="kompetensi_keahlian">Nominal Spp</label>
                            <input type="text" name="spp" value="<?= $row['nominal'] ?>" class="form-control" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="kompetensi_keahlian">Nominal Spp</label>
                            <select name="bulan" class="form-select">
                                <option value="">-Pilih Bulan-</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kompetensi_keahlian">Nominal Spp</label>
                            <select name="tahun" class="form-select">
                                <?php $year_now = date('Y', time()); ?>
                                <option value="">-Pilih Tahun-</option>
                                <?php for ($i = $year_now; $i >= ($year_now - 10); $i--) : ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah petugas</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>