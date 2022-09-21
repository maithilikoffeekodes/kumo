<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>
<style>
    .btn_love:hover {
        background-color: black;
        color: white;
    }
</style>
<?php //echo"<pre>";print_r($product);exit;
?>
<!-- ======================= Product Detail ======================== -->
<section class="middle">
    <div class="container">
        <div class="row justify-content-between">

            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12">
                <?php $image = @$product['image']; ?>
                <div class="quick_view_slide">
                    <?php
                    for ($i = 1; $i < count($image); $i++) {
                    ?>
                        <div class="single_view_slide">
                            <a href="<?= $product['image'][$i]; ?>" data-lightbox="roadtrip" class="d-block mb-4"><img src="<?= $product['image'][$i]; ?>" class="img-fluid rounded" alt="" style="height: 500px;width:500px;" /></a>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="prd_details">

                    <div class="prt_01 mb-2"><span class="text-success bg-light-success rounded px-2 py-1"><?= $product['brand_name'] ?></span></div>
                    <div class="prt_02 mb-3">
                        <h2 class="ft-bold mb-1"><?= $product['name'] ?></h2>

                        <div class="text-left">
                            <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                <?php for (@$i = 1; @$i <=  get_review_count($product['id']); @$i++) { ?>
                                    <i class="text-primary fas fa-star" value="1"></i>
                                <?php } ?>
                                <?php for (@$i = 1; @$i <= 5 - (int) get_review_count($product['id']); @$i++) { ?>
                                    <i class="text-primary far fa-star" value="1"></i>
                                <?php } ?>

                                <span class="small">(<?= get_review_total($product['id']) ?>) Reviews</span>
                            </div>
                            <div class="elis_rty"><span class="ft-bold theme-cl fs-lg p-2"><?= $product['listedprice'] ?></span><span class="ft-medium text-muted line-through fs-md mr-2 p-2">$<?= $product['price'] ?></span><span class="text-success bg-light-success rounded px-2 py-1"><?= $product['discount'] ?>% Off</span></div>
                        </div>
                    </div>

                    <div class="prt_03 mb-4">
                        <p><?= $product['description'] ?></p>
                    </div>

                    <div class="prt_04 mb-4">
                        <p class="d-flex align-items-center mb-1">Category:<strong class="fs-sm text-dark ft-medium ml-1"><?= $product['category_name'] ?></strong></p>
                        <!-- <p class="d-flex align-items-center mb-0">SKU:<strong class="fs-sm text-dark ft-medium ml-1">KUMO42568</strong></p> -->
                    </div>

                    <div class="prt_05 mb-4">
                        <div class="row mb-7">
                            <div class="col">
                                <div class="input-group quantity mr-3" style="width: 100px;">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-secondary btn-minus" onclick="decrement(this)">
                                            <span class="fa fa-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" name="qty" class="form-control text-center quantity" value="1" min="1" max="10" style="width: 130px;" readonly>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-secondary btn-plus" onclick="increment(this)">
                                            <span class="fa fa-plus"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-block custom-height bg-dark mb-2 cartbtn" id="cartbtn" data-product_id="<?php echo @$product['id'] ?> " data-price="<?= @$product['listedprice'] ?>" data-quantity="1">
                                    <i class="lni lni-shopping-basket mr-2"></i>Add to Cart
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-lg">
                            <!-- Submit -->

                            <!-- <div class="col-4">
                                <!-- Wishlist -
                                <button type="submit" class="btn custom-height btn-default btn-block mb-2 text-dark wish" id="wish" data-product_id="<?php echo @$product['id'] ?> " data-price="<?= @$row['price'] ?>" data-quantity="1" data-toggle="button">
                                    <i class="lni lni-heart mr-2"></i>Wishlist
                                </button>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="prt_06">
                        <p class="mb-0 d-flex align-items-center">
                            <span class="mr-4">Share:</span>
                            <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2" href="#!">
                                <i class="fab fa-twitter position-absolute"></i>
                            </a>
                            <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2" href="#!">
                                <i class="fab fa-facebook-f position-absolute"></i>
                            </a>
                            <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted" href="#!">
                                <i class="fab fa-pinterest-p position-absolute"></i>
                            </a>
                        </p>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= Product Detail End ======================== -->

<!-- ======================= Product Description ======================= -->
<section class="middle">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-11 col-lg-12 col-md-12 col-sm-12">
                <ul class="nav nav-tabs b-0 d-flex align-items-center justify-content-center simple_tab_links mb-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="description-tab" href="#description" data-toggle="tab" role="tab" aria-controls="description" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="#information" id="information-tab" data-toggle="tab" role="tab" aria-controls="information" aria-selected="false">Additional information</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="#reviews" id="reviews-tab" data-toggle="tab" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">

                    <!-- Description Content -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <div class="description_info">
                            <p class="p-0 mb-2"><?= $product['description'] ?></p>
                        </div>
                    </div>

                    <!-- Additional Content -->
                    <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
                        <div class="additionals">
                            <?= $product['additional_information'] ?>
                        </div>
                    </div>

                    <!-- Reviews Content -->
                    <?php //echo"<pre>";print_r($review);exit;
                    ?>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="reviews_info">
                            <?php //echo"<pre>";print_r($review);exit;
                            ?>
                            <?php foreach ($review as $row) { ?>
                                <!-- Single Review -->
                                <div class="single_rev d-flex align-items-start br-bottom py-3">
                                    <?php $date = new DateTime(@$row['created_at']); ?>
                                    <div class="single_rev_thumb"><img src="<?= ASSETS; ?>img/team-2.jpg" class="img-fluid circle" width="90" alt="" /></div>
                                    <div class="single_rev_caption d-flex align-items-start pl-3">
                                        <div class="single_capt_left">
                                            <h5 class="mb-0 fs-md ft-medium lh-1"><?= $row['name'] ?></h5>
                                            <span class="small"><?php echo @$date->Format('d M Y') ?></span>
                                            <p><?= $row['review'] ?></p>
                                        </div>
                                        <div class="single_capt_right">
                                            <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                                <?php for ($i = 1; $i <= @$row['rating']; $i++) { ?>
                                                    <i class="fas fa-star filled" value="1"></i>
                                                <?php } ?>
                                                <?php for ($i = 1; $i <= 5 - (int)@$row['rating']; $i++) { ?>
                                                    <i class="far fa-star filled" value="1"></i>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="reviews_rate">
                            <form class="row" method="post">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <h4>Submit Rating</h4>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="revie_stars d-flex align-items-center justify-content-between px-2 py-2 gray rounded mb-2 mt-1">
                                        <div class="srt_013">
                                            <input type="hidden" name="rating" id="rating"></input>
                                            <input type="hidden" name="product_id" id="product_id" value="<?= $product['id'] ?>"></input>
                                            <div class="submit-rating rating">
                                                <input id="star-5" type="radio" name="rating" value="5" />
                                                <label for="star-5" title="5 stars">
                                                    <i class="active fa fa-star btn_rating button1" onclick="get_rate(1)" aria-hidden="true"></i>
                                                </label>
                                                <input id="star-4" type="radio" name="rating" value="4" />
                                                <label for="star-4" title="4 stars">
                                                    <i class="active fa fa-star btn_rating button2" onclick="get_rate(2)" aria-hidden="true"></i>
                                                </label>
                                                <input id="star-3" type="radio" name="rating" value="3" />
                                                <label for="star-3" title="3 stars">
                                                    <i class="active fa fa-star btn_rating button3" onclick="get_rate(3)" aria-hidden="true"></i>
                                                </label>
                                                <input id="star-2" type="radio" name="rating" value="2" />
                                                <label for="star-2" title="2 stars">
                                                    <i class="active fa fa-star btn_rating button4" onclick="get_rate(4)" aria-hidden="true"></i>
                                                </label>
                                                <input id="star-1" type="radio" name="rating" value="1" />
                                                <label for="star-1" title="1 star">
                                                    <i class="active fa fa-star btn_rating button5" onclick="get_rate(5)" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- <div class="srt_014">
                                            <h6 class="mb-0">4 Star</h6>
                                        </div> -->
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="medium text-dark ft-medium">Full Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required />
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="medium text-dark ft-medium">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" required />
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="medium text-dark ft-medium">Description</label>
                                        <textarea class="form-control" id="review" name="review" cols="30" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="tx-danger error-msg"></div>
                                    <div class="tx-success form_proccessing"></div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group m-0">
                                        <button id="save_data" name="submit" type="submit" class="btn btn-white stretched-link hover-black save_data review_btn">Review<i class="lni lni-arrow-right"></i></button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= Product Description End ==================== -->

<!-- ======================= Similar Products Start ============================ -->
<section class="middle pt-0">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center">
                    <h2 class="off_title">Similar Products</h2>
                    <h3 class="ft-bold pt-3">Matching Product</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="slide_items">
                    <?php foreach (@$related_product as $row) {
                    ?>
                        <!-- single Item -->
                        <div class="single_itesm">
                            <div class="product_grid card b-0 mb-0">
                                <!-- <div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">Sale</div> -->
                                <button class="snackbar-wishlist btn btn_love position-absolute ab-right wish" id="wishlist" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"><i class="far fa-heart"></i></button>
                                <div class="card-body p-0">
                                    <div class="shop_thumb position-relative">
                                        <a class="card-img-top d-block overflow-hidden" href="<?= url('Home/productdetail/' . @$row['id'])
                                                                                                ?>"><img class="card-img-top" src="<?= @$row['image']
                                                                                                                                    ?>" alt="..." style="height: 350px ;width: 272px;"></a>
                                        <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                            <div class="edlio"><a href="#" class="text-white fs-sm ft-medium cartbtn" id="cartbtn" data-product_id="<?php echo @$row['id'] ?>" data-price="<?= @$row['price'] ?>" data-quantity="1"><i class="lni lni-shopping-basket mr-2"></i>Add to Cart</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer b-0 p-3 pb-0 d-flex align-items-start justify-content-center">
                                    <div class="text-left">
                                        <div class="text-center">
                                            <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="<?= url('Home/productdetail/' . @$row['id'])
                                                                                                ?>"><?= $row['name'] ?></a></h5>

                                            <div class="elis_rty"><span class="ft-bold text-dark fs-sm">₹<?= $row['listedprice'] ?></span><span class="text-secondary p-2 p-2"><del>₹<?= $row['price'] ?></del></span><span class="text-success bg-light-success rounded px-2 py-1"><?= $row['discount'] ?> % off</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ======================= Similar Products Start ============================ -->
<?= $this->endsection() ?>
<?= $this->section('scripts') ?>
<script type="text/javascript">
    $(document).ready(function() {

        $('.cartbtn').click(function(event) {

            var product_id = $(this).data("product_id");
            var quantity = $('.quantity').val()!='' ? $('.quantity').val() :$(this).data("quantity") ;
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
                    }
                    if (response.st == 'added') {
                        toastr.warning(response.msg);
                    } else {
                        $('.form_processing').html('');
                        $('#cartbtn').prop('disabled', false);
                        $('.error-msg').html(response.msg);
                    }
                }
            });
        });

    });

    function increment(val) {
        var qty = $(val).closest('.quantity').find('input[name="qty"]').val();
        qty++;
        console.log(qty);

        parseFloat($('.quantity').val(qty))
        $(val).closest('.quantity').find('.count').text(qty);


        calcu();
    }

    function decrement(val) {
        var qty = $(val).closest('.quantity').find('input[name="qty"]').val();

        if (qty != 1) {
            qty--;
        }
        parseFloat($('.quantity').val(qty));
        $(val).closest('.quantity').find('.count').text(qty);


        calcu();
    }

    function calcu() {
        console.log("qty");

        var qty = $('.quantity').map(function() {
            return parseFloat(this.value);
        }).get();
    }

    function get_rate(val) {
        $(".btn_rating").removeClass("fas fa-star");
        $(".btn_rating").addClass("far fa-star");
        $('#rating').val(val); // set rating value in hidden input

        / =========== loop for count the start and changing the color and class =========== /
        for (let i = 1; i <= parseInt(val); i++) {
            var button = ".button" + i;
            $(button).removeClass("far fa-star");
            $(button).addClass("fas fa-star");
        }
    }

    
    $(document).on('click', '.review_btn', function() {

        var email = $('#email').val();
        var name = $('#name').val();
        var review = $('#review').val();
        var rating = $('#rating').val();
        var product_id = $('#product_id').val();

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };

        $.ajax({
            url: "<?php echo url('Home/review'); ?>",
            method: "POST",
            data: {
                email: email,
                name: name,
                review: review,
                rating: rating,
                product_id: product_id
            },
            success: function(response) {
                if (response.st == 'success') {
                    toastr.success(response.msg);
                } else {
                    $('.form_processing').html('');
                    $('#cartbtn').prop('disabled', false);
                    $('.error-msg').html(response.msg);
                }
            }

        });

    });
    // $('.ajax-form-submit').on('submit', function(e) {
    //     // console.log("abc");
    //     $('#save_data').prop('disabled', true);
    //     $('.save_data').attr("disabled", true);
    //     $('.error-msg').html('');
    //     $('.form_proccessing').html('Please wait...');
    //     e.preventDefault();
    //     var aurl = $(this).attr('action');
    //     var form = $(this);
    //     var formdata = false;
    //     $.ajax({
    //         type: "POST",
    //         url: aurl,
    //         data: formdata ? formdata : form.serialize(),
    //         success: function(response) {
    //             alert("sdjkhbfkdfkgbkdf");return;
    //             if (response.st == "success") {
    //                 alert("fpiohgldfhoigh");return;
    //                 // window.location.href( //= url('Home/productdetail/' . $product['id']) );
    //                 location.reload();
    //             } else {
    //                 location.reload();
    //                 $('.form_proccessing').html('');
    //                 $('#save_data').prop('disabled', false);
    //                 $('.error-msg').html(response.msg);
    //             }
    //         },
    //         error: function() {
    //             $('#save_data').prop('disabled', false);
    //             alert('Error');
    //         }
    //     });

    //     return false;
    // });
</script>
<?= $this->endSection() ?>