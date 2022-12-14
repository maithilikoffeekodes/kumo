<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    body {
        background-color: #eeeeee;
        font-family: 'Open Sans', serif
    }

    .container {
        margin-top: 50px;
        margin-bottom: 50px
    }

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: black
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: black;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 43px;
        height: 43px;
        line-height: 38px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    i {
        font-size: 30px;
    }

    .itemside {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: 100%
    }

    .itemside .aside {
        position: relative;
        -ms-flex-negative: 0;
        flex-shrink: 0
    }

    .img-sm {
        width: 80px;
        height: 80px;
        padding: 7px
    }

    ul.row,
    ul.row-sm {
        list-style: none;
        padding: 0
    }

    .itemside .info {
        padding-left: 15px;
        padding-right: 7px
    }

    .itemside .title {
        display: block;
        margin-bottom: 5px;
        color: #212529
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem
    }

    .btn-warning {
        color: #ffffff;
        background-color: black;
        border-color: black;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: darkgray;
        border-color: darkgray;
        border-radius: 1px
    }
</style>
<div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <ul class="row">
            <? //php  for ($i = 0; $i < count(@$order); $i++) {  
            ?>
            <!-- <li class="col-md-4">
                <figure class="itemside mb-3">
                    <div class="aside"><img src="<?= @$orders[$i]['image'] ?>" class="img-sm border"></div>
                    <figcaption class="info align-self-center">
                        <p class="title"><?= @$orders[$i]['name'] ?> <br> <?= @$orders[$i]['category_name'] ?></p> <span class="text-muted"><?= @$orders[$i]['listedprice'] ?> </span>
                    </figcaption>
                </figure>
            </li> -->
            <? //php } 
            ?>
        </ul>
        <div class="card-body">
            <?php //echo"<pre>";print_r($track_order);exit;
            ?>
            <h6>Order ID: <?= $track_order['id'] ?></h6>
            <article class="card">
                <div class="card-body row">
                    <?php $date = date("Y-m-d", strtotime(@$track_order['order_date']));
                    date_default_timezone_set('Asia/Kolkata');
                    $today = date('Y-m-d');
                    // $today = date('2022-09-22');
                    $delivery_date = date('Y-m-d', strtotime($date . ' + 8 days'));
                    $pick_by_courier = date('Y-m-d', strtotime($date . ' + 2 days'));
                    $on_the_way = date('Y-m-d', strtotime($pick_by_courier . ' + 3 days'));
                    $ready_pickup = date('Y-m-d', strtotime($on_the_way . ' + 3 days'));
                    // echo $today;
                    if ($date <= $today) {
                        if ($pick_by_courier <= $today) {
                            if ($on_the_way <= $today) {
                                if ($ready_pickup == $today) {
                                    $status =  "ready pickup";
                                } else {
                                    $status =  "on the way";
                                }
                            } else {
                                $status = "pick by courier";
                            }
                        } else {
                            $status = "order confirmed";
                        }
                    } else {
                        $status = "no status";
                    }

                    ?>
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br><?php echo $delivery_date ?></div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> KUMO, | <i class="fa fa-phone"></i> +1598675986 </div>
                    <div class="col"> <strong>Status:</strong> <br><?php echo $status ?></div>
                    <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                </div>
            </article>
            <div class="track">
                <?php if ($status == "order confirmed") { ?>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"><?php echo " Order confirmed"; ?> </span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier </span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way</span> </div>
                    <div class="step "> <span class="icon"> <i class="fas fa-box-open"></i> </span> <span class="text"> Ready for pickup </span> </div>
                <?php } else if ($status == "pick by courier") { ?>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"><?php echo " Order confirmed"; ?> </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier </span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way</span> </div>
                    <div class="step "> <span class="icon"> <i class="fas fa-box-open"></i> </span> <span class="text"> Ready for pickup </span> </div>
                <?php } else if ($status ==  "on the way") { ?>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"><?php echo " Order confirmed"; ?> </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way</span> </div>
                    <div class="step "> <span class="icon"> <i class="fas fa-box-open"></i> </span> <span class="text"> Ready for pickup </span> </div>
                <?php } else if ($status ==  "ready pickup") { ?>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"><?php echo " Order confirmed"; ?> </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fas fa-box-open"></i> </span> <span class="text"> Ready for pickup </span> </div>
                <?php } ?>
            </div>
            <!-- <div class="track">
                <?php if (@$date == $today) { ?>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"><?php echo " Order confirmed"; ?> </span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier </span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way</span> </div>
                    <div class="step "> <span class="icon"> <i class="fas fa-box-open"></i> </span> <span class="text"> Ready for pickup </span> </div>
                <?php
                } else if (@$pick_by_courier == $today) { ?>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"><?php echo " Order confirmed"; ?> </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"><?php echo "Picked by courier"; ?> </span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way</span> </div>
                    <div class="step "> <span class="icon"> <i class="fas fa-box-open"></i> </span> <span class="text"> Ready for pickup </span> </div>

                <?php  } else if (@$on_the_way == $today) { ?>

                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"><?php echo " Order confirmed"; ?> </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"><?php echo "Picked by courier"; ?> </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"><?php echo "On the way"; ?></span> </div>
                    <div class="step "> <span class="icon"> <i class="fas fa-box-open"></i> </span> <span class="text"><?php echo "Ready for pickup"; ?> </span> </div>
                <?php } else if (@$ready_pickup == $today) { ?>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"><?php echo " Order confirmed"; ?> </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"><?php echo "Picked by courier"; ?> </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"><?php echo "On the way"; ?></span> </div>
                    <div class="step active"> <span class="icon"> <i class="fas fa-box-open"></i> </span> <span class="text"><?php echo "Ready for pickup"; ?> </span> </div>
                <?php } else { ?>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"><?php echo " Order confirmed"; ?> </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"><?php echo "Picked by courier"; ?> </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"><?php echo "On the way"; ?></span> </div>
                    <div class="step"> <span class="icon"> <i class="fas fa-box-open"></i> </span> <span class="text"><?php echo "Ready for pickup"; ?> </span> </div>
                <?php } ?>
            </div> -->
            <hr>

            <hr>
            <a href="<?= url('Home/orderview/' . @$track_order['id']) ?>" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
</div>
<?= $this->endSection() ?>