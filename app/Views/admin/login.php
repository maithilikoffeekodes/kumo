<?= $this->extend(THEME . 'home') ?>

<?= $this->section('content') ?>

<div class="row text-center pl-0 pr-0 ml-0 mr-0" style="margin-top: 176px;">
    <div class="col-lg-3 d-block mx-auto">
        <div class="text-center mb-2">
            <img src="<?= ASSETS; ?>img/brand/logo.png" class="header-brand-img" alt="logo">
            <img src="<?= ASSETS; ?>img/brand/logo-light.png" class="header-brand-img theme-logos" alt="logo">
        </div>
        <div class="card custom-card">
            <div class="card-body">
                <h4 class="text-center">Signin to Your Account</h4>
                <form action="<?= url('admin/Auth/login') ?>" method="post">
                    <?php if (!empty($msg) && $msg['st'] == 'failed') { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
                            <div class="icon"> <span class="mdi mdi-close-circle-o"></span></div>
                            <div class="message"><strong>Failed!</strong> <?= $msg['msg']; ?></div>
                        </div>
                    <?php } ?>
                    <div class="form-group text-left">
                        <label>Email</label>
                        <input class="form-control" placeholder="Enter your email" type="email" name="email" required>
                    </div>
                    <div class="form-group text-left">
                        <label>Password</label>
                        <input class="form-control" placeholder="Enter your password" type="password" name="password" required>
                    </div>
                    <button type="submit" name="submit" class="btn ripple btn-main-primary btn-block">Sign In</button>
                </form>
                <!-- <div class="mt-3 text-center">
                    <p class="mb-1"><a href="">Forgot password?</a></p>
                    <p class="mb-0">Don't have an account? <a href="signup.html">Create an Account</a></p>
                </div> -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>