<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

	<!-- ======================= Product Detail ======================== -->
    <section class="middle">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

							<!-- Icon -->
							<div class="p-4 d-inline-flex align-items-center justify-content-center circle bg-light-danger text-danger mx-auto mb-4"><i class="ti-face-smile fs-lg"></i></div>
							<!-- Heading -->
							<h2 class="mb-2 ft-bold">404. Page not found.</h2>
							<!-- Text -->
							<p class="ft-regular fs-md mb-5">Sorry, we couldn't find the page you where looking for. We suggest that you return to home page.</p>
							<!-- Button -->
							<a class="btn btn-dark" href="index.html">Go To Home Page</a>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ======================= Product Detail End ======================== -->

<?= $this->endSection() ?>