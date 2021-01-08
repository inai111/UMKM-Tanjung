<?= $this->extend('layout/template') ?>
<?= $this->section('konten') ?>
<div class="container row">
    <div class="col-6">

    </div>
    <div class="card text-left col-6">
        <div class="card-body">
            <h4 class="card-title">Daftar Anggota</h4>
            <p class="card-text">
                <div class="container my-5">
                    <form action="/auth/valid" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : '' ?>" name="nama" id="nama" value="<?= old('nama') ?>" placeholder="Nama">
                            <div class="invalid-feedback"><?= $validation->getError('nama') ?></div>
                        </div>
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" name="username" value="<?= old('username') ?>" id="Username" placeholder="Username">
                            <div class="invalid-feedback"><?= $validation->getError('username') ?></div>
                        </div>
                        <div class="form-group">
                            <label for="block">Block</label>
                            <input type="text" class="form-control <?= $validation->hasError('block') ? 'is-invalid' : '' ?>" name="block" value="<?= old('block') ?>" id="block" placeholder="block">
                            <div class="invalid-feedback"><?= $validation->getError('block') ?></div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="password">Password Baru</label>
                                <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" name="password" id="password" placeholder="Password">
                                <div class="invalid-feedback"><?= $validation->getError('password') ?></div>
                            </div>
                            <div class="col">
                                <label for="password2">Ulangi Passsword</label>
                                <input type="password" class="form-control <?= $validation->hasError('password2') ? 'is-invalid' : '' ?>" name="password2" id="password2" placeholder="Password">
                                <div class="invalid-feedback"><?= $validation->getError('password2') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nomor">Nomor Whatsapp</label>
                            <input type="nomor" class="form-control <?= $validation->hasError('nomor') ? 'is-invalid' : '' ?>" name="nomor" value="<?= old('nomor') ?>" id="nomor" placeholder="Whatsapp [e.g 08785xxxx]">
                            <div class="invalid-feedback"><?= $validation->getError('nomor') ?></div>
                        </div>
                        <div class="row">
                            <button class="btn bg-primary text-light w-100 ">Daftar</button>
                        </div>
                    </form>
                </div>
                <a href="/auth"><small>Sudah Punya Akun Anggota UMKM Tanjung? Masuk Disini </small></a>

            </p>
        </div>
    </div>
</div>
<?= $this->endsection() ?>