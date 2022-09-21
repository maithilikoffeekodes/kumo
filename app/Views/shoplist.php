<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

<style>
	.btn_love:hover {
		background-color: black;
		color: white;
	}
</style>

<!-- ======================= Shop Style 1 ======================== -->
<section class="bg-cover" style="background:url(<?= ASSETS; ?>img/banner-2.png) no-repeat;">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="text-left py-5 mt-3 mb-3">
					<h1 class="ft-medium mb-3">Shop</h1>
					<!-- <ul class="shop_categories_list m-0 p-0">
						<li><a href="#">Men</a></li>
						<li><a href="#">Speakers</a></li>
						<li><a href="#">Women</a></li>
						<li><a href="#">Accessories</a></li>
					</ul> -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ======================= Shop Style 1 ======================== -->


<!-- ======================= Filter Wrap Style 1 ======================== -->
<section class="py-3 br-bottom br-top">
	<div class="container">
		<div class="row align-items-center justify-content-between">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<nav aria-label="breadcrumb">
					<!-- <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Shop</a></li>
						<li class="breadcrumb-item active" aria-current="page">Women's</li>
					</ol> -->
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- ============================= Filter Wrap ============================== -->


<!-- ======================= All Product List ======================== -->
<section class="middle">
	<div class="container">
		<div class="row">

			<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 p-xl-0">
				<div class="search-sidebar sm-sidebar border">
					<div class="search-sidebar-body">

						<!-- Single Option -->
						<!-- <div class="single_search_boxed">
							<div class="widget-boxed-header px-3">
								<h4 class="mt-3">Categories</h4>
							</div>
							<div class="widget-boxed-body">
								<div class="side-list no-border">
									<div class="filter-card" id="shop-categories">

										<!-- Single Filter Card 
										<div class="single_filter_card">
											<h5><a href="#shoes" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Shoes<i class="accordion-indicator ti-angle-down"></i></a></h5>

											<div class="collapse" id="shoes" data-parent="#shop-categories">
												<div class="card-body">
													<div class="inner_widget_link">
														<ul>
															<li><a href="#">Pumps & high Heals<span>112</span></a></li>
															<li><a href="#">Sandels<span>82</span></a></li>
															<li><a href="#">Sneakers<span>56</span></a></li>
															<li><a href="#">Boots<span>101</span></a></li>
															<li><a href="#">Casual Shoes<span>212</span></a></li>
															<li><a href="#">Flats Sandel<span>92</span></a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>

										<!-- Single Filter Card 
										<div class="single_filter_card">
											<h5><a href="#clothing" data-toggle="collapse" class="" aria-expanded="false" role="button">Clothing<i class="accordion-indicator ti-angle-down"></i></a></h5>

											<div class="collapse show" id="clothing" data-parent="#shop-categories">
												<div class="card-body">
													<div class="inner_widget_link">
														<ul>
															<li><a href="#">Blazers<span>82</span></a></li>
															<li><a href="#">Men Suits<span>110</span></a></li>
															<li><a href="#">Blouses<span>103</span></a></li>
															<li><a href="#">Coat Pant<span>72</span></a></li>
															<li><a href="#">T-Shirts<span>36</span></a></li>
															<li><a href="#">Men Shirts<span>122</span></a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!-- Single Filter Card 
										<div class="single_filter_card">
											<h5><a href="#watches" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Watches<i class="accordion-indicator ti-angle-down"></i></a></h5>

											<div class="collapse" id="watches" data-parent="#shop-categories">
												<div class="card-body">
													<div class="inner_widget_link">
														<ul>
															<li><a href="#">Sport Watches<span>112</span></a></li>
															<li><a href="#">Casual Watches<span>112</span></a></li>
															<li><a href="#">Fashion Watches<span>112</span></a></li>
															<li><a href="#">Girls Watches<span>112</span></a></li>
															<li><a href="#">Smart Watches<span>112</span></a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>

										<!-- Single Filter Card 
										<div class="single_filter_card">
											<h5><a href="#bags" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Bags<i class="accordion-indicator ti-angle-down"></i></a></h5>

											<div class="collapse" id="bags" data-parent="#shop-categories">
												<div class="card-body">
													<div class="inner_widget_link">
														<ul>
															<li><a href="#">Casual Bags<span>212</span></a></li>
															<li><a href="#">Sport Bags<span>212</span></a></li>
															<li><a href="#">Lugges bags<span>82</span></a></li>
															<li><a href="#">Fashion Bags<span>212</span></a></li>
															<li><a href="#">Small bags<span>113</span></a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>

										<!-- Single Filter Card 
										<div class="single_filter_card">
											<h5><a href="#accessories" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Accessories<i class="accordion-indicator ti-angle-down"></i></a></h5>

											<div class="collapse" id="accessories" data-parent="#shop-categories">
												<div class="card-body">
													<div class="inner_widget_link">
														<ul>
															<li><a href="#">Men Wallet<span>432</span></a></li>
															<li><a href="#">Men Belt<span>82</span></a></li>
															<li><a href="#">Hats<span>541</span></a></li>
															<li><a href="#">Jwelery<span>312</span></a></li>
															<li><a href="#">Beauty<span>65</span></a></li>
															<li><a href="#">Cosmetic<span>242</span></a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div> -->
						<div class="boxed-header text-center p-4 font-weight-bold">
								<label><a href="<?= url('Home/shoplist')?>">Clear All Filters</a></label>
							</div>
						<!-- Single Option -->
						<div class="single_search_boxed">
							<div class="widget-boxed-header">
								<h4><a href="#pricing" data-toggle="collapse" aria-expanded="false" role="button">Pricing</a></h4>
							</div>

							<div class="widget-boxed-body collapse show" id="pricing" data-parent="#pricing">
								<div class="side-list no-border mb-4">
									<p>
										<label for="amount">Price range:</label>
										<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
										<input type="hidden" name="min_price" id="min">
										<input type="hidden" name="max_price" id="max">
									</p>

									<div id="slider-range"></div>
									<!-- <div class="rg-slider">
										<input type="text" class="js-range-slider" name="my_range" value="" />
									</div> -->
								</div>
							</div>
						</div>

						<!-- Single Option -->
						<!-- <div class="single_search_boxed">
							<div class="widget-boxed-header">
								<h4><a href="#size" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Size</a></h4>
							</div>
							<div class="widget-boxed-body collapse" id="size" data-parent="#size">
								<div class="side-list no-border">
									<!-- Single Filter Card 
									<div class="single_filter_card">
										<div class="card-body pt-0">
											<div class="text-left pb-0 pt-2">
												<div class="form-check form-option form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="sizes" id="26s">
													<label class="form-option-label" for="26s">26</label>
												</div>
												<div class="form-check form-option form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="sizes" id="28s">
													<label class="form-option-label" for="28s">28</label>
												</div>
												<div class="form-check form-option form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="sizes" id="30s" checked>
													<label class="form-option-label" for="30s">30</label>
												</div>
												<div class="form-check form-option form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="sizes" id="32s">
													<label class="form-option-label" for="32s">32</label>
												</div>
												<div class="form-check form-option form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="sizes" id="34s">
													<label class="form-option-label" for="34s">34</label>
												</div>
												<div class="form-check form-option form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="sizes" id="36s">
													<label class="form-option-label" for="36s">36</label>
												</div>
												<div class="form-check form-option form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="sizes" id="38s">
													<label class="form-option-label" for="38s">38</label>
												</div>
												<div class="form-check form-option form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="sizes" id="40s">
													<label class="form-option-label" for="40s">40</label>
												</div>
												<div class="form-check form-option form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="sizes" id="42s">
													<label class="form-option-label" for="42s">42</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->

						<!-- Single Option -->
						<div class="single_search_boxed">
							<div class="widget-boxed-header">
								<h4><a href="#brands" data-toggle="collapse" aria-expanded="false" role="button">Brands</a></h4>
							</div>
							<div class="widget-boxed-body collapse show" id="brands" data-parent="#brands">
								<div class="side-list no-border">
									<!-- Single Filter Card -->
									<div class="single_filter_card">
										<div class="card-body pt-0">
											<div class="inner_widget_link">
												<select name="brand" id="brand" class="form-control ">
													<?php if (isset($data)) { ?>
														<option value="<?= @$data['id'] ?>" selected><a href="<?= url('Home/productlist/' . @$data['id']) ?>"><?= @$data['brand'] ?></a></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Single Option -->
						<div class="single_search_boxed">
							<div class="widget-boxed-header">
								<h4><a href="#gender" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Categories</a></h4>
							</div>
							<div class="widget-boxed-body collapse" id="gender" data-parent="#gender">
								<div class="side-list no-border">
									<!-- Single Filter Card -->
									<div class="single_filter_card">
										<div class="card-body pt-0">
											<div class="inner_widget_link">
												<select name="category" id="category" class="form-control ">
													<?php if (isset($data)) { ?>
														<option value="<?= @$data['id'] ?>" selected><?= @$data['category'] ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Single Option -->
						<!-- <div class="single_search_boxed">
							<div class="widget-boxed-header">
								<h4><a href="#discount" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Discount</a></h4>
							</div>
							<div class="widget-boxed-body collapse" id="discount" data-parent="#discount">
								<div class="side-list no-border">
									<!-- Single Filter Card -
									<div class="single_filter_card">
										<div class="card-body pt-0">
											<div class="inner_widget_link">
												<ul class="no-ul-list">
													<li>
														<input id="d1" class="checkbox-custom" name="d1" type="checkbox">
														<label for="d1" class="checkbox-custom-label">80% Discount<span>22</span></label>
													</li>
													<li>
														<input id="d2" class="checkbox-custom" name="d2" type="checkbox">
														<label for="d2" class="checkbox-custom-label">60% Discount<span>472</span></label>
													</li>
													<li>
														<input id="d3" class="checkbox-custom" name="d3" type="checkbox">
														<label for="d3" class="checkbox-custom-label">50% Discount<span>170</span></label>
													</li>
													<li>
														<input id="d4" class="checkbox-custom" name="d4" type="checkbox">
														<label for="d4" class="checkbox-custom-label">40% Discount<span>170</span></label>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->

						<!-- Single Option -->
						<!-- <div class="single_search_boxed">
							<div class="widget-boxed-header">
								<h4><a href="#types" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Type</a></h4>
							</div>
							<div class="widget-boxed-body collapse" id="types" data-parent="#types">
								<div class="side-list no-border">
									<!-- Single Filter Card 
									<div class="single_filter_card">
										<div class="card-body pt-0">
											<div class="inner_widget_link">
												<ul class="no-ul-list">
													<li>
														<input id="t1" class="checkbox-custom" name="t1" type="checkbox">
														<label for="t1" class="checkbox-custom-label">All Type<span>422</span></label>
													</li>
													<li>
														<input id="t2" class="checkbox-custom" name="t2" type="checkbox">
														<label for="t2" class="checkbox-custom-label">Normal Type<span>472</span></label>
													</li>
													<li>
														<input id="t3" class="checkbox-custom" name="t3" type="checkbox">
														<label for="t3" class="checkbox-custom-label">Simple Type<span>170</span></label>
													</li>
													<li>
														<input id="t4" class="checkbox-custom" name="t4" type="checkbox">
														<label for="t4" class="checkbox-custom-label">Modern type<span>140</span></label>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->

						<!-- Single Option -->
						<!-- <div class="single_search_boxed">
							<div class="widget-boxed-header">
								<h4><a href="#occation" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Occation</a></h4>
							</div>
							<div class="widget-boxed-body collapse" id="occation" data-parent="#occation">
								<div class="side-list no-border">
									<!-- Single Filter Card -
									<div class="single_filter_card">
										<div class="card-body pt-0">
											<div class="inner_widget_link">
												<ul class="no-ul-list">
													<li>
														<input id="o1" class="checkbox-custom" name="o1" type="checkbox">
														<label for="o1" class="checkbox-custom-label">All Occation<span>422</span></label>
													</li>
													<li>
														<input id="o2" class="checkbox-custom" name="o2" type="checkbox">
														<label for="o2" class="checkbox-custom-label">Normal Occation<span>472</span></label>
													</li>
													<li>
														<input id="t33" class="checkbox-custom" name="o33" type="checkbox">
														<label for="t33" class="checkbox-custom-label">Winter Occation<span>170</span></label>
													</li>
													<li>
														<input id="o4" class="checkbox-custom" name="o4" type="checkbox">
														<label for="o4" class="checkbox-custom-label">Summer Occation<span>140</span></label>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->

						<!-- Single Option -->
						<!-- <div class="single_search_boxed">
							<div class="widget-boxed-header">
								<h4><a href="#colors" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Colors</a></h4>
							</div>
							<div class="widget-boxed-body collapse" id="colors" data-parent="#colors">
								<div class="side-list no-border">
									<!-- Single Filter Card 
									<div class="single_filter_card">
										<div class="card-body pt-0">
											<div class="text-left">
												<div class="form-check form-option form-check-inline mb-1">
													<input class="form-check-input" type="radio" name="colora8" id="whitea8">
													<label class="form-option-label rounded-circle" for="whitea8"><span class="form-option-color rounded-circle blc7"></span></label>
												</div>
												<div class="form-check form-option form-check-inline mb-1">
													<input class="form-check-input" type="radio" name="colora8" id="bluea8">
													<label class="form-option-label rounded-circle" for="bluea8"><span class="form-option-color rounded-circle blc2"></span></label>
												</div>
												<div class="form-check form-option form-check-inline mb-1">
													<input class="form-check-input" type="radio" name="colora8" id="yellowa8">
													<label class="form-option-label rounded-circle" for="yellowa8"><span class="form-option-color rounded-circle blc5"></span></label>
												</div>
												<div class="form-check form-option form-check-inline mb-1">
													<input class="form-check-input" type="radio" name="colora8" id="pinka8">
													<label class="form-option-label rounded-circle" for="pinka8"><span class="form-option-color rounded-circle blc3"></span></label>
												</div>
												<div class="form-check form-option form-check-inline mb-1">
													<input class="form-check-input" type="radio" name="colora8" id="reda">
													<label class="form-option-label rounded-circle" for="reda"><span class="form-option-color rounded-circle blc4"></span></label>
												</div>
												<div class="form-check form-option form-check-inline mb-1">
													<input class="form-check-input" type="radio" name="colora8" id="greena">
													<label class="form-option-label rounded-circle" for="greena"><span class="form-option-color rounded-circle blc6"></span></label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->

					</div>
				</div>
			</div>

			<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">

				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="border mb-3 mfliud">
							<div class="row align-items-center py-2 m-0">
								<div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
									<h6 class="mb-0"><?= get_item_count()?> Items</h6>
								</div>

								<div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">
									<div class="filter_wraps d-flex align-items-center justify-content-end m-start">
										<div class="single_fitres mr-2 br-right">
											<select class="custom-select simple" id="price">
												<option value="1">Newest</option>
												<option value="2">Sort by price: Low price</option>
												<option value="3">Sort by price: Hight price</option>
												<!-- <option value="4">Sort by rating</option>
												<option value="5">Sort by trending</option> -->
											</select>
										</div>
										<!-- <div class="single_fitres">
											<a href="shop-style-5.html" class="simple-button active mr-1"><i class="ti-layout-grid2"></i></a>
											<a href="shop-list-sidebar.html" class="simple-button"><i class="ti-view-list"></i></a>
										</div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- row -->
				<div class="row align-items-center rows-products filter_data">

					<!-- Single -->

				</div>
				<!-- row -->

				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 text-center">
						<!-- <a href="#" class="btn stretched-link borders m-auto"><i class="lni lni-reload mr-2"></i>Load More</a> -->
						<div class="paginate-section">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-9 col-md-9 col-sm-12 col-xl-9">
										<div class="pagination-list" id="pagination_link">

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- ======================= All Product List ======================== -->


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
	$(document).ready(function() {
		filter();
	});


	$(document).on('click', '.cartbtn', function(event) {

		var product_id = $(this).data("product_id");
		var quantity = $(this).data("quantity");
		var price = $(this).data("price");
		// alert(quantity);
		toastr.options = {
			"closeButton": true,
			"newestOnTop": true,
			"positionClass": "toast-top-right"
		};

		$.ajax({
			url: "<?php echo url('Home/cart'); ?>",
			method: "POST",
			data: {
				product_id: product_id,
				quantity: quantity,
				price: price
			},
			success: function(response) {
				if (response.st == 'success') {
					toastr.success(response.msg);
					window.location.reload();
					var cart_count = parseInt($(".cart_count").text());
					$(".cart_count").text(cart_count + 1);
				}
				if (response.st == 'added') {
					toastr.info(response.msg);
				} else {
					$('.form_processing').html('');
					$('#cartbtn').prop('disabled', false);
					$('.error-msg').html(response.msg);
				}
			}

		});

	});
	/*
	 *Add to Wish
	 */

	$(document).on('click', '.wish', function() {
		var product_id = $(this).data("product_id");
		let wish = $(this);
		toastr.options = {
			"closeButton": true,
			"newestOnTop": true,
			"positionClass": "toast-top-right"
		};
		$.ajax({
			url: "<?php echo url('Home/wishlist'); ?>",
			method: "POST",
			data: {
				productid: product_id
			},
			success: function(response) {
				if (response.st == 'success') {
					toastr.success(response.msg);
					window.location.reload();

					wish.removeClass("wish");
					wish.addClass("removeWish")
					$('#cartbtn').prop('disabled', false);
				} else {
					$('.form_processing').html('');
					$('#cartbtn').prop('disabled', false);
					$('.error-msg').html(response.msg);
				}
			}
		});
	});

	

	$("#brand").select2({
		width: '100%',
		placeholder: 'Search...',
		ajax: {
			url: PATH + "/Home/Getdata/getbrand",
			type: "post",
			allowClear: true,
			dataType: 'json',
			delay: 250,
			data: function(params) {
				return {
					searchTerm: params.term // search term
				};
			},
			processResults: function(response) {
				return {
					results: response
				};
			},
			cache: true
		}
	});

	$("#category").select2({
		width: '100%',
		placeholder: 'Select...',
		ajax: {
			url: PATH + "/Home/Getdata/getcategory",
			type: "post",
			allowClear: true,
			dataType: 'json',
			delay: 250,
			data: function(params) {
				return {
					searchTerm: params.term // search term
				};
			},
			processResults: function(response) {
				return {
					results: response
				};
			},
			cache: true
		}
	});
	$('#brand,#category').change(function() {
		var brand_id = $('#brand option:selected').val();
		var category_id = $('#category option:selected').val();
		// var data = new Array();
		// data['category_id'] = category_id;
		// data['brand_id'] = brand_id;
		filter();
	});


	$('#price').click(function() {
		var price = $("#price option:selected").val();
		filter();
	});

	$(document).on('click', '.pagination li a', function(event) {
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		// console.log(page);
		filter(page);

	});

	function filter(page = 1) {
		var brand_id = $('#brand option:selected').val();
		var category_id = $('#category option:selected').val();
        var cat = "<?= isset($_GET['category']) ? $_GET['category'] : ''; ?>";
		var price = $("#price option:selected").val();
        var search = "<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>";
		// var search = $('#searchdata').val();
		var min_price = $('#min').text();
		var max_price = $('#max').text();
		console.log(page);
		$.ajax({
			url: "<?php echo url('Home/fetch_data'); ?>" + "/" + page,
			method: "POST",
			data: {
				brand_id: brand_id,
				category_id: category_id,
				price: price,
				cat: cat,
				// brand: brand,
				// search1:search1,
				search:search,
				min_price: min_price,
				max_price: max_price,
			},
			success: function(response) {
				console.log(response);
				if (response.product_list == "") {
					$('.filter_data').html('No item found....');
					$('#pagination_link').hide();

				} else {
					$('.filter_data').html(response.product_list);
					$('#pagination_link').html(response.pagination_link);
					// $('#product').hide();
				}
			}

		});
	}
</script>

<script>
	$(function() {
		$("#slider-range").slider({
			range: true,
			min: 0,
			max: <?= $max_value ?>,
			values: [0, <?= $max_value ?>],
			slide: function(event, ui) {
				$("#amount").val("₹" + ui.values[0] + " - ₹" + ui.values[1]);
				$('#min').text(ui.values[0])
				$('#max').text(ui.values[1])
				filter();
			}
		});
		$("#amount").val("₹" + $("#slider-range").slider("values", 0) +
			" - ₹" + $("#slider-range").slider("values", 1));
	});
</script>
<?= $this->endSection() ?>