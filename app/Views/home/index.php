<?= $this->extend('layout/template') ?>
<?= $this->section('konten') ?>
<div class="container ">

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Saldo Kas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($kas['saldo']) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Anggota</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card mt-5 py-2 shadow">
                <div class="card-body" style="min-height: 620px;">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-3">
                        Foto Kegiatan</div>

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php foreach ($img as $i => $im) : ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>"></li>
                            <?php endforeach; ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php foreach ($img as $i => $im) : ?>
                                <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                    <img class="d-block img-fluid" src="assets/img/karosel/<?= $im['img'] ?>" alt="<?= $im['judul'] ?>">
                                    <div class="carousel-caption text-dark shadow  rounded bg-light p-0 mb-3 d-none d-md-block">
                                        <h5><?= $im['judul'] ?></h5>
                                        <small><?= $im['tanggal'] ?></small>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card mt-5 py-2 shadow">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-3">
                        Video Kegiatan</div>
                    <iframe class="w-100" height="345" src="https://www.youtube.com/embed/WBAKR4FevhA">
                    </iframe>
                </div>
            </div>
        </div>

    </div>
    <div class="sticky-top">
        <div class="bg-warning w-100 py-3 px-2">

            <a href="https://www.youtube.com/channel/UCpFKKW453CsZ_t6Ovj30r2g" class="btn btn-sm p-1 mx-2 rounded-circle btn-danger ">
                <i class="fab fa-youtube fa-2x "></i>
            </a>
            <a href="" class="btn btn-sm  mx-2 rounded-circle btn-danger ">
                <i class="fab fa-instagram fa-2x "></i>
            </a>
        </div>
    </div>
</div>

<?= $this->endsection() ?>