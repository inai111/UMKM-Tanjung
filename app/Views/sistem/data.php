<?= $this->extend('layout/admintmp') ?>
<?= $this->section('konten') ?>
<div class="row">
    <div class="card bg-warning col-12 pt-3 pb-0">
        <div class="row">
            <div class="col-9">

                <div class="card text-white bg-primary">
                    <img class="card-img-top" src="assets" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Data Diri</h4>

                        <form class="mb-3 form-group" action="/profil/<?= $user['id'] ?>" method="POST">
                            <?= csrf_field() ?>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">Anggota Sejak</label>
                                <div class="col-sm-8">
                                    <input type="text" value="<?= $user['created_at'] ?>" readonly class="form-control-plaintext text-warning" id="colFormLabel" placeholder="col-form-label">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8 ">
                                    <input type="text" readonly class=" form-control-plaintext text-light" id="nama" value="<?= $user['nama'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="blok" class="col-sm-4 col-form-label">Block</label>
                                <div class="col-sm-8">
                                    <input type="text" name="blok" value="<?= $user['blok'] ?>" class="form-control <?= $validation->hasError('blok') ? 'is-invalid' : '' ?>" id="blok" placeholder="N 2 / x x ...">
                                    <div class="invalid-feedback"><?= $validation->getError('blok') ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nomor" class="col-sm-4 col-form-label">Whatsapp</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nomor" value="<?= $user['nomor'] ?>" class="form-control <?= $validation->hasError('nomor') ? 'is-invalid' : '' ?>" id="nomor" placeholder="08788888">
                                    <div class="invalid-feedback"><?= $validation->getError('nomor') ?></div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-3">
                <?php if (!$user['img']) : ?>
                    <img src="assets/img/default/default.png" alt="" class="img-fluid ">
                <?php else : ?>
                    <img src="assets/img/fotoProfile/<?= $user['img'] ?>" alt="" class="img-fluid ">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>