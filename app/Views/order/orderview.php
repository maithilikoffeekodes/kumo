<?= $this->extend(THEME . 'template') ?>
<?= $this->section('content') ?>
<section class="middle">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="text-center d-block mb-5">
                    <h2>Order View</h2>
                </div>
            </div>
        </div>


        <!-- End Page Header -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header card-header-divider">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover text-left mb-0">
                                    <tr>
                                        <th>User Name</th>
                                        <td><?= @$order_detail['name'] ?></td>
                                        <th>Email</th>
                                        <td><?= @$order_detail['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Contact Number</th>
                                        <td><?= @$order_detail['mobileno'] ?></td>
                                        <th>Address</th>
                                        <td>
                                            <?= @$order_detail['address']
                                            ?>
                                            <?= (!empty(@$order_detail['city_name']) ? ',' . $order_detail['city_name'] : '')
                                            ?>
                                            <?= (!empty(@$order_detail['state_name']) ? ',' . $order_detail['state_name'] : '')
                                            ?>
                                            <?= (!empty(@$order_detail['pincode']) ? ',' . $order_detail['pincode'] : '')
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Transaction</th>
                                        <td><?= @$order_detail['transaction_id'] ?></td>
                                        <th>Payment Type</th>
                                        <td><?php if (@$order_detail['payment_type'] == 'Razorpay') {
                                                echo "Online Payment";
                                            } ?>
                                        </td>
                                    </tr>
                                </table>
                                <table class="table table-bordered text-center mb-0" data-id="orderview" id="table_list_data" data-module="Home" data-filter_data="<?= @$order_detail['id'] ?>">
                                    <!-- data-filter_data is static as there are different tabs for filtering that are already defined -->
                                    <thead>
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
                                <div class="col-lg-6 mt-3" style="float:right;">
                                    <table class="table table-bordered table-fw-widget mb-0">
                                        <tr>

                                            <th>Total Amount</th>
                                            <td class="sub_total_amt">
                                                &#8377 <?= @$order_detail['sub_total'] ?> 
                                            </td>
                                        </tr>
                                        <tr>

                                            <th>Discount</th>
                                            <td>
                                                &#8377 <?= @$order_detail['coupon-discount'] ?> 
                                            </td>
                                        </tr>
                                        <tr>

                                            <th>Tax</th>
                                            <td>
                                                &#8377 <?= @$order_detail['tax_amt'] ?> 
                                            </td>
                                        </tr>
                                        <tr>


                                            <th>Grand Total</th>

                                            <td>
                                                &#8377 <?= @$order_detail['total_payment'] ?> 
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-6 mt-3" style="float:left;">
                                    <a href="<?= url('Home/invoice/'.@$order_detail['order_id']) ?>" download target="_blank" class=" btn btn-danger">Invoice Pdf</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script type="text/javascript">
    $(document).ready(function() {
        datatable_load('');
    });

    function datatable_load(filter_val) {

        $('#table_list_data').DataTable({
            destroy: true,
            paging: false,
            info: false,
            processing: true,
            serverSide: true,
            scrollX: false,
            searching: false,
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
            }

        });


    }
</script>
<?= $this->endSection() ?>