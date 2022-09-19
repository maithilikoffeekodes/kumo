
<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>


			<!-- ======================= Contact Page Detail ======================== -->
			<section class="middle">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center">
								<h2 class="off_title">Contact Us</h2>
								<h3 class="ft-bold pt-3">Get In Touch</h3>
							</div>
						</div>
					</div>
					
					<div class="row align-items-start justify-content-between">
					
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
							<div class="card-wrap-body mb-4">
								<h4 class="ft-medium mb-3 theme-cl">Make a Call</h4>
								<p>3298 Grant Street Longview, TX<br>Surat Gujarat 75601</p>
								<p class="lh-1"><span class="text-dark ft-medium">Email:</span> Kumo@gmail.com</p>
							</div>
							
							<div class="card-wrap-body mb-3">
								<h4 class="ft-medium mb-3 theme-cl">Make a Call</h4>
								<h6 class="ft-medium mb-1">Customer Care:</h6>
								<p class="mb-2">+91 458 753 6924</p>
								<h6 class="ft-medium mb-1">Careers::</h6>
								<p>1-202-555-0106</p>
							</div>
							
							<div class="card-wrap-body mb-3">
								<h4 class="ft-medium mb-3 theme-cl">Drop A Mail</h4>
								<p>Fill out our form and we will contact you within 24 hours.</p>
								<p class="lh-1 text-dark">kumo@gmail.com</p>
							</div>
						</div>
						
						<div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
							<form class="row ajax-form-submit" action="<?= url('Home/contact') ?>" method="post">
									
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="small text-dark ft-medium">Your Name *</label>
										<input type="text" class="form-control" placeholder="Your Name" name="name">
									</div>
								</div>
								
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="small text-dark ft-medium">Your Email *</label>
										<input type="text" class="form-control" placeholder="Your Email" name="email">
									</div>
								</div>
								
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="small text-dark ft-medium">Subject</label>
										<input type="text" class="form-control" placeholder="Type Your Subject" name="subject">
									</div>
								</div>
								
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="small text-dark ft-medium">Message</label>
										<textarea class="form-control ht-80" name="message"></textarea>
									</div>
								</div>
								
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<button type="submit" class="btn btn-dark save_data" id="save_data">Send Message</button>
									</div>
								</div>
								
							</form>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ======================= Contact Page End ======================== -->
			

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
                    // alert('avc');exit;
                    swal("success!", "Your data insert successfully!", "success");
                    $('#save_data').prop('disabled', false);
                    $('.form_proccessing').html('');
                } else {
                    $('.form_proccessing').html('');
                    $('#save_data').prop('disabled', false);
                    $('.error-msg').html(response.msg);
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
