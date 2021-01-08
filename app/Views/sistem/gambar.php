<?= $this->extend('layout/admintmp') ?>
<?= $this->section('konten') ?>
<div class="card bg-primary p-3">
    <?= $pesan ?>
    <div class="row">
        <div class="col-8 mb-3">
            <form action="/gambar" method="POST">
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
                <a href="/gambartambah" class=" text-center">
                    <i class="fas fa-7x text-success fa-plus"></i></h4>
                </a>
                <div class="card-body text-center">
                    <h4 class="card-title">Tambah Gambar</h4>
                </div>
            </div>
        </div>

        <?php foreach ($img as $im) : ?>
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card pt-3 h-100">

                    <a href="assets/img/karosel/<?= $im['img'] ?>">
                        <img src="assets/img/karosel/<?= $im['img'] ?>" alt="" class="img-fluid">
                    </a>

                    <div class="card-body text-center">
                        <h4 class="card-title"><?= $im['judul'] ?></h4>
                        <p class="card-text"><?= date_format(date_create($im['tanggal']), 'd-M-Y') ?></p>
                        <?php if ($user['role'] == 3) : ?>
                            <form action="/gambar/<?= $im['id'] ?>" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger w-100 btn-sm" onclick="return confirm('Apakah Yakin ingin menghapus foto?')">Hapus</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>
<?= $pager->links('img', 'pagination_cus') ?>
<?= $this->endsection() ?>