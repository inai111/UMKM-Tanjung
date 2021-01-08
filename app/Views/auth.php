<?= $this->extend('layout/template') ?>
<?= $this->section('konten') ?>
<div class="container row">
    <div class="col-6">

    </div>
    <div class="card text-left col-6">
        <div class="card-body">
            <h4 class="card-title">Login</h4>
            <p class="card-text">
                <div class="container mt-5">
                    <!-- alert -->
                    <?= $pesan ?>

                    <form action="/auth" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" class="form-control" name="username" id="Username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="row">
                            <a href="/auth/daftar" class="btn bg-light text-dark w-25">Daftar</a>
                            <button class="btn bg-primary text-light w-75 ">Masuk</button>
                        </div>
                    </form>
                </div>

            </p>
        </div>
    </div>
</div>
<!-- script alertnya -->
<script>
    $(".alert").alert();
</script>
<?= $this->endsection() ?>