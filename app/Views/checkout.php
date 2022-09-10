<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>
<style>
    input[type="radio"]:checked {
        background-color: #93e026;
    }
</style>
<?php //echo"<pre>";print_r($cart);exit;
?>
<form action="<?= url('Home/checkout') ?>" method="post" class="final_payment">
    <section class="middle">
        <div class="container">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="text-center d-block mb-5">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-lg-7 col-md-12">
                    <!-- <form action="<?//= url('Home/shipping_address') ?>" method="post" class="shipping_address"> -->
                        <h5 class="mb-4 ft-medium">Billing Details</h5>
                        <div class="row mb-2">

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">First Name *</label>
                                    <input type="text" class="form-control" name="fname" placeholder="First Name" />
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">Last Name *</label>
                                    <input type="text" class="form-control" name="lname" placeholder="Last Name" />
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">Email *</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" />
                                </div>
                            </div>

                            <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">Company</label>
                                    <input type="text" class="form-control" name="cn" placeholder="Company Name (optional)" />
                                </div>
                            </div> -->

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">Address 2 *</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address 1" />
                                </div>
                            </div>

                            <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">Address 2</label>
                                    <input type="text" class="form-control" name="fname" placeholder="Address 2" />
                                </div>
                            </div> -->

                            <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">Country *</label>
                                    <select class="custom-select" name="country" required>
                                        <option value="1" selected="">India</option>
                                        <option value="2">United State</option>
                                        <option value="3">United Kingdom</option>
                                        <option value="4">China</option>
                                        <option value="5">Pakistan</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">State *</label>
                                    <input type="text" class="form-control" name="state" placeholder="State" />
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">City / Town *</label>
                                    <input type="text" class="form-control" name="city" placeholder="City / Town" />
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">ZIP / Postcode *</label>
                                    <input type="text" class="form-control" name="pincode" placeholder="Zip / Postcode" />
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">Mobile Number *</label>
                                    <input type="text" class="form-control" name="mobileno" placeholder="Mobile Number" />
                                </div>
                            </div>

                            <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">Additional Information</label>
                                    <textarea class="form-control ht-50" name="fname"></textarea>
                                </div>
                            </div> -->

                        </div>

                        <div class="row mb-4">
                            <div class="col-12 d-block">
                                <input id="createaccount" class="checkbox-custom" name="createaccount" type="checkbox">
                                <label for="createaccount" class="checkbox-custom-label">Create An Account?</label>
                            </div>
                        </div>

                        <!-- <h5 class="mb-4 ft-medium">Payments</h5>
                        <div class="form-group">
                            <div class="custom-control custom-radio" style="padding: 0px">
                                <label class=""><input type="radio" value="Razorpay" name="payment" id="razorpay"> &nbsp;
                                    RazorPay</label>
                            </div>
                            <div>
                                <label class=""><input type="radio" value="COD" name="payment" id="cod">
                                    &nbsp; COD</label>
                            </div>
                        </div> -->

                        <!-- <div class="row mb-4">
                            <div class="col-12 col-lg-12 col-xl-12 col-md-12">
                                <div class="panel-group pay_opy980" id="payaccordion">

                                    <!-- Pay By Paypal 
                                    <div class="panel panel-default border">
                                        <div class="panel-heading" id="pay">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" role="button" data-parent="#payaccordion" href="#payPal" aria-expanded="true" aria-controls="payPal" class="">PayPal<img src="assets/img/paypal.html" class="img-fluid" alt=""></a>
                                            </h4>
                                        </div>
                                        <div id="payPal" class="panel-collapse collapse show" aria-labelledby="pay" data-parent="#payaccordion">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="text-dark">PayPal Email</label>
                                                    <input type="radio" class="form-control simple" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-dark btm-md full-width">Pay 400.00 USD</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pay By Strip 
                                    <div class="panel panel-default border">
                                        <div class="panel-heading" id="stripes">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" role="button" data-parent="#payaccordion" href="#stripePay" aria-expanded="false" aria-controls="stripePay" class="">Stripe<img src="assets/img/strip.html" class="img-fluid" alt=""></a>
                                            </h4>
                                        </div>
                                        <div id="stripePay" class="collapse" aria-labelledby="stripes" data-parent="#payaccordion">
                                            <div class="panel-body">

                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="text-dark">Card Holder Name *</label>
                                                            <input type="text" class="form-control" placeholder="Dhananjay Preet" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="text-dark">Card Number *</label>
                                                            <input type="text" class="form-control" placeholder="5426 4586 5485 4759" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5 col-md-5 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="text-dark">Expire Month *</label>
                                                            <select class="custom-select">
                                                                <option value="1" selected="">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">August</option>
                                                                <option value="9">September</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5 col-md-5 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="text-dark">Expire Year *</label>
                                                            <select class="custom-select">
                                                                <option value="1" selected="">2010</option>
                                                                <option value="2">2018</option>
                                                                <option value="3">2019</option>
                                                                <option value="4">2020</option>
                                                                <option value="5">2021</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="text-dark">CVC *</label>
                                                            <input type="text" class="form-control" placeholder="CVV*">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input id="ak-2" class="checkbox-custom" name="ak-2" type="checkbox">
                                                            <label for="ak-2" class="checkbox-custom-label">By Continuing, you ar'e agree to conditions</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group text-center">
                                                            <a href="#" class="btn btn-dark full-width">Pay 202.00 USD</a>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pay By Debit or credtit 
                                    <div class="panel panel-default border">
                                        <div class="panel-heading" id="dabit">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" href="#payaccordion" data-target="#debitPay" aria-expanded="false" aria-controls="debitPay" class="">Debit Or Credit<img src="assets/img/debit.html" class="img-fluid" alt=""></a>
                                            </h4>
                                        </div>
                                        <div id="debitPay" class="panel-collapse collapse" aria-labelledby="dabit" data-parent="#payaccordion">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="text-dark">Card Holder Name *</label>
                                                            <input type="text" class="form-control" placeholder="Card Holder Name" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="text-dark">Card Number *</label>
                                                            <input type="text" class="form-control" placeholder="7589 6356 8547 9120" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5 col-md-5 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="text-dark">Expire Month *</label>
                                                            <select class="custom-select">
                                                                <option value="1" selected="">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">August</option>
                                                                <option value="9">September</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5 col-md-5 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="text-dark">Expire Year *</label>
                                                            <select class="custom-select">
                                                                <option value="1" selected="">2010</option>
                                                                <option value="2">2018</option>
                                                                <option value="3">2019</option>
                                                                <option value="4">2020</option>
                                                                <option value="5">2021</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="text-dark">CVC *</label>
                                                            <input type="text" class="form-control" placeholder="CVV*" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input id="al-2" class="checkbox-custom" name="al-2" type="checkbox">
                                                            <label for="al-2" class="checkbox-custom-label">By Continuing, you ar'e agree to conditions</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group text-center">
                                                            <a href="#" class="btn btn-dark full-width">Pay 202.00 USD</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    <!-- </form> -->
                </div>

                <div class="col-12 col-lg-4 col-md-12">
                    <div class="d-block mb-3">
                        <h5 class="mb-4">Order Items</h5>
                        <table class="table table-borderless table-hover text-center mb-0" id="table_list_data" data-id="final_cart" data-module="Home" data-filter_data=''>
						<thead class="thead text-center" style="background-color:#343a40 ; color:white;">
							<tr>
								<th>Image</th>
								<th>Products</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
                        <!-- <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x mb-4">
                            <?php foreach ($cart as $row) { ?>
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-3">
                                            <!-- Image 
                                            <a href=""><img src="<?= $row['image'] ?>" alt="..." class="img-fluid"></a>
                                        </div>
                                        <div class="col d-flex align-items-center">
                                            <div class="cart_single_caption pl-2">
                                                <h4 class="product_title fs-md ft-medium mb-1 lh-1"><?= $row['name'] ?><span class="qty">(<?= $row['quantity'] ?>)</span></h4>
                                                <!-- <p class="mb-1 lh-1"><span class="text-dark">Size: 40</span></p> -->
                                                <!-- <p class="mb-3 lh-1"><span class="text-dark">Color: Blue</span></p> 
                                                <h4 class="fs-md ft-medium mb-3 lh-1 price"><?= $row['price'] ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul> -->
                    </div>

                    <div class="card mb-4 gray" style="width: 638px;">
                        <div class="card-body">
                            <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                                <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                    <span>Subtotal</span> <span class="ml-auto text-dark ft-medium sub_total_amt">0</span>
                                </li>
                                <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                    <span>Delivery Charges</span> <span class="ml-auto text-dark ft-medium">Free</span>
                                </li>
                                <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                    <input type="hidden" name="grand_total" id="grand_total" value='0'>
                                    <span>Total</span> <span class="ml-auto text-dark ft-medium total_amt">0</span>
                                </li>
                                <li class="list-group-item fs-sm text-center">
                                    Shipping cost calculated at Checkout *
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button class="btn btn-block btn-dark mb-3" id="save_data" type="submit" style="    width: 638px;">Place Your Order</button>
                </div>
            </div>


        </div>

    </section>

</form>

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
</form>
<script type="text/javascript">
    $(document).ready(function(){
        datatable_load();
    });
    $('.final_payment').on('submit', function(e) {
        // console.log("abc");

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
                console.log(response);
                if (response) {
                    var options = response;

                    /**
                     * The entire list of Checkout fields is available at
                     * https://docs.razorpay.com/docs/checkout-form#checkout-fields
                     */
                    options.handler = function(response) {
                        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                        document.getElementById('razorpay_signature').value = response.razorpay_signature;
                        document.razorpayform.submit();
                    };

                    // Boolean whether to show image inside a white frame. (default: true)
                    options.theme.image_padding = false;

                    options.modal = {
                        ondismiss: function() {
                            console.log("This code runs when the popup is closed");
                        },
                        // Boolean indicating whether pressing escape key 
                        // should close the checkout form. (default: true)
                        escape: true,
                        // Boolean indicating whether clicking translucent blank
                        // space outside checkout form should close the form. (default: false)
                        backdropclose: false
                    };

                    var rzp = new Razorpay(options);
                    rzp.open();
                    // document.getElementById('rzp-button1').onclick = function(e){
                    //     rzp.open();
                    //     e.preventDefault();
                    // }
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
    $('.shipping_address').on('submit', function(e) {
        console.log("abc");
        $('#save_data1').prop('disabled', true);
        $('.save_data1').attr("disabled", true);

        $('.error-msg').html('');
        $('.form_proccessing').html('Please wait...');
        e.preventDefault();
        var pid = $("#product_id").val();
        var aurl = $(this).attr('action');
        $.ajax({
            type: "POST",
            url: aurl,
            data: $(this).serialize(),
            success: function(response) {

                if (response.st == "success") {

                    // swal("success!", response.msg, "success");
                    location.reload();
                } else {
                    $('.form_proccessing').html('');
                    $('#save_data1').prop('disabled', false);
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

    function increment(val) {
        var qty = $(val).closest('.qty_class').find('input[name="qty[]"]').val();
        qty++;

        $(val).closest('.qty_class').find('.count').text(qty);
        $(val).closest('.qty_class').find('input[name="qty[]"]').val(qty);

        calcu();
    }

    function decrement(val) {
        var qty = $(val).closest('.qty_class').find('input[name="qty[]"]').val();

        if (qty != 1) {
            qty--;
        }
        // $(".qty").val(qty);
        $(val).closest('.qty_class').find('.count').text(qty);
        $(val).closest('.qty_class').find('input[name="qty[]"]').val(qty);

        calcu();
    }

    function calcu() {
        // console.log("aes0");

        var qty = $('input[name="qty[]"]').map(function() {
            return parseFloat(this.value);
        }).get();

        var price = $('input[name="price[]"]').map(function() {
            return parseFloat(this.value);
        }).get();

        var total = 0;

        for (var i = 0; i < qty.length; i++) {
            // console.log("hello");
            var sub = qty[i] * price[i];
            $('input[name="sub[]"]').eq(i).val(sub);

            total += sub;
        }

        var sub_tot = $(".sub_total_amt").text(total);
        $(".total_amt").text($(".sub_total_amt").text());
        var grand_tot = $(".sub_total_amt").text();
        $("#grand_total").val(grand_tot);
    }
    function datatable_load(filter_val) {
		// console.log("abc");return;
		$('#table_list_data').DataTable({
			searching: false,
			paging: false,
			info: false,
			destroy: true,
			processing: true,
			serverSide: true,
			scrollX: false,
			ordering: false,
			buttons: [

			],
			dom: "<'row be-datatable-header'<'col-sm-2'l><'col-sm-6 text-left'B><'col-sm-4 text-right'f>>" +
				"<'row be-datatable-body'<'col-sm-12'tr>>" +
				"<'row be-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>",
			order: [
				[0, "desc"]
			],

			ajax: {

				"type": "POST",
				"url": PATH + "/" + $("#table_list_data").data('module') + "/Getdata/" + $("#table_list_data").data(
					'id') + '?filter_data=' + $("#table_list_data").data('filter_data')
			},
			"initComplete": function() {
				calcu();
			}
		});
	}
</script>
<?= $this->endSection() ?>