<?= $this->extend('layout/admintmp') ?>
<?= $this->section('konten') ?>
<div class="row">
    <div class="card bg-danger col-12 pt-3 pb-0">
        <div class="row">
            <div class="col-9">
                <div class="card text-dark bg-light">
                    <img class="card-img-top" src="assets" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Data Akun</h4>
                        <?= $pesan ?>
                        <form class="mb-3 form-group" action="/akun/<?= $user['id'] ?>" method="POST">
                            <?= csrf_field() ?>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">Anggota Sejak</label>
                                <div class="col-sm-8">
                                    <input type="email" value="<?= $user['created_at'] ?>" readonly class="form-control-plaintext " id="colFormLabel" placeholder="col-form-label">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8 ">
                                    <input type="email" name="nama" readonly class="form-control-plaintext " id="nama" value="<?= $user['nama'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-sm-4 col-form-label">Username</label>
                                <div class="col-sm-8">
                                    <input type="text" name="username" readonly value="<?= $user['username'] ?>" class="form-control-plaintext " id="username" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password2" class="col-sm-4 col-form-label">Password Lama</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password2" class="form-control <?= $validation->hasError('password2') ? 'is-invalid' : '' ?>" id="password3" placeholder="password lama">
                                    <div class="invalid-feedback"><?= $validation->getError('password2') ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">Password baru</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" id="password" placeholder="password baru">
                                    <div class="invalid-feedback"><?= $validation->getError('password') ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password3" class="col-sm-4 col-form-label">Ulangi Password Baru</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password3" class="form-control <?= $validation->hasError('password3') ? 'is-invalid' : '' ?>" id="password" placeholder="password baru">
                                    <div class="invalid-feedback"><?= $validation->getError('password3') ?></div>
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