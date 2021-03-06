<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <h2 class="my-2">Ubah Data</h2>
            <form action="/jadwal/update/<?= $jadwal['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $jadwal['slug']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $jadwal['gambar']; ?>">
                <div class="form-group row">
                    <label for="kode_kelas" class="col-sm-2 col-form-label">Kode Kelas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('kode_kelas')) ? 'is-invalid' : '' ?>" id="kode_kelas" name="kode_kelas" autofocus value="<?= $jadwal['kode_kelas']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kode_kelas'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="progdi" class="col-sm-2 col-form-label">Program Studi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="progdi" name="progdi" value="<?= $jadwal['progdi']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="matkul" class="col-sm-2 col-form-label">Matakuliah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="matkul" name="matkul" value="<?= $jadwal['matkul']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jadwal" class="col-sm-2 col-form-label">Jadwal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="jadwal" name="jadwal" value="<?= $jadwal['jadwal']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $jadwal['gambar']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : '' ?>" id="gambar" name="gambar" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar'); ?>
                            </div>
                            <label class="custom-file-label" for="gambar"><?= $jadwal['gambar']; ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>