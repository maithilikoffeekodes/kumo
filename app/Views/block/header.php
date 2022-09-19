<div class="headd-sty header">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="headd-sty-wrap d-flex align-items-center justify-content-between py-3">
					<div class="headd-sty-left d-flex align-items-center">
						<div class="headd-sty-01">
							<a class="nav-brand py-0" href="#">
								<img src="<?= ASSETS; ?>img/logo.png" class="logo" alt="" />
							</a>
						</div>
						<div class="headd-sty-02 ml-3">
							<form class="bg-white rounded-md border-bold">
								<div class="input-group">
									<input type="text" class="form-control custom-height b-0" id="searchdata" name="search" placeholder="Search for products..." />
									<div class="input-group-append">
										<div class="input-group-text"><button onclick="search1()" class="btn bg-white text-danger custom-height rounded px-3" type="submit"><i class="fas fa-search"></i></button></div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="headd-sty-last">
						<ul class="nav-menu nav-menu-social align-to-right align-items-center d-flex">
							<li>
								<div class="call d-flex align-items-center text-left" style="margin-right: 47px;">
									<i class="lni lni-phone fs-xl"></i>
									<span class="text-muted small ml-3">Call Us Now:<strong class="d-block text-dark fs-md">0(800) 123-456</strong></span>
								</div>
							</li>
							<!-- <li>
											<a href="#" onclick="openWishlist()">
												<i class="far fa-heart fs-lg"></i><span class="dn-counter bg-success">2</span>
											</a>
										</li>
										<li>
											<a href="#" onclick="openCart()">
												<div class="d-flex align-items-center justify-content-between">
													<i class="fas fa-shopping-basket fs-lg"></i><span class="dn-counter theme-bg">3</span>
													<div class="text-left ml-1">
														<div class="text-muted small lh-1">Total</div>	
														<div class="primary-text cart-subtotal"><span class="fs-md ft-medium"><span class="prc-currency">$</span>0.00</span></div>
													</div>
												</div>
											</a>
										</li> -->
						</ul>
					</div>
					<div class="mobile_nav">
						<ul>
							<li>
								<a href="#" onclick="openSearch()">
									<i class="lni lni-search-alt"></i>
								</a>
							</li>
							<li>
								<a href="#" data-toggle="modal" data-target="#login">
									<i class="lni lni-user"></i>
								</a>
							</li>
							<li>
								<a href="#" onclick="openWishlist()">
									<i class="lni lni-heart"></i><span class="dn-counter">2</span>
								</a>
							</li>
							<li>
								<a href="#" onclick="openCart()">
									<i class="lni lni-shopping-basket"></i><span class="dn-counter">0</span>
								</a>
							</li>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->section('scripts') ?>
<script>
		function search1() {
		var search = document.getElementById('#searchdata').value;
		alert(search);
		window.location.href = "<?php echo url('Home/shoplist?search='); ?>" + search;
	}
</script>
<?= $this->endSection() ?>



