<?= $this->extend('layout/admintmp') ?>
<?= $this->section('konten') ?>
<div class="card text-white bg-primary">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
        <h4 class="card-title">Informasi Tabel Saat ini</h4>
        <p class="card-text"><small><?= date('l , jS F , Y', strtotime(date("Y/m/d"))) ?></small></p>
        <div class="row">

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Saldo Kas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($kas['saldo']) ?></div>
                                <div class="mt-3 mb-0">
                                    <?php if ($user['role'] == 3) : ?>
                                        <a href="/pemasukan" class="btn btn-sm btn-success mb-2">Buat Pemasukan</a>
                                        <a href="/pengeluaran" class="btn btn-sm btn-danger mb-2">Buat Pengeluaran</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Anggota</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah ?> Orang</div>
                                <div class="mt-3 mb-0">
                                    <a href="/user" class="btn btn-sm btn-primary mb-2">Cek Tabel</a>
                                </div>
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
                <div class="card py-2 shadow">
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

            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Agenda</div>

                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php foreach ($agenda as $i => $ag) : ?>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>"></li>
                                        <?php endforeach; ?>
                                    </ol>
                                    <div class="carousel-inner">
                                        <?php foreach ($agenda as $i => $ag) : ?>
                                            <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                                <small class="text-center card-tittle text-dark">Tgl. <?= date_format(date_create($ag['tanggal']), 'd/m') . ' - ' . date_format(date_create($ag['expired']), 'd/m Y') ?></small>
                                                <h5 class="ml-5 h5 font-weight-bold text-gray-800 py-4">" <?= $ag['agenda'] ?> "</h5>
                                                <small class="text-center card-tittle text-dark"><?= date_format(date_create($ag['created_at']), 'l, F y G:i') ?></small>
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
                                <!-- end karosel -->

                                <div class="my-3">
                                    <a href="/agendatambah" class="btn btn-sm btn-primary ">Buat Agenda</a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>
<?= $this->endsection() ?>