<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>


<div class="page main-signin-wrapper">

	<!-- Row -->
	<section class="middle">
		<div class="container">
			<div class="row align-items-start justify-content-center">

				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<form class="border p-3 rounded" action="<?= url('Home/login')?>" method="post">
						<div class="form-group">
							<label>Email *</label>
							<input type="text" class="form-control" id="inputName"  placeholder="Username*" name="email" >
						</div>

						<div class="form-group">
							<label>Password *</label>
							<input type="password" class="form-control" id="txtPassword" placeholder="Password*" name="password">
						</div>

						<!-- <div class="form-group">
							<div class="d-flex align-items-center justify-content-between">
								<div class="flex-1">
									<input id="dd" class="checkbox-custom" name="dd" type="checkbox">
									<label for="dd" class="checkbox-custom-label">Remember Me</label>
								</div>
								<div class="eltio_k2">
									<a href="#">Lost Your Password?</a>
								</div>
							</div>
						</div> -->
						<div class="error-msg"></div>
                        <div class="form_proccessing"></div>
						<div class="form-group">
							<button type="submit" id="save_data" class="btn btn-md full-width bg-dark text-light fs-md ft-medium">Login</button>
						</div>
						<div class="mt-3 text-center">
								<button type="button" name="send_otp" id="send_otp" class="btn btn-md mb-1">Forgot password?</button>
								<p class="mb-0">Don't have an account? <a href="<?= url('Home/register')?>">Create an Account</a></p>
							</div>
					</form>
				</div>	
			</div>
		</div>
	</section>
	<!-- End Row -->

</div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>

<script>
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
            url: "<?= url('Home/forgot_password') ?>",
            data: "email=" + $("#inputName").val(),
            success: function(response) {
                if (response.st == 'success') {
                    $('#send_otp').prop('disabled', false);
                    toastr.success("OTP successfully sent to your mail");
                    window.location.href = "<?= url('Home/forgot_password') ?>";
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
