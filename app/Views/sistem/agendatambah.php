<?= $this->extend('layout/admintmp') ?>
<?= $this->section('konten') ?>
<div class="card bg-primary p-4">
    <div class="card-body bg-light">
        <form action="/agendatambah" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
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
                    <label class="" for="agenda">Agenda</label>
                </div>
                <div class="col-md-10">
                    <textarea class="form-control <?= $validation->hasError('agenda') ? 'is-invalid' : '' ?>" name="agenda" id="agenda"></textarea>
                    <div class="invalid-feedback"><?= $validation->getError('agenda') ?></div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-2 ">
                    <label class="" for="exp">Berakhir hingga</label>
                </div>
                <div class="col-md-10">
                    <input type="date" class="form-control <?= $validation->hasError('exp') ? 'is-invalid' : '' ?>" name="exp" id="exp">
                    <div class="invalid-feedback"><?= $validation->getError('exp') ?></div>
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100">Simpan</button>

        </form>
    </div>
</div>
<?= $this->endsection() ?>