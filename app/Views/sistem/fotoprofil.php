<?= $this->extend('layout/admintmp') ?>
<?= $this->section('konten') ?>
<div class="text-center">
    <div class="row">
        <div class="col mb-4">
            <?php if (!$user['img']) : ?>
                <img src="assets/img/default/default.png" alt="" class="img-fluid w-25 img-preview">
            <?php else : ?>
                <img src="assets/img/fotoProfile/<?= $user['img'] ?>" alt="" class="img-fluid w-25 img-preview">
            <?php endif; ?>

        </div>

    </div>
    <div class="row">
        <div class="mx-auto cols">
            <?= $pesan ?>
            <form class="" action="/fotoprofil/<?= $user['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group custom-file mb-2">
                    <input onchange="inputFoto()" type="file" name="foto" class="pr-5 custom-file-input  <?= $validation->hasError('foto') ? 'is-invalid' : '' ?>" id="foto">
                    <label class="custom-file-label" for="foto">Pilih Gambar</label>
                    <div class="invalid-feedback"><?= $validation->getError('foto') ?></div>
                </div>
                <button type="submit" class="btn btn-primary mb-2 w-100">Simpan</button>
            </form>



            <form action="/fotoprofil/<?= $user['id'] ?>" method="POST">
                <input type="hidden" value="DELETE" name="_method">
                <button type="submit" class=" btn btn-danger w-100" onclick="return confirm('Apakah Yakin ingin menghapus Foto?')" <?= ($user['img']) ? '' : 'disabled'; ?>>Hapus</button>
            </form>

        </div>
    </div>

</div>
<?= $this->endsection() ?>