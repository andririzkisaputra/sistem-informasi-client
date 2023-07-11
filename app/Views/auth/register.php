<?= $this->extend('auth/auth_template'); ?>
<?= $this->section('auth'); ?>


<!-- /.login-logo -->
<div class="card">
    <div class="card-body" >
        <p class="login-box-msg">Silahkan Register Bagi Mahasiswa</p>
        <form action="/auth/valid_register">
            <div class="input-group mb-3 wider">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                <small class="invalid-feedback"></small>
            </div>
            <div class="input-group mb-3 ">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                <div class="input-group-append show-password">
                    <div class="input-group-text">
                        <span class="fas fa-eye-slash"></span>
                    </div>
                </div>
                <small class="invalid-feedback"></small>
            </div>
            <div class="input-group mb-3 wider">
                <input type="email" class="form-control" id="email" name="email" placeholder="email" autocomplete="off">
                <div class="input-group-append show-password">
                    <div class="input-group-text">
                        <span class="fas fa-eye-slash"></span>
                    </div>
                </div>
                <small class="invalid-feedback"></small>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block" id="register">Register</i></button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <hr>
        <div class="row">
            <!-- /.col -->
            <div class="col-4">
                <a href="<?= base_url('auth/login') ?>">Login</a>
            </div>
            <!-- /.col -->
        </div>
    </div>
    <!-- /.login-card-body -->
</div>

<?= $this->endSection(); ?>