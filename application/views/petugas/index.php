<!-- DataTales Example -->
<div class="container">
    <?= $this->session->userdata('petugas_message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
            <!-- Button trigger modal -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                Tambah data petugas
            </button>



        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Nama Petugas</th>
                        <th>level</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($petugas as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['username']; ?></td>
                                <td><?= $row['nama_petugas']; ?></td>
                                <td><?= $row['level']; ?></td>
                                <?php if ($row['aktif'] == 'Y') : ?>
                                    <td class="bg-success">
                                        aktif
                                    </td>
                                <?php else :  ?>
                                    <td class="bg-danger">
                                        Tidak aktif
                                    </td>
                                <?php endif ?>

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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data petugas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('petugas') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_petugas">Nama petugas</label>
                        <input type="text" name="nama_petugas" class="form-control" placeholder="Masukkan Nama petugas" required>
                    </div>
                    <div class="form-group">
                        <label for="kompetensi_keahlian">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kompetensi_keahlian">Level User</label>
                        <select name="level" class="form-select">
                            <option value="">- Pilih Level -</option>
                            <option value="petugas">petugas</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                    <div class="container">
                        <div class=" mt-2  ">
                            <div class="aktif">
                                <input class="form-check-input" type="radio" name="aktif" value="Y">
                                <label class="form-check-label" for="FlexRadioDisabled">
                                    Aktif
                                </label>
                            </div>
                            <div class="nonaktif">
                                <input class="form-check-input" type="radio" name="aktif" value="N">
                                <label class="form-check-label" for="FlexRadioDisabled">
                                    Tidak Aktif
                                </label>
                            </div>
                        </div>
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