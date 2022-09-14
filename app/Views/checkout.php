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
                    <div class="d-block mb-3">
                        <h5 class="mb-4">Order Items</h5>
                        <table class="table table-borderless table-hover text-center mb-0" id="table_list_data" data-id="cart1" data-module="Home" data-filter_data=''>
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
                    </div>

                    <!-- <div class="col-12 col-lg-7 col-md-12"> -->
                    <!-- <form action="<? //= url('Home/shipping_address') 
                                        ?>" method="post" class="shipping_address"> -->
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
                                <label class="text-dark">Address*</label>
                                <input type="text" class="form-control" name="address" placeholder="Address" />
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
                                <label>States<span class="tx-danger">*</span></label>
                                <select name="state" id="state" class="form-control">
                                    <?php if (isset($data['state'])) { ?>
                                        <option value="<?= @$data['state'] ?>" selected><?= @$data['state_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>City<span class="tx-danger">*</span></label>
                                <select name="city" id="city" class="form-control">
                                    <?php if (isset($data['city'])) { ?>
                                        <option value="<?= @$data['city'] ?>" selected><?= @$data['city_name'] ?></option>
                                    <?php } ?>
                                </select>
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
                </div>
                <div class="col-12 col-lg-4 col-md-12" style="margin-top: 75px;">
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
    $(document).ready(function() {
        datatable_load();
        $("#state").select2({
        width: '100%',
        placeholder: 'Select...',
        ajax: {
            url: PATH + "/Home/Getdata/getstate",
            type: "post",
            allowClear: true,
            dataType: 'json',
            delay: 250,
            data: function(params) {
                console.log(params);
                return {
                    searchTerm: params.term // search term
                };
            },
            processResults: function(response) {
                console.log(response);
                return {
                    results: response
                };
            },
            cache: true
        }
    });
    $("#city").select2({
        width: '100%',
        placeholder: 'Select...',
        ajax: {
            url: PATH + "/Home/Getdata/getcity",
            type: "post",
            allowClear: true,
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    searchTerm: params.term, // search term
                    state_id: $('select[name="state"]').val(),
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