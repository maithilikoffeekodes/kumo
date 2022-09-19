<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>
<section class="middle">
    <div class="container">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="text-center d-block mb-5">
                    <h2>Please enter the OTP sent to</h2>
                    <p>We’ve sent a One Time Password (OTP) to the email below. <br>
                        Please enter it to complete verification</p>
                </div>
            </div>
        </div>
        <div class="">
            <h5 class="text-center text-muted d-block mb-5"><?php $session = session(); echo $session->has('email') ? session('email') : '';
                ?> <a href="#"></a></h5>
        </div>
        <div class="row align-items-start justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mfliud">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="hidden" value="<?= session('email')?>" id="inputName">
                            <input class="form-control" placeholder="Enter OTP" name="otp" id="user_otp" type="text">
                        </div>
                        <div class="form_proccessing text-success"></div>
                        <div class="error-msg text-danger"></div>
                        <div class="form-group col-md-12 mt-4" >
                            <div class="chk-btn12 mb-0">
                                <button class="btn btn-md full-width bg-dark text-light fs-md ft-medium mb-5" type="submit" name="verify" id="verify">Continue</button>
                            </div>
                            <span style="margin-left:114px ;" class="text-muted font-weight-bold">Not received your code? <button type="button" class="btn text-success" name="send_otp" id="send_otp"><b>Resend code</b></button></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endsection() ?>
<?= $this->section('scripts') ?>

<script>
    $('#verify').click(function() {
        var user_otp = $('#user_otp').val();
        if (user_otp == '') {
            toastr.error("Please Enter OTP");
            return false;
        }
        $.ajax({
            method: "post",
            url: "<?= url('Home/verify_otp') ?>",
            data: "user_otp=" + $("#user_otp").val(),
            success: function(response) {
                if (response.st == 'success') {
                    toastr.success("OTP Verification successful");
                    $('.pass').show("slow");
                    window.location.href = "<?= url('Home/set_new_pass') ?>";
                } else {
                    toastr.error("Enter valid OTP");
                }
            },
            error: function(err) {
                alert("error");
            }
        });
    });

    $('#send_otp').click(function(event) {
        event.preventDefault();
        var email = $('#inputName').val();
        if (email == '') {
            toastr.error("Please Enter Email");
            return false;
        }
        $('#send_otp').prop('disabled', true);
        $('.error-msg').html('');
        $('.form_proccessing').html('Please wait...');
        $.ajax({
            method: "post",
            url: "<?= base_url() ?>/Home/forgot_password",
            data: "email=" + $("#inputName").val(),
            success: function(response) {
                if (response.st == 'success') {
                    $('#send_otp').prop('disabled', false);
                    $('.form_proccessing').html('');
                    toastr.success("OTP Resend to your mail");
                  
                } else {
                    $('#send_otp').prop('disabled', false);
                    toastr.error("Enter Valid Email");
                    $('.form_proccessing').html('');
                }
            },
            error: function() {
                alert('Error');
            }
        });
    });
</script>
<?= $this->endSection() ?>