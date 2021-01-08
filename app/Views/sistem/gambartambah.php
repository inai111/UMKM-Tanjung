<?= $this->extend('layout/admintmp') ?>
<?= $this->section('konten') ?>
<div class="card bg-primary p-4">
    <div class="card-body bg-light">
        <form action="/gambartambah" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row mb-4">
                <div class="col-md-12 col-lg-4 mb-2">
                    <img src="assets/img/default/default.jpg" alt="" class="img-preview img-thumbnail">
                </div>
                <div class="col-md-4 col-lg-2">
                    <label class="mt-2" for="gambar">Gambar</label>
                </div>
                <div class="col-md-8 col-lg-6">
                    <div class="custom-file">
                        <input type="file" onchange="inputGambar()" class="custom-file-input" name="gambar" id="gambar">
                        <label class="custom-file-label pr-5 <?= $validation->hasError('gambar') ? 'is-invalid' : '' ?>" for="gambar">Ambil File Gambar</label>
                        <div class="invalid-feedback"><?= $validation->getError('gambar') ?></div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-2 ">
                    <label class="" for="tanggal">Tanggal</label>
                </div>
                <div class="col-md-10">
                    <input type="date" class="form-control <?= $validation->hasError('tanggal') ? 'is-invalid' : '' ?>" name="tanggal" id="tanggal">
                    <div class="invalid-feedback"><?= $validation->getError('tanggal') ?></div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-2 ">
                    <label class="" for="judul">Judul</label>
                </div>
                <div class="col-md-10">
                    <textarea class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : '' ?>" name="judul" id="judul"></textarea>
                    <div class="invalid-feedback"><?= $validation->getError('judul') ?></div>
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100">Simpan</button>

        </form>
    </div>
</div>
<?= $this->endsection() ?>