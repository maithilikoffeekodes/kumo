<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

<?php //echo"<pre>";print_r($rand_item);exit; 
?>

<!-- ============================ Hero Banner  Start================================== -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <?php foreach (@$rand_slider as $row)  ?>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?= @$row['image']; ?>" alt="First slide" style="height:600px ;">
        </div>
        <?php foreach (@$rand_slider as $row) { ?>

            <div class="carousel-item">
                <img class="d-block w-100" src="<?= @$row['image']; ?>" alt="Second slide" style="height:600px ;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= @$row['image']; ?>" alt="Third slide" style="height:600px ;">
            </div>
    </div>
<?php } ?>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>
<!-- ============================ Hero Banner End ================================== -->
<!-- ======================= All Category ======================== -->
<section class="middle">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center">
                    <h2 class="off_title">Popular Categories</h2>
                    <h3 class="ft-bold pt-3">Trending Categories</h3>
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-center">
            <?php foreach (@$rand_category as $row) { ?>

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                    <div class="cats_side_wrap text-center mx-auto mb-3">
                        <div class="sl_cat_01">
                            <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="<?= url('Home/shoplist?category=' . @$row['id']) ?>" class="d-block"><img src="<?= $row['image'] ?>" class="img-fluid" width="40" alt=""></a></div>
                        </div>
                        <div class="sl_cat_02">
                            <h6 class="m-0 ft-medium fs-sm"><a href="<?= url('Home/shoplist?category=' . @$row['id']) ?>"><?= $row['category'] ?></a></h6>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section>
<!-- ======================= All Category ======================== -->

<!-- ======================= Product List ======================== -->
<section class="middle">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center">
                    <h2 class="off_title">Trendy Products</h2>
                    <h3 class="ft-bold pt-3">Our Trending Products</h3>
                </div>
            </div>
        </div>

        <div class="row align-items-center rows-products">
            <!-- Single -->
            <?php foreach (@$rand_item as $row) { ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                    <div class="product_grid card b-0">
                        <div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">Sale</div>
                        <div class="card-body p-0">
                            <div class="shop_thumb position-relative">
                                <a class="card-img-top d-block overflow-hidden" href="<?= url('Home/productdetail/' . $row['id']) ?>"><img class="card-img-top" src="<?= $row['image'] ?>" alt="..." style="height: 350px ;width: 260px;"></a>
                                <div class="product-left-hover-overlay">
                                    <ul class="left-over-buttons">
                                        <!-- <li><a class="d-inline-flex circle align-items-center justify-content-center"><i class="fas fa-expand-arrows-alt position-absolute"></i></a></li> -->
                                        <li><a class="d-inline-flex circle align-items-center justify-content-center wish" id="wishlist" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"><i class="far fa-heart position-absolute"></i></a></li>
                                        <li><a class="d-inline-flex circle align-items-center justify-content-center  cartbtn" id="cartbtn" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"><i class="fas fa-shopping-basket position-absolute"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer b-0 p-0 pt-2 bg-white d-flex align-items-start justify-content-between">
                            <div class="text-left">
                                <div class="text-left">
                                    <div class="elso_titl"><span class="small"><?= $row['category_name'] ?></span></div>
                                    <h5 class="fs-md mb-0 lh-1 mb-1" style="min-height:50px ;"><a href="shop-single-v1.html"><?= $row['name'] ?></a></h5>
                                    <div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
                                    <?php for (@$i = 1; @$i <=  get_review_count($row['id']); @$i++) { ?>
                                    <i class="text-primary fas fa-star" value="1"></i>
                                <?php } ?>
                                <?php for (@$i = 1; @$i <= 5 - (int) get_review_count($row['id']); @$i++) { ?>
                                    <i class="text-primary far fa-star" value="1"></i>
                                <?php } ?>

                                <span class="small">(<?= get_review_total($row['id']) ?>) Reviews</span>
                                    </div>
                                    <div class="elis_rty"><span class="ft-bold text-dark fs-sm">₹<?= $row['listedprice'] ?></span><span class="text-secondary p-2 p-2"><del>₹<?= $row['price'] ?></del></span><span class="text-success bg-light-success rounded px-2 py-1"><?= $row['discount'] ?> % off</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="position-relative text-center">
                    <a href="<?= url('Home/shoplist') ?>" class="btn stretched-link borders">Explore More<i class="lni lni-arrow-right ml-2"></i></a>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ======================= Product List ======================== -->

<!-- ======================= Brand Start ============================ -->
<section class="py-3 br-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="smart-brand">
                    <?php foreach ($rand_brand as $row) { ?>
                        <div class="single-brnads">
                            <img src="<?= $row['image'] ?>" class="img-fluid" alt="" />
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= Brand Start ============================ -->

<!-- ======================= Tag Wrap Start ============================ -->
<section class="bg-cover" style="background:url(<?= ASSETS; ?>img/e-middle-banner.png) no-repeat;">
    <div class="ht-60"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="tags_explore text-center">
                    <h2 class="mb-0 text-white ft-bold">Big Sale Up To 70% Off</h2>
                    <p class="text-light fs-lg mb-4">Exclussive Offers For Limited Time</p>
                    <p>
                        <a href="<?= url('Home/shoplist') ?>" class="btn btn-lg bg-white px-5 text-dark ft-medium">Explore More</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="ht-60"></div>
</section>
<!-- ======================= Tag Wrap Start ============================ -->



<!-- ======================= Customer Review ======================== -->
<section class="gray">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center">
                    <h2 class="off_title">Testimonials</h2>
                    <h3 class="ft-bold pt-3">Client Reviews</h3>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12">
                <div class="reviews-slide px-3">

                    <!-- single review -->
                    <?php foreach ($review as $row) { ?>

                        <!-- single review -->
                        <div class="single_review">
                            <div class="sng_rev_thumb">
                                <figure><img src="<?= ASSETS; ?>img/team-2.jpg" class="img-fluid circle" alt="" /></figure>
                            </div>
                            <div class="sng_rev_caption text-center">
                                <div class="rev_desc mb-4">
                                    <p class="fs-md"><?= $row['review'] ?></p>
                                </div>
                                <div class="rev_author">
                                    <h4 class="mb-0"><?= $row['name'] ?></h4>
                                    <!-- <span class="fs-sm">Aqua Founder</span> -->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= Customer Review ======================== -->

<!-- ======================= Top Seller Start ============================ -->
<!-- <section class="space min">
    <div class="container">

        <div class="row">

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="top-seller-title">
                    <h4 class="ft-medium">Top Seller</h4>
                </div>
                <div class="ftr-content">

                    <!-- Single Item --
                    <div class="product_grid row">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-4">
                            <div class="shop_thumb position-relative">
                                <div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">Sale</div>
                                <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="<?= ASSETS; ?>img/shop/1.png" alt="..."></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 col-8 pl-0">
                            <div class="text-left mfliud">
                                <div class="elso_titl"><span class="small">Mobiles</span></div>
                                <h5 class="fs-md mb-0 lh-1 mb-1 ft-medium"><a href="shop-single-v1.html">Zoomio iPhones</a></h5>
                                <div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$99 - $129</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item --
                    <div class="product_grid row">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-4">
                            <div class="shop_thumb position-relative">
                                <div class="badge bg-danger text-white position-absolute ft-regular ab-left text-upper">-50%</div>
                                <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="<?= ASSETS; ?>img/shop/2.png" alt="..."></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 col-8 pl-0">
                            <div class="text-left mfliud">
                                <div class="elso_titl"><span class="small">TV/LED</span></div>
                                <h5 class="fs-md mb-0 lh-1 mb-1 ft-medium"><a href="shop-single-v1.html">32 Inch Smart LED</a></h5>
                                <div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$799 - $1200</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item --
                    <div class="product_grid row">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-4">
                            <div class="shop_thumb position-relative">
                                <div class="badge bg-warning text-white position-absolute ft-regular ab-left text-upper">Hot</div>
                                <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="<?= ASSETS; ?>img/shop/10.png" alt="..."></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 col-8 pl-0">
                            <div class="text-left mfliud">
                                <div class="elso_titl"><span class="small">Headphone</span></div>
                                <h5 class="fs-md mb-0 lh-1 mb-1 ft-medium"><a href="shop-single-v1.html">Ziomi Headphone</a></h5>
                                <div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$49 - $110</span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="ftr-title">
                    <h4 class="ft-medium">Featured Products</h4>
                </div>
                <div class="ftr-content">
                    <!-- Single Item --
                    <div class="product_grid row">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-4">
                            <div class="shop_thumb position-relative">
                                <div class="badge bg-warning text-white position-absolute ft-regular ab-left text-upper">Hot</div>
                                <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="<?= ASSETS; ?>img/shop/4.png" alt="..."></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 col-8 pl-0">
                            <div class="text-left mfliud">
                                <div class="elso_titl"><span class="small">iPhones</span></div>
                                <h5 class="fs-md mb-0 lh-1 mb-1 ft-medium"><a href="shop-single-v1.html">iPhone Smart 13</a></h5>
                                <div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$990 - $1100</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item --
                    <div class="product_grid row">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-4">
                            <div class="shop_thumb position-relative">
                                <div class="badge bg-danger text-white position-absolute ft-regular ab-left text-upper">-50%</div>
                                <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="<?= ASSETS; ?>img/shop/5.png" alt="..."></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 col-8 pl-0">
                            <div class="text-left mfliud">
                                <div class="elso_titl"><span class="small">Camera</span></div>
                                <h5 class="fs-md mb-0 lh-1 mb-1 ft-medium"><a href="shop-single-v1.html">Hero Video Camera</a></h5>
                                <div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$600 - $929</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item --
                    <div class="product_grid row">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-4">
                            <div class="shop_thumb position-relative">
                                <div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">Sale</div>
                                <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="<?= ASSETS; ?>img/shop/6.png" alt="..."></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 col-8 pl-0">
                            <div class="text-left mfliud">
                                <div class="elso_titl"><span class="small">Headphone</span></div>
                                <h5 class="fs-md mb-0 lh-1 mb-1 ft-medium"><a href="shop-single-v1.html">V1 Jumpsuit Headphone</a></h5>
                                <div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$99 - $219</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="ftr-title">
                    <h4 class="ft-medium">Recent Products</h4>
                </div>
                <div class="ftr-content">
                    <!-- Single Item --
                    <div class="product_grid row">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-4">
                            <div class="shop_thumb position-relative">
                                <div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">Sale</div>
                                <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="<?= ASSETS; ?>img/shop/7.png" alt="..."></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 col-8 pl-0">
                            <div class="text-left mfliud">
                                <div class="elso_titl"><span class="small">TV/LED</span></div>
                                <h5 class="fs-md mb-0 lh-1 mb-1 ft-medium"><a href="shop-single-v1.html">Smart 43 Inch LED</a></h5>
                                <div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$909 - $1400</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item --
                    <div class="product_grid row">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-4">
                            <div class="shop_thumb position-relative">
                                <div class="badge bg-warning text-white position-absolute ft-regular ab-left text-upper">Hot</div>
                                <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="<?= ASSETS; ?>img/shop/8.png" alt="..."></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 col-8 pl-0">
                            <div class="text-left mfliud">
                                <div class="elso_titl"><span class="small">Headphone</span></div>
                                <h5 class="fs-md mb-0 lh-1 mb-1 ft-medium"><a href="shop-single-v1.html">Vivo Smart Headphone</a></h5>
                                <div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$129 - $549</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item --
                    <div class="product_grid row">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-4">
                            <div class="shop_thumb position-relative">
                                <div class="badge bg-danger text-white position-absolute ft-regular ab-left text-upper">-50%</div>
                                <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="<?= ASSETS; ?>img/shop/9.png" alt="..."></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 col-8 pl-0">
                            <div class="text-left mfliud">
                                <div class="elso_titl"><span class="small">Mobiles</span></div>
                                <h5 class="fs-md mb-0 lh-1 mb-1 ft-medium"><a href="shop-single-v1.html">Micro Android Phones</a></h5>
                                <div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$990 - $1949</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section> -->
<!-- ======================= Top Seller Start ============================ -->



<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>

<script>
    $(document).ready(function() {

        function search1() {
            var search = "<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>";
            window.location.href = "<?php echo url('Home/shoplist?search=') ?>" + search;
        }

        $('.cartbtn').click(function(event) {

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
                console.log(response);
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
</script>
<?= $this->endSection() ?>