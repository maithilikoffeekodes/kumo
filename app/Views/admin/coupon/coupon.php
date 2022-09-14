<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>


<div class="page-header">
    <div>
        <h2 class="main-content-title tx-24 mg-b-5">Coupon</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Coupon Detail</a></li>
            <li class="breadcrumb-item active" aria-current="page">Coupon Details</li>
        </ol>
    </div>
    <div class="btn btn-list">
            <a data-toggle="modal" href="<?= url('admin/Home/createCoupon')?>" data-target="#fm_model"
                    data-title="Add Coupon" class="btn waves-effect waves-light btn-primary btn-outline-primary btn-round" style="float: right;"><span class="mdi mdi-plus"></span> Add Coupon</a>
    </div>
</div>
<!-- End Page Header -->
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header card-header-divider">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-fw-widget" id="table_list_data" data-id="Coupon" data-module="admin/Home" data-filter_data='' style="width:100%">
                            <!-- data-filter_data is static as there are different tabs for filtering that are already defined -->
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Coupon</th>
                                    <th>Coupon Value</th>
                                    <th>Coupon Type</th>
                                    <th>Cart_min_value</th>
                                    <th>Date&Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>
<?= $this->section('scripts') ?>
<script type="text/javascript">
    $(document).ready(function() {
        datatable_load('');
    });
    
    function datatable_load(filter_val) {
        
        //  alert("kjnakjskaj");return;
        $('#table_list_data').DataTable({

            destroy: true,
            processing: true,
            serverSide: true,
            scrollX: false,
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ],
            dom: "<'row be-datatable-header'<'col-sm-2'l><'col-sm-6 text-left'B><'col-sm-4 text-right'f>>" +
                "<'row be-datatable-body'<'col-sm-12'tr>>" +
                "<'row be-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>",
            order: [
                [0, "desc"]
            ],
            ajax: {
                "type": "POST",
                "url": PATH + "/" + $("#table_list_data").data('module') + "/Getdata/" + $("#table_list_data").data('id') + '?filter_data=' + $("#table_list_data").data('filter_data')
            }
        });
    }
    // localhost8080/Home/Getdata
    function editable_remove(data_edit) {
        var type = 'Remove';
        
        var data_val = $(data_edit).data('val');
        
        var ot_title = $(data_edit).attr('title');
        var pkno = $(data_edit).data('pk');
        swal.fire({
            
            title: "Are you sure Remove " + ot_title + " ?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
        }).then((result) => {
            if (result.value) {
                _data = $.param({
                    pk: pkno
                }) + '&' + $.param({
                    val: data_val
                }) + '&' + $.param({
                    type: type
                }) + '&' + $.param({
                    method: $("#table_list_data").data('id')
                });

                if (data_val != undefined && data_val != '') {
                    $.post(PATH + "/" + $("#table_list_data").data('module') + "/Action/Update", _data, function(data) {

                        if (data.st == 'success') {
                            datatable_load('');
                            swal.fire("Deleted!", "Your imaginary file has been deleted.", "success");

                        }

                    });
                }

            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
            // })}
        });
    }
</script>


<?= $this->endsection() ?>
