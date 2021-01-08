<?= $this->extend('layout/admintmp') ?>
<?= $this->section('konten') ?>

<form action="/user" method="post">
    <div class="input-group mb-3 w-50">
        <input type="text" class="form-control " name="cari" placeholder="Cari Seseorang . . ." aria-label="Pencarian" aria-describedby="cari">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="cari">Cari</button>
        </div>
    </div>
</form>

<table class="table table-striped table-hover table-inverse table-responsive-xl py-3">
    <thead class="thead-inverse">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Whatsapp</th>
            <th>Blok</th>
            <th>Verifikasi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 + (6 * ($current - 1));
        foreach ($usertable as $ut) : ?>
            <tr class="<?= ($ut['role']) ? '' : 'table-warning' ?>">
                <td scope="row"><?= $i ?></td>
                <td>
                    <form action="/user/<?= $ut['id'] ?>" on method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Yakin ingin menghapus data?')">Hapus </button>
                    </form>
                </td>
                <td scope="row"><?= $ut['nama'] ?></td>
                <td scope="row"><?= $ut['nomor'] ?></td>
                <td scope="row"><?= $ut['blok'] ?></td>
                <td><?php if ($ut['role']) : ?>
                        <a href="/ganti/<?= $ut['id'] ?>/0" class="badge badge-success">Aktif</a>
                    <?php else : ?>
                        <a href="/ganti/<?= $ut['id'] ?>/1" class="badge badge-warning">Aktifkan</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php $i++;
        endforeach; ?>
    </tbody>
</table>
<?= $pager->links('user', 'pagination_cus') ?>
<?= $this->endsection() ?>