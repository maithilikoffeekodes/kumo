<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>


<div class="page main-signin-wrapper">

	<!-- Row -->
	<section class="middle">
		<div class="container">
			<div class="row align-items-start justify-content-center">

				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<form class="border p-3 rounded" action="<?= url('Home/login') ?>" method="post">
						<?php if (!empty($msg) && $msg['st'] == 'failed') { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
								<div class="icon"> <span class="mdi mdi-close-circle-o"></span></div>
								<div class="message"><strong>Failed!</strong> <?= $msg['msg']; ?></div>
							</div>
						<?php } ?>
						<div class="form-group">
							<label>Email *</label>
							<input type="text" class="form-control" id="inputName" placeholder="Username*" name="email" required>
						</div>

						<div class="form-group">
							<label>Password *</label>
							<div class="input-group">
							<input type="password" class="form-control" id="txtPassword" placeholder="Password*" name="password" required>
                                    <div class="input-group-addon">
                                        <a type="button" id="btnToggle" class="toggle">
                                            <i id="eyeIcon" class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
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
							<p class="mb-0">Don't have an account? <a href="<?= url('Home/register') ?>">Create an Account</a></p>
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
    let passwordInput = document.getElementById("txtPassword"),

        toggle = document.getElementById("btnToggle"),
        icon = document.getElementById("eyeIcon");

    function togglePassword() {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.add("fa-eye-slash");
            //toggle.innerHTML = 'hide';
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye-slash");
            //toggle.innerHTML = 'show';
        }
    }

    function checkInput() {

    }

    toggle.addEventListener("click", togglePassword, false);
    passwordInput.addEventListener("keyup", checkInput, false);
</script>
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