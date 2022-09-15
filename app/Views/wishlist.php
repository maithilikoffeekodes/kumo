<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>
<style>
	.btn_love:hover {
		background-color: black;
		color: white;
	}
</style>
<form action="">
	<section class="middle">
		<div class="container">
			<div class="row justify-content-center justify-content-between">

				<div class="col-12 col-md-12 col-lg-4 col-xl-4 text-center miliods">
					<div class="d-block border rounded mfliud-bot">
						<div class="dashboard_author px-2 py-5">
							<div class="dash_auth_thumb circle p-1 border d-inline-flex mx-auto mb-2">
								<img src="<?= ASSETS; ?>img/team-1.jpg" class="img-fluid circle" width="100" alt="" />
							</div>
							<div class="dash_caption">
								<h4 class="fs-md ft-medium mb-0 lh-1">Adam Wishnoi</h4>
								<span class="text-muted smalls">Australia</span>
							</div>
						</div>

						<div class="dashboard_author">
							<h4 class="px-3 py-2 mb-0 lh-2 gray fs-sm ft-medium text-muted text-uppercase text-left">Dashboard Navigation</h4>
							<ul class="dahs_navbar">
								<li><a href="my-orders.html"><i class="lni lni-shopping-basket mr-2"></i>My Order</a></li>
								<li><a href="<?= url('Home/wishlist')?>" class="active"><i class="lni lni-heart mr-2"></i>Wishlist</a></li>
								<li><a href="profile-info.html"><i class="lni lni-user mr-2"></i>Profile Info</a></li>
								<li><a href="addresses.html"><i class="lni lni-map-marker mr-2"></i>Addresses</a></li>
								<li><a href="payment-methode.html"><i class="lni lni-mastercard mr-2"></i>Payment Methode</a></li>
								<li><a href="login.html"><i class="lni lni-power-switch mr-2"></i>Log Out</a></li>
							</ul>
						</div>

					</div>
				</div>

				<div class="col-12 col-md-12 col-lg-8 col-xl-8 text-center">
					<!-- row -->
					<div class="row align-items-center">

						<!-- Single -->
						<?php foreach ($wishlist as $row) { ?>
							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12" id="wishlist_product" data-id="wish" data-module="Home">
								<div class="product_grid card b-0">
									<!-- <div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">Sale</div> -->
									<button class="btn btn_love position-absolute ab-right theme-cl" onclick="editable_remove(this)" data-val="<?= $row['id'] ?>" data-pk="<?= $row['id'] ?>"><i class="fas fa-times"></i></button>
									<div class="card-body p-0">
										<div class="shop_thumb position-relative">
											<a class="card-img-top d-block overflow-hidden" href="<?= url('Home/productdetail/' . $row['id']) ?>"><img class="card-img-top" src="<?= $row['image'] ?>" alt="..." style="height: 350px ;width: 250px;"></a>
											<button type="submit" class="btn btn-block custom-height bg-dark mb-2 cartbtn" id="cartbtn" data-product_id="<?php echo @$row['id']?>" data-price="<?= @$row['price'] ?>" data-quantity="1" style="width: 250px;">
												<i class="lni lni-shopping-basket mr-2"></i>Add to Cart
											</button>
										</div>
									</div>
									<div class="card-footers b-0 pt-3 px-2 bg-white d-flex align-items-start justify-content-center">
										<div class="text-left">
											<div class="text-center">
												<h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="<?= url('Home/productdetail/' . $row['id']) ?>"><?= $row['name'] ?></a></h5>
												<div class="elis_rty"><span class="ft-bold fs-md text-dark"><?= $row['price'] ?></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<!-- row -->
				</div>

			</div>
		</div>
	</section>
</form>

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>

<script type="text/javascript">
	$(document).ready(function() {
		// datatable_load('');

	});

	
	$(document).on('click', '.cartbtn', function() {

		var product_id = $(this).data("product_id");
		var quantity = $(this).data("quantity");
		var price = $(this).data("price");

		toastr.options = {
			"closeButton": true,
			"newestOnTop": true,
			"positionClass": "toast-top-right"
		};
		// alert(product_id);return;
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

	// function editable_remove(data_edit) {
	// 	var type = 'Remove';

	// 	var data_val = $(data_edit).data('val');

	// 	var ot_title = $(data_edit).attr('title');
	// 	var pkno = $(data_edit).data('pk');
	// 	//console.log(pkno);
	// 	swal.fire({
	// 		title: "Are you sure Remove " + ot_title + " ?",
	// 		text: "You will not be able to recover this Data!",
	// 		type: "warning",
	// 		showCancelButton: true,
	// 		confirmButtonClass: "btn-danger",
	// 		confirmButtonText: "Yes, delete it!",
	// 		cancelButtonText: "No, cancel plx!",
	// 		//closeOnConfirm: false,
	// 		//closeOnCancel: false
	// 	}).then((result) => {
	// 		// function(isConfirm) {
	// 		if (result.value) {
	// 			_data = $.param({
	// 				pk: pkno
	// 			}) + '&' + $.param({
	// 				val: data_val
	// 			}) + '&' + $.param({
	// 				type: type
	// 			}) + '&' + $.param({
	// 				method: $("#wishlist_product").data('id')
	// 			});

	// 			if (data_val != undefined && data_val != '') {
	// 				$.post(PATH + "/" + $("#wishlist_product").data('module') + "/Action/Update", _data, function(
	// 					data) {

	// 					if (data.st == 'success') {
	// 						datatable_load('');
	// 						swal.fire("Deleted!", "Your Data has been deleted.", "success");

	// 					}

	// 				});
	// 			}

	// 		} else {
	// 			swal("Cancelled", "Your Data is safe :)", "error");
	// 		}
	// 		// })}
	// 	});
	// }
	function editable_remove(data_edit) {
        var type = 'Remove';
        var data_val = $(data_edit).data('val');
		// alert(data_val);
        if (data_val != '') {
            _data = $.param({
                val: data_val,
                type: type
            });
            $.post(PATH + "/Home/Action/Update/wish", _data, function(response) {

                if (response.st == 'success') {
                    $("#wishlist_product").remove();
                }
            });
        } else {
            console.log("fail");
        }
    }
	// if ($.isFunction($.fn.datatable_load)) {
	// 	datatable_load('');
	// }


	$('#ajax-form-submit').on('submit', function(e) {
		$('#save_data').prop('disabled', true);
		$('.error-msg-acc').html('');
		$('.form_proccessing_acc').html('Please wail...');
		e.preventDefault();
		var aurl = $(this).attr('action');
		$.ajax({
			type: "POST",
			url: aurl,
			data: $(this).serialize(),
			success: function(response) {
				if (response == '1') {
					// swal.fire("Updated!", "Your Cart has been updated.", "success");
					window.location.href = "<?= url('Home') ?>";
				} else {
					$('.form_proccessing_acc').html('');
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