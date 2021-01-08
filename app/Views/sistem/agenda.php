<?= $this->extend('layout/admintmp') ?>
<?= $this->section('konten') ?>
<div class="card bg-primary p-3">
    <div class="row">
        <div class="col-8 mb-3">
            <form action="/agenda" method="POST">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tanggal</span>
                    </div>
                    <input type="date" name="tanggal1" aria-label="First name" class="form-control">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ke</span>
                    </div>
                    <input type="date" name="tanggal2" aria-label="Last name" class="form-control">
                    <div class="input-group-prepend">
                        <button class="btn btn-secondary" type="submit" id="cari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card pt-3">
                <a href="/agendatambah" class=" text-center">
                    <i class="fas fa-7x text-success fa-plus"></i></h4>
                </a>
                <div class="card-body text-center">
                    <h4 class="card-title">Tambah Agenda</h4>
                </div>
            </div>
        </div>

        <?php foreach ($agenda as $im) : ?>
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card pt-3  <?= (date_create($im['expired']) <= date_create(date('Y/m/d'))) ? 'bg-warning' : 'bg-success' ?>">
                    <p class="my-0 ml-2"><small class="text-light">Tgl. <?= date_format(date_create($im['tanggal']), 'd/m') . ' - ' . date_format(date_create($im['expired']), 'd/m Y') ?></small></p>

                    <div class="card-body bg-light">
                        <h4 class="card-title">" <?= $im['agenda'] ?> "</h4>
                        <p class="card-text"><small class="text-muted"><?= date_format(date_create($im['created_at']), 'l, jS F y G:i') ?></small></p>
                        <?php if ($user['role'] == 3) : ?>
                            <form action="/agenda/<?= $im['id'] ?>" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="w-100 btn btn-sm btn-danger" onclick="return confirm('Apakah Yakin ingin menghapus agenda?')">Hapus</button>
                            </form>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>
<?= $pager->links('agenda', 'pagination_cus') ?>

<?= $this->endsection() ?>