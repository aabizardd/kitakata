<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="index-2.html">
                        <img src="<?= base_url('/') ?>assets/img/logo/logo-blue.png" alt="Logo" />
                    </a>
                </div>
                <h1 class="auth-title">Log in Admin.</h1>
                <p class="auth-subtitle mb-5">
                    Log in with your data that you entered during registration.
                </p>

                <?= $this->session->flashdata('message') ?>

                <form action="<?= base_url('admin')  ?>" method="POST">
                    <div class="form-group position-relative has-icon-left mt-4">
                        <input type="text"
                            class="form-control form-control-xl <?= form_error('username') ? "is-invalid" : "" ?>"
                            placeholder="Username" name="username" value="<?= set_value('username') ?>" />
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

                    <div class="form-group position-relative has-icon-left mt-4">
                        <input type="password"
                            class="form-control form-control-xl <?= form_error('password') ? "is-invalid" : "" ?>"
                            placeholder="Password" name="password" />
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>


                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3" id="submit" onclick="hide()">
                        Log in
                    </button>


                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3" type="button" disabled
                        id="load_login" style="display: none;">
                        <span class="spinner-border" role="status" aria-hidden="true"></span>

                    </button>
                </form>

            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right"></div>
        </div>
    </div>
</div>