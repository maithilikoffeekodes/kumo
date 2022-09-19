<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>


<section class="middle">
    <div class="container">
        <div class="row align-items-start justify-content-between">

            <div class="col-12 col-md-12 col-lg-4 col-xl-4 text-center miliods">
                <div class="d-block border rounded mfliud-bot">
                    <div class="dashboard_author px-2 py-5">
                        <div class="dash_auth_thumb circle p-1 border d-inline-flex mx-auto mb-2">
                            <img src="assets/img/team-1.jpg" class="img-fluid circle" width="100" alt="" />
                        </div>
                        <div class="dash_caption">
                            <h4 class="fs-md ft-medium mb-0 lh-1">Adam Wishnoi</h4>
                            <span class="text-muted smalls">Australia</span>
                        </div>
                    </div>

                    <div class="dashboard_author">
                        <h4 class="px-3 py-2 mb-0 lh-2 gray fs-sm ft-medium text-muted text-uppercase text-left">Dashboard Navigation</h4>
                        <ul class="dahs_navbar">
                            <li><a href="<?= url('Home/my_order') ?>" class="active"><i class="lni lni-shopping-basket mr-2"></i>My Order</a></li>
                            <li><a href="<?= url('Home/wishlist') ?>"><i class="lni lni-heart mr-2"></i>Wishlist</a></li>
                            <li><a href="<?= url('Home/register') ?>"><i class="lni lni-user mr-2"></i>Profile Info</a></li>
                            <!-- <li><a href="<//?= url('Home/my_order')?>"><i class="lni lni-map-marker mr-2"></i>Addresses</a></li> -->
                            <!-- <li><a href="payment-methode.html"><i class="lni lni-mastercard mr-2"></i>Payment Methode</a></li> -->
                            <li><a href="<?= url('Home/logout') ?>"><i class="lni lni-power-switch mr-2"></i>Log Out</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-8 col-xl-8">
                <!-- row -->
                <div class="row align-items-center">

                    <form action="<?= url('Home/change_password') ?>" method="post" class="ajax-form-submit row m-0">

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="small text-dark ft-medium">Current Password *</label>
                                <input type="password" class="form-control" name="password" value="" required />
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="small text-dark ft-medium">New Password *</label>
                                <input type="password" class="form-control" name="npassword" value="" required />
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="small text-dark ft-medium">Confirm Password*</label>
                                <input type="password" class="form-control" name="cpassword" value="" required />
                            </div>
                        </div>
                        <?php if (!empty($msg) && $msg['st'] == 'failed') { ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
                                <div class="icon"> <span class="mdi mdi-close-circle-o"></span></div>
                                <div class="message"><strong>Failed!</strong> <?= $msg['msg']; ?></div>
                            </div>
                        <?php } ?>
                        <div class="error-msg"></div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <button type="submit" id="save_data" class="btn btn-dark">Save Changes</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- row -->
            </div>

        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $('.ajax-form-submit').on('submit', function(e) {

        $('#save_data').prop('disabled', true);
        $('.error-msg').html('');
        $('.form_proccessing').html('Please wait...');
        e.preventDefault();
        var aurl = $(this).attr('action');
        var form = $(this);
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData(form[0]);
        }
        $.ajax({
            type: "POST",
            url: aurl,
            cache: false,
            contentType: false,
            processData: false,
            data: formdata ? formdata : form.serialize(),
            success: function(response) {
                if (response.st == 'success') {
                    swal("success!", "Your password changed successfully!", "success"); //swal is library
                    // datatable_load('');
                    window.location.href = "<?php echo base_url('Home/login') ?>";
                    $('#save_data').prop('disabled', false);

                } else {
                    toastr.info(response.msg);
                    // $('.error-msg').html(response.msg);
                    // location.reload();
                }
            },
            error: function() {
                $('#save_data').prop('disabled', false);
                alert('Error');
            }
        });
        return false;
    });
</script>
<?= $this->endSection() ?>