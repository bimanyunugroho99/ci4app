<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Jadwal</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $jadwal['gambar']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $jadwal['kode_kelas']; ?></h5>
                            <p class="card-text">Program Studi : <?= $jadwal['progdi']; ?></p>
                            <p class="card-text"> Matakuliah : <?= $jadwal['matkul']; ?></p>
                            <p class="card-text">Jadwal : <?= $jadwal['jadwal']; ?></p>

                            <a href="/jadwal/edit/<?= $jadwal['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/jadwal/<?= $jadwal['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?');">Hapus</button>
                            </form>

                            <br><br>
                            <a href="/jadwal">Kembali</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>