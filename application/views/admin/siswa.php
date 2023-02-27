<!-- DataTales Example -->
<div class="container">
    <?= $this->session->userdata('admin_message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
            <!-- Button trigger modal -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                Tambah Siswa
            </button>



        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>No.</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>No. Telp</th>
                        <th>SPP</th>
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
                                <td><?= $row['no_telp']; ?></td>
                                <td><?= $row['nominal']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/deleteSiswa/') . $row['nisn']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menhapus data ini?');">Hapus</a>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $row['nisn'] ?>">
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



<?php foreach ($siswa as $row) : ?>
    <!-- Modal -->
    <div class="modal fade" id="edit<?= $row['nisn'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $row['nisn'] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/siswaUpdate/' . $row['nisn']) ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nis</label>
                            <input type="text" name="nis" class="form-control" value="<?= $row['nis'] ?>" placeholder="Masukkan NIS" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" value="<?= $row['nama'] ?>" placeholder="Masukkan Nama Siswa" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Kelas</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="kelas">
                                <option value="">- Pilih Kelas -</option>
                                <?php foreach ($kelas as $row) : ?>
                                    <option value="<?= $row['id_kelas']; ?>"><?= $row['nama_kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea name="alamat" cols="10" rows="2" class="form-control" placeholder="Masukkan Alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Tlp</label>

                            <input type="text" name="nomor_telpon" class="form-control" placeholder="Masukkan no tlp" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tahun</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="id_spp">
                                <option value="">- Pilih tahun -</option>
                                <?php foreach ($tahun as $row) : ?>
                                    <option value="<?= $row['id_spp']; ?>"><?= $row['tahun']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
            <form action="<?= base_url('admin/siswa') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nisn</label>
                        <input type="text" name="nisn" class="form-control" placeholder="Masukkan NISN" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nis</label>
                        <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Siswa</label>
                        <input type="text" name="nama_siswa" class="form-control" placeholder="Masukkan Nama Siswa" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelas</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="kelas">
                            <option value="">- Pilih Kelas -</option>
                            <?php foreach ($kelas as $row) : ?>
                                <option value="<?= $row['id_kelas']; ?>"><?= $row['nama_kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <textarea name="alamat" cols="10" rows="2" class="form-control" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Tlp</label>

                        <input type="text" name="nomor_telpon" class="form-control" placeholder="Masukkan no tlp" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tahun</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id_spp">
                            <option value="">- Pilih tahun -</option>
                            <?php foreach ($tahun as $row) : ?>
                                <option value="<?= $row['id_spp']; ?>"><?= $row['tahun']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
        </div>
        </form>
    </div>
</div>