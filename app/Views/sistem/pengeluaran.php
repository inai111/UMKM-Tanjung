<?= $this->extend('layout/admintmp') ?>
<?= $this->section('konten') ?>
<div class="row">
    <div class="col-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pengeluaran :</h4>
                <p class="card-text"><small><?= date('l , F jS , Y', strtotime(date("Y/m/d"))) ?></small></p>

                <form action="/pengeluaran" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-10 col-lg-4 col-form-label">Tanggal</label>
                        <div class="col-sm-10 col-lg-7">
                            <input type="date" name="tanggal" class="form-control <?= $validation->hasError('tanggal') ? 'is-invalid' : '' ?>" id="tanggal">
                            <div class="invalid-feedback"><?= $validation->getError('tanggal') ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-10 col-lg-4 col-form-label">Keterangan</label>
                        <div class="col-sm-10 col-lg-7">
                            <textarea name="keterangan" id="keterangan" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : '' ?>"></textarea>
                            <div class="invalid-feedback"><?= $validation->getError('keterangan') ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pengeluaran" class="col-sm-10 col-lg-4 col-form-label">Pengeluaran</label>
                        <div class="col-sm-10 col-lg-7 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="pengeluaran" class="form-control <?= $validation->hasError('pengeluaran') ? 'is-invalid' : '' ?>" id="pengeluaran" placeholder="Angka">
                            <div class="invalid-feedback"><?= $validation->getError('pengeluaran') ?></div>
                        </div>
                    </div>

                    <button class="btn btn-secondary w-100" type="submit">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>