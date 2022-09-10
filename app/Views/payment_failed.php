<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

<!-- Page -->
<div class="page main-signin-wrapper">
    <div class="be-content">
    <div class="container text-center">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="pay-sucess">
                    <div class="pd">
                    <div class="image-section">
                        <img src="<?= ASSETS; ?>images/sucess.png" alt="">
                    </div>
                    <h1 class="text-danger">Payment Failed </h1>
                    <h6><?=$msg;?> </h6>
                    <!-- <p><b>Transaction Id: </b> <//?=$txn;?> </p> -->
                   
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>