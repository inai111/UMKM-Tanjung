<?= $this->extend('layout/admintmp') ?>
<?= $this->section('konten') ?>
<div class="row">
    <div class="col-8 mb-3">
        <form action="/kas" method="POST">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Tanggal</span>
                </div>
                <input type="date" name="tanggal" value="<?= $cari['tanggal1'] ?>" aria-label="First name" class="form-control">
                <div class="input-group-prepend">
                    <span class="input-group-text">Ke</span>
                </div>
                <input type="date" name="tanggal2" value="<?= $cari['tanggal2'] ?>" aria-label="Last name" class="form-control">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" type="submit" id="cari">Cari</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-4 mb-3 text-center">
        <form action="/print" class="" method="POST">
            <input type="hidden" name="tanggal" value="<?= $cari['tanggal1'] ?>" aria-label="First name" class="form-control">
            <input type="hidden" name="tanggal2" value="<?= $cari['tanggal2'] ?>" aria-label="Last name" class="form-control">
            <button type="submit" class="p-2 btn btn-sm btn-primary"><i class=" mx-2 fas fa-download fa-sm text-white-50"></i>Cetak</button>
        </form>
    </div>
</div>

<table class="table table-striped table-hover table-inverse table-responsive-xl py-3">
    <thead class="thead-inverse">
        <tr>
            <th>No.</th>
            <?php if ($user['role'] == 3) : ?>
                <th>Aksi</th>
            <?php endif; ?>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 + (6 * ($current - 1));
        foreach ($kastable as $ut) : ?>
            <tr class="<?= ($ut['pemasukan']) ? 'table-success' : 'table-warning' ?>">
                <td scope="row"><?= $i ?></td>
                <?php if ($user['role'] == 3) : ?>
                    <td>
                        <form action="/hapuskas/<?= $ut['id'] ?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Yakin ingin menghapus data?')">Hapus </button>
                        </form>
                    </td>
                <?php endif; ?>
                <td scope="row"><?= $ut['tanggal'] ?></td>
                <td scope="row"><?= $ut['keterangan'] ?></td>
                <td scope="row">Rp.<?= number_format($ut['pemasukan']) ?></td>
                <td scope="row">Rp.<?= number_format($ut['pengeluaran']) ?></td>
                <td scope="row">Rp.<?= number_format($ut['saldo']) ?></td>
            </tr>
        <?php $i++;
        endforeach; ?>
    </tbody>
</table>
<?= $pager->links('kas', 'pagination_cus') ?>
<?= $this->endsection() ?>