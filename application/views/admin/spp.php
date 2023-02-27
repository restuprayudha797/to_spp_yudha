<!-- DataTales Example -->
<div class="container">
    <?= $this->session->userdata('admin_message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Spp</h6>
            <!-- Button trigger modal -->
            <!-- Button trigger modal -->




        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>No.</th>
                        <th>Tahun</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($spp as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['tahun']; ?></td>
                                <td><?= $row['nominal']; ?></td>

                                <td>
                                    <a href="<?= base_url('admin/deleteSpp/') . $row['id_spp']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menhapus data ini?');">Hapus</a>
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