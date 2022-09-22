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
                            <li><a href="<?= url('Home/order') ?>" class="active"><i class="lni lni-shopping-basket mr-2"></i>My Order</a></li>
                            <li><a href="<?= url('Home/wishlist') ?>"><i class="lni lni-heart mr-2"></i>Wishlist</a></li>
                            <li><a href="<?= url('Home/register') ?>"><i class="lni lni-user mr-2"></i>Profile Info</a></li>
                            <li><a href="<?= url('Home/shipping_address')?>"><i class="lni lni-map-marker mr-2"></i>Manage Addresses</a></li>
                            <!-- <li><a href="payment-methode.html"><i class="lni lni-mastercard mr-2"></i>Payment Methode</a></li> -->
                            <li><a href="<?= url('Home/logout') ?>"><i class="lni lni-power-switch mr-2"></i>Log Out</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <?php //echo"<pre>";print_r($my_orders);exit;
            ?>

            <div class="col-12 col-md-12 col-lg-8 col-xl-8 text-center">
                <?php //echo"<pre>";print_r($my_orders);exit;
                ?>
                <!-- Single Order List -->
                <?php foreach (@$my_orders as $order) { ?>
                <div class="ord_list_wrap border mb-4 mfliud">
                        <div class="ord_list_head  d-flex align-items-center  px-3 py-3">
                            <div class="olh_flex">
                                <p class="m-0 p-0"><span class="text-muted">Order ID</span></p>
                                <h6 class="mb-0 ft-medium"><?= $order['id'] ?></h6>
                            </div>
                            <div class="olf_flex" style="margin-left: 434px;margin-right: 10px;"><a href="<?= url('Home/orderview/' . @$order['id']) ?>" class="btn btn-sm btn-dark"><i class="fa fa-eye mr-2"></i>View Order</a></div>
                            <div class="olh_flex">
                                <a href="<?= url('Home/track_order/'.@$order['id']) ?>" class="btn btn-sm btn-dark">Track Order</a>
                            </div>
                        </div>
                        <div class="olf_inner_right" style="margin-right: 638px;">
                            <h5 class="mb-0 fs-sm ft-bold">Total: <?= $order['total_payment']
                                                                    ?></h5>
                        </div>
                    </div>
                    <?php } ?>
                <!-- End Order List -->

            </div>

        </div>
    </div>
</section>

<?= $this->endSection() ?>