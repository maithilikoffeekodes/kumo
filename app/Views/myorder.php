<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>



<section class="middle">
    <div class="container">
        <div class="row align-items-start justify-content-between">

            <div class="col-12 col-md-12 col-lg-4 col-xl-4 text-center miliods">
                <div class="d-block border rounded">
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
                            <li><a href="<?= url('Home/my_order') ?>" class="active"><i class="lni lni-shopping-basket mr-2"></i>My Order</a></li>
                            <li><a href="<?= url('Home/wishlist') ?>"><i class="lni lni-heart mr-2"></i>Wishlist</a></li>
                            <li><a href="<?= url('Home/register') ?>"><i class="lni lni-user mr-2"></i>Profile Info</a></li>
                            <!-- <li><a href="<//?= url('Home/my_order')?>"><i class="lni lni-map-marker mr-2"></i>Addresses</a></li> -->
                            <!-- <li><a href="payment-methode.html"><i class="lni lni-mastercard mr-2"></i>Payment Methode</a></li> -->
                            <li><a href="<?= url('Home/logout') ?>"><i class="lni lni-power-switch mr-2"></i>Log Out</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <?php //echo"<pre>";print_r($my_orders);exit;?>

            <div class="col-12 col-md-12 col-lg-8 col-xl-8 text-center">

                <!-- Single Order List -->
                <div class="ord_list_wrap border mb-4 mfliud">
                    <div class="ord_list_head gray d-flex align-items-center justify-content-between px-3 py-3">
                        <div class="olh_flex">
                            <p class="m-0 p-0"><span class="text-muted">Order ID</span></p>
                            <h6 class="mb-0 ft-medium"><? //= $my_orders['order_id']
                                                        ?></h6>
                        </div>
                        <div class="olh_flex">
                            <a href="javascript:void(0);" class="btn btn-sm btn-dark">Track Order</a>
                        </div>
                    </div>
                    <?php //echo"<pre>";print_r($my_orders);exit;
                    ?>
                    <div class="ord_list_body text-left">
                        <!-- First Product -->
                        <?php foreach (@$my_orders as $order) { ?>

                            <div class="row align-items-center justify-content-center m-0 py-4 br-bottom">
                                <div class="col-xl-5 col-lg-5 col-md-5 col-12">
                                    <div class="cart_single d-flex align-items-start mfliud-bot">
                                        <div class="cart_selected_single_thumb">
                                            <a href="#"><img src="<?= @$order['image'] ?>" width="75" class="img-fluid rounded" alt=""></a>
                                        </div>
                                        <div class="cart_single_caption pl-3">
                                            <p class="mb-0"><span class="text-muted small"><?= @$order['category'] ?></span></p>
                                            <h4 class="product_title fs-sm ft-medium mb-1 lh-1"><?= @$order['name'] ?></h4>
                                            <!-- <p class="mb-2"><span class="text-dark medium">Size: 36</span>, <span class="text-dark medium">Color: Red</span></p> -->
                                            <h4 class="fs-sm ft-bold mb-0 lh-1"><?= @$order['listedprice'] ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                                    <!-- <p class="mb-1 p-0"><span class="text-muted">Status</span></p> -->
                                    <!-- <div class="delv_status"><span class="ft-medium small text-warning bg-light-warning rounded px-3 py-1">In Progress</span></div> -->
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                    <p class="mb-1 p-0"><span class="text-muted">Expected date by:</span></p>
                                    <h6 class="mb-0 ft-medium fs-sm">22 September 2021</h6>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                    <div class="ord_list_footer d-flex align-items-center justify-content-between br-top px-3">
                        <div class="olf_flex text-left px-0 py-2 br-right"><a href="javascript:void(0);" class="btn btn-sm btn-dark"><i class="ti-close mr-2"></i>Cancel Order</a></div>
                        <div class="olf_flex text-left px-0 py-2 br-right"><a href="<?= url('Home/orderview/'.@$order['order_id'])?>" class="btn btn-sm btn-dark"><i class="fa fa-eye mr-2"></i>View Order</a></div>
                        <div class="col-xl-9 col-lg-9 col-md-8 pr-0 py-2 olf_flex d-flex align-items-center justify-content-between">
                            <div class="olf_flex_inner hide_mob">
                              
                            </div>
                            <div class="olf_inner_right">
                                <h5 class="mb-0 fs-sm ft-bold">Total: <? //= $my_orders['total_payment']
                                                                        ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Order List -->

            </div>

        </div>
    </div>
</section>

<?= $this->endSection() ?>