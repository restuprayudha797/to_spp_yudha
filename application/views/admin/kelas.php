<!-- DataTales Example -->
<div class="container">
    <?= $this->session->userdata('admin_message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kelas/Jurusan</h6>
            <!-- Button trigger modal -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                Tambah Kelas
            </button>



        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>No.</th>
                        <th>Nama Kelas</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($kelas as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['nama_kelas']; ?></td>
                                <td><?= $row['kompetensi_keahlian']; ?></td>

                                <td>
                                    <a href="<?= base_url('admin/deleteKelas/') . $row['id_kelas']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menhapus data ini?');">Hapus</a>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $row['id_kelas'] ?>">
                                        edit
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



<?php foreach ($kelas as $row) : ?>
    <!-- Modal -->
    <div class="modal fade" id="edit<?= $row['id_kelas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kelas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/editKelas/' . $row['id_kelas']) ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" value="<?= $row['nama_kelas'] ?>" placeholder="Masukkan Nama Kelas" required>
                        </div>
                        <div class="form-group">
                            <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                            <input type="text" name="kompetensi_keahlian" class="form-control" value="<?= $row['kompetensi_keahlian'] ?>" placeholder="Masukkan Nama Kompetensi Keahlian" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit Kelas</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>
<!-- end modal -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/kelas') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control" placeholder="Masukkan Nama Kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                        <input type="text" name="kompetensi_keahlian" class="form-control" placeholder="Masukkan Nama Kompetensi Keahlian" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Kelas</button>
                </div>
        </div>
        </form>
    </div>
</div>