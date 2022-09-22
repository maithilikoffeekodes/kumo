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
                            <ul class="dahs_navbar">
                                <li><a href="<?= url('Home/order') ?>" class="active"><i class="lni lni-shopping-basket mr-2"></i>My Order</a></li>
                                <li><a href="<?= url('Home/wishlist') ?>"><i class="lni lni-heart mr-2"></i>My Wishlist</a></li>
                                <li><a href="<?= url('Home/register') ?>"><i class="lni lni-user mr-2"></i>My Profile Info</a></li>
                                <li><a href="<?= url('Home/address') ?>"><i class="lni lni-map-marker mr-2"></i>Manage Addresses</a></li>
                                <li><a href="<?= url('Home/logout') ?>"><i class="lni lni-power-switch mr-2"></i>Log Out</a></li>
                            </ul>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-4 col-xl-4 text-center miliods">
                <div class="row border shadow p-2 mb-5 bg-white rounded" id="add" data-id="address" data-module="Home">
                    <?php foreach (@$address as $row) {  if (!empty($row['user_id'])) { ?>
                        <?php //echo"<pre>";print_r($row);exit;?>
                        <div class="address-info pt-3 border-bottom col-lg-12 ">
                            <div style="float:left">
                                <div class="row mb-4">
                                    <div class="form-check col-12">
                                        <input class="form-check-input" type="radio" name="add2" id="flexRadioDefault2" value="<?= @$row['address_type'] ?>" checked>

                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <?= $row['fname'] ?>
                                        </label>
                                        <input type="hidden" value="<?= @$row['id'] ?>" name="id">
                                        <input type="hidden" value="<?= @$row['address_type'] ?>" name="type" id="type">
                                    </div>
                                    <div class="form-check col-12">
                                        <label class="" for="">
                                            Address . <?= @$row['address']; ?>
                                            <p>Mobile No. +91 <?= @$row['mobileno']; ?><br>
                                                <?= @$row['sname'] ?> , <?= @$row['cname'] ?>
                                            </p>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="float:right;">
                                <div class="sr-btn-wrap text-center">
                                    <span class="btn btn-block btn-dark mb-3">
                                        <?php if (empty($row['address_type'])) {
                                        ?>
                                            Home
                                        <?php } else {
                                        ?>
                                            <?= @$row['address_type']
                                            ?>
                                        <?php }
                                        ?>
                                    </span>
                                </div>
                                <div class="remove-btn pt-2">
                                    <?php if (!empty($row['address_type'])) {
                                    ?>
                                        <button class="btn mb-3 text-info edit" type="button" onclick="edit_address(this)" _data data-val="<?= @$row['id'] ?>" data-pk="<?= @$row['type'] ?>">Edit</button> |
                                        <button type="button" class="btn mb-3 text-danger remove" onclick="editable_remove(this)" data-val="<?= @$row['id'] ?>" data-pk="<?= @$row['id'] ?>">Remove</button>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } }
                    ?>
                </div>
            </div>
            <button class="btn btn-block btn-dark mb-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                + Add New Address
            </button>

            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form action="<?= url('Home/shipping_address') ?>" method="post" class="shipping_address" id="shipping_address">
                        <h5 class="mb-4 ft-medium">Billing Details</h5>
                        <div class="row mb-2">

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">First Name *</label>
                                    <input type="text" class="form-control" name="fname" placeholder="First Name" />
                                    <input type="hidden" id="id" name="id" value="">

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
                                        <option value="<?= @$row['state'] ?>" selected><?= @$row['state_name'] ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>City<span class="tx-danger">*</span></label>
                                    <select name="city" id="city" class="form-control">
                                        <option value="<?= @$row['city'] ?>" selected><?= @$row['city_name'] ?></option>
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
                            <div class="form-group col-md-6">
                                <label for="address-names">Choose Address Type:</label>
                                <select name="address_type" class="form-control" id="address_type">
                                    <option <?= (@$row['address_type'] === 'home' ? 'selected' : '') ?> value="home">Home</option>
                                    <option <?= (@$row['address_type'] === 'work' ? 'selected' : '') ?> value="work">Work</option>
                                    <option <?= (@$row['address_type'] === 'other' ? 'selected' : '') ?> value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="checkout-btn text-right">
                                <button type="submit" id="address_btn" class="btn btn-block btn-dark mb-3 address_btn">Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
    $('#address_btn').click(function() {
        $('.shipping_address').on('submit', function(e) {
            $('#address_btn').prop('disabled', true);
            $('.address_btn').attr("disabled", true);
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
                        location.reload();
                        $('#address_btn').prop('disabled', true);

                    } else {
                        $('.form_proccessing').html('');
                        $('#address_btn').prop('disabled', true);
                        $('.error-msg').html(response.msg);
                    }
                },
                error: function() {
                    $('#address_btn').prop('disabled', false);
                    alert('Error');
                }
            });

            return false;
        });

    });

    function editable_remove(data_edit) {
        var type = 'Remove';
        var data_val = $(data_edit).data('val');
        var pkno = $(data_edit).data('pk');
        swal.fire({
            title: "Are you sure Remove  ?",
            text: "You will not be able to recover this Data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            //closeOnConfirm: false,
            //closeOnCancel: false
        }).then((result) => {
            // function(isConfirm) {
            if (result.value) {
                _data = $.param({
                    pk: pkno
                }) + '&' + $.param({
                    val: data_val
                }) + '&' + $.param({
                    type: type
                }) + '&' + $.param({
                    method: $("#add").data('id')
                });

                if (data_val != undefined && data_val != '') {
                    $.post(PATH + "/" + $("#add").data('module') + "/Action/Update", _data, function(
                        data) {
                        console.log($.post);
                        if (data.st == 'success') {
                            datatable_load('');
                            swal.fire("Deleted!", "Your Data has been deleted.", "success");
                            location.reload();
                        }

                    });
                }

            } else {
                swal("Cancelled", "Your Data is safe :)", "error");
            }
            // })}
        });
    }

    function edit_address(data_val) {
        var id = $(data_val).data('val');
        _data = $.param({
            val: id
        });
        console.log(id);
        $.post(PATH + "/Home/getaddress", _data, function(response) {
            console.log(response);
            $(".collapse").slideToggle();
            $('input[name = "id"]').val(response.id);
            $('input[name = "fname"]').val(response.fname);
            $('input[name = "lname"]').val(response.lname);
            $('input[name = "email"]').val(response.email);
            $('input[name = "mobileno"]').val(response.mobileno);
            $('input[name = "address"]').val(response.address);
            $('select[name = "city"]').val(response.city);
            $('select[name = "state"]').val(response.state);
            $('input[name = "pincode"]').val(response.pincode);
            $('input[name = "address_type"]').val(response.address_type);
        });

    }
    $("input[name='add2']").on("click", function() {
        var val = $(this).closest("div.form-check").find("input[name='type']").val();
        // alert(val);
        $("#type").val(val);
    });
</script>
<?= $this->endSection() ?>