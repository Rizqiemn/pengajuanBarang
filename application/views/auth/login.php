<!-- Outer Row -->
<div class="row justify-content-center mt-5 pt-lg-5">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-lg-5">
                <!-- Nested Row within Card Body -->
                <div class="col">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900">Pengajuan Barang</h1>
                            <span class="text-muted">Login</span>
                        </div>

                        <?= "<div class='alert alert-danger' role='alert'>" . $this->session->flashdata('pesan') . ' </div>'; ?>

                        <?= form_open('', ['class' => 'user']); ?>
                        <div class="form-group">
                            <input autofocus="autofocus" autocomplete="off" value="<?= set_value('username'); ?>" type="text" name="username" class="form-control form-control-user" placeholder="Username">
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                        <div class="text-center mt-4">
                            <a class="small" href="<?= base_url('register') ?>">Buat Akun!</a>
                        </div>
                        <?= form_close(); ?>
                    </div>
            </div>
        </div>
    </div>
</div>