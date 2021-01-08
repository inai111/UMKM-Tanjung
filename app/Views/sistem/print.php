<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>

    <link href="assets/vendor/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/vendor/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <div class="container my-2 p-5">
        <div class="row border-bottom-dark mb-4">
            <div class="col-3 ml-5 my-2">
                <img src="favicon.ico" class="w-50" alt="">
            </div>
            <div class="font-weight-bold text-dark col-auto mx-5 text-center">
                <p class="display-4">UMKM Tanjung</p>
                <h3>Laporan Anggaran UMKM Tanjung Bulan : </h3>
                <?php if ($cari['tanggal1'] && $cari['tanggal2']) : ?>
                    <h5><?= date_format(date_create($cari['tanggal1']), 'd-M-Y') . ' hingga ke tanggal ' . date_format(date_create($cari['tanggal2']), 'd-M-Y') ?> </h5>
                <?php else : ?>
                    <h5><?= date_format(date_create($tanggal['tanggal']), 'd-M-Y') . ' hingga ke tanggal ' . date('d-m-Y') ?> </h5>
                <?php endif; ?>
            </div>
        </div>
        <div class="container">


            <table class="table table-striped table-hover table-inverse table-responsive-xl py-3">
                <thead class="thead-inverse">
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Pemasukan</th>
                        <th>Pengeluaran</th>
                        <th>Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($kastable as $ut) : ?>
                        <tr class="<?= ($ut['pemasukan']) ? 'table-success' : 'table-warning' ?>">
                            <td scope="row"><?= $i ?></td>
                            <td scope="row"><?= date_format(date_create($ut['tanggal']), 'd-M-Y') ?></td>
                            <td scope="row"><?= $ut['keterangan'] ?></td>
                            <td scope="row">Rp.<?= number_format($ut['pemasukan']) ?></td>
                            <td scope="row">Rp.<?= number_format($ut['pengeluaran']) ?></td>
                            <td scope="row">Rp.<?= number_format($ut['saldo']) ?></td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</body>
<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/vendor/js/sb-admin-2.min.js"></script>
<script>
    window.print();
</script>

</html>