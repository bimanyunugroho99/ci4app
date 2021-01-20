<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <a href="/jadwal/create" class="btn btn-primary mt-2">Tambah Data</a>
            <h2 class="my-2">Jadwal Kuliah</h2>
            <!-- Pencarian -->
            <!-- end -->
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode kelas</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jadwal as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $row['kode_kelas']; ?></td>
                            <td><?= $row['progdi']; ?></td>
                            <td>
                                <a href="/jadwal/<?= $row['slug']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>