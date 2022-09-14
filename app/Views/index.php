<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

<?php //echo"<pre>";print_r($rand_item);exit; 
?>

<!-- ============================ Hero Banner  Start================================== -->
<div class="container-fluid mb-3">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#header-carousel" data-slide-to="1"></li>
                    <li data-target="#header-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php foreach (@$rand_slider as $row) ?>
                    <div class="carousel-item position-relative active" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="<?= @$row['image']; ?>" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown"><?= @$row['name']; ?></h1>
                                <!-- <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p> -->
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="<?= url('Home/shopl')?>">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <?php foreach (@$rand_slider as $row) { ?>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="<?= @$row['image']; ?>" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown"><?= @$row['name']; ?></h1>
                                    <!-- <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p> -->
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
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
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/fashion.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Men's Wear</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/tshirt.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Kid's Wear</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/accessories.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Accessories</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/sneakers.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Men's Shoes</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/television.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Television</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/pant.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Men's Pants</a></h6>
                    </div>
                </div>
            </div>
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
                                <a class="card-img-top d-block overflow-hidden" href="<?= url('Home/productdetail/' . $row['id']) ?>"><img class="card-img-top" src="<?= $row['image'] ?>" alt="..."></a>
                                <div class="product-left-hover-overlay">
                                    <ul class="left-over-buttons">
                                        <li><a class="d-inline-flex circle align-items-center justify-content-center"><i class="fas fa-expand-arrows-alt position-absolute"></i></a></li>
                                        <li><a class="d-inline-flex circle align-items-center justify-content-center wish" id="wishlist" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1" ><i class="far fa-heart position-absolute"></i></a></li>
                                        <li><a class="d-inline-flex circle align-items-center justify-content-center  cartbtn" id="cartbtn" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"><i class="fas fa-shopping-basket position-absolute"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer b-0 p-0 pt-2 bg-white d-flex align-items-start justify-content-between">
                            <div class="text-left">
                                <div class="text-left">
                                    <div class="elso_titl"><span class="small"><?= $row['category'] ?></span></div>
                                    <h5 class="fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html"><?= $row['name'] ?></a></h5>
                                    <div class="star-rating align-items-center d-flex justify-content-left mb-2 p-0">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
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
                    <a href="shop-style-1.html" class="btn stretched-link borders">Explore More<i class="lni lni-arrow-right ml-2"></i></a>
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
                <?php foreach($rand_brand as $row) { ?>
                    <div class="single-brnads">
                        <img src="<?= $row['image']?>" class="img-fluid" alt="" />
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
                        <a href="#" class="btn btn-lg bg-white px-5 text-dark ft-medium">Explore Your Order</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="ht-60"></div>
</section>
<!-- ======================= Tag Wrap Start ============================ -->

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
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/headphones.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Headphones</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/watch.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Watches</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/washing-machine.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Washing Machine</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/cell-phone.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">iPhones</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/safety-goggles.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Goggles</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/camera.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Video Camera</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/fashion.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Men's Wear</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/tshirt.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Kid's Wear</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/accessories.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Accessories</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/sneakers.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Men's Shoes</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/television.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Television</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-4">
                <div class="cats_side_wrap text-center mx-auto mb-3">
                    <div class="sl_cat_01">
                        <div class="d-inline-flex align-items-center justify-content-center p-4 circle mb-2 border"><a href="javascript:void(0);" class="d-block"><img src="<?= ASSETS; ?>img/pant.png" class="img-fluid" width="40" alt=""></a></div>
                    </div>
                    <div class="sl_cat_02">
                        <h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Men's Pants</a></h6>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ======================= All Category ======================== -->

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
                    <div class="single_review">
                        <div class="sng_rev_thumb">
                            <figure><img src="<?= ASSETS; ?>img/team-1.jpg" class="img-fluid circle" alt="" /></figure>
                        </div>
                        <div class="sng_rev_caption text-center">
                            <div class="rev_desc mb-4">
                                <p class="fs-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                            </div>
                            <div class="rev_author">
                                <h4 class="mb-0">Mark Jevenue</h4>
                                <span class="fs-sm">CEO of Addle</span>
                            </div>
                        </div>
                    </div>

                    <!-- single review -->
                    <div class="single_review">
                        <div class="sng_rev_thumb">
                            <figure><img src="<?= ASSETS; ?>img/team-2.jpg" class="img-fluid circle" alt="" /></figure>
                        </div>
                        <div class="sng_rev_caption text-center">
                            <div class="rev_desc mb-4">
                                <p class="fs-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                            </div>
                            <div class="rev_author">
                                <h4 class="mb-0">Henna Bajaj</h4>
                                <span class="fs-sm">Aqua Founder</span>
                            </div>
                        </div>
                    </div>

                    <!-- single review -->
                    <div class="single_review">
                        <div class="sng_rev_thumb">
                            <figure><img src="<?= ASSETS; ?>img/team-3.jpg" class="img-fluid circle" alt="" /></figure>
                        </div>
                        <div class="sng_rev_caption text-center">
                            <div class="rev_desc mb-4">
                                <p class="fs-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                            </div>
                            <div class="rev_author">
                                <h4 class="mb-0">John Cenna</h4>
                                <span class="fs-sm">CEO of Plike</span>
                            </div>
                        </div>
                    </div>

                    <!-- single review -->
                    <div class="single_review">
                        <div class="sng_rev_thumb">
                            <figure><img src="<?= ASSETS; ?>img/team-4.jpg" class="img-fluid circle" alt="" /></figure>
                        </div>
                        <div class="sng_rev_caption text-center">
                            <div class="rev_desc mb-4">
                                <p class="fs-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                            </div>
                            <div class="rev_author">
                                <h4 class="mb-0">Madhu Sharma</h4>
                                <span class="fs-sm">Team Manager</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= Customer Review ======================== -->

<!-- ======================= Top Seller Start ============================ -->
<section class="space min">
    <div class="container">

        <div class="row">

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="top-seller-title">
                    <h4 class="ft-medium">Top Seller</h4>
                </div>
                <div class="ftr-content">

                    <!-- Single Item -->
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

                    <!-- Single Item -->
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

                    <!-- Single Item -->
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
                    <!-- Single Item -->
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

                    <!-- Single Item -->
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

                    <!-- Single Item -->
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
                    <!-- Single Item -->
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

                    <!-- Single Item -->
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

                    <!-- Single Item -->
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
</section>
<!-- ======================= Top Seller Start ============================ -->



<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>

<script>
    $(document).ready(function() {

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
                if (response.st == 'success') {
                    toastr.success(response.msg);
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
</script>
<?= $this->endSection() ?>