<?= $this->extend(THEME . 'form') ?>

<?= $this->section('content') ?>
<?php //echo"<pre>";print_r($coupon);exit;?>
<div class="row">
    <div class="col-lg-12">
        <form action="<?= url('admin/Home/createCoupon') ?>" class="ajax-form-submit" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-label">Coupon Code: <span class="tx-danger">*</span></label>
                <input class="form-control" name="coupon" placeholder="Enter Coupon code" required type="text" value="<?= @$coupon['coupon_code']?>" required>
                <input value="<?= @$coupon['id'] ?>" name="id" type="hidden">
            </div>
            <div class="form-group">
                <label class="form-label">Coupon Value: <span class="tx-danger">*</span></label>
                <input class="form-control" name="coupon_value" placeholder="Enter Coupon Value" required type="text" value="<?= @$coupon['coupon_value']?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Coupon Type: <span class="tx-danger">*</span></label>
                <select name="coupon_type" id="type" class=" select2 form-control" required>
                <option <?= (@$coupon[0]['coupon_type'] === '' ? 'selected' : '') ?> value="">None</option>
                <option <?= (@$coupon[0]['coupon_type'] === 'Rupees' ? 'selected' : '') ?> value="Rupees">Rupees</option>
                <option <?= (@$coupon[0]['coupon_type'] === 'Percentage' ? 'selected' : '') ?> value="Percentage">Percentage</option>
            </select>
            </div>
            <div class="form-group">
                <label class="form-label">Cart Min Price: <span class="tx-danger">*</span></label>
                <input class="form-control" name="min_price" placeholder="Enter Cart Min Price" required type="text" value="<?= @$coupon['cart_min_value']?>" required>
            </div>
            <div class="form-group">
                <div class="tx-danger error-msg"></div>
                <div class="tx-success form_proccessing"></div>
            </div>
            <div class="row pt-3">
                <div class="col-sm-6">
                    <p class="text-left">
                        <button class="btn btn-space btn-primary" id="save_data" type="submit">Submit</button>
                        <button class="btn btn-space btn-secondary" data-dismiss="modal">Cancel</button>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $('.ajax-form-submit').on('submit', function(e) {

        $('#save_data').prop('disabled', true);
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
                if (response.st == 'error') {
                    $('.error-msg').html(response.msg);
                    $('#save_data').prop('disabled', false);
                }
                if (response.st == 'success') {
                    swal("success!", response.msg, "success");
                    window.location.href = "<?= url('admin/Home/coupon') ?>";
                    $('#save_data').prop('disabled', false);
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
    $('#fm_model').on('shown.bs.modal', function() {
        $('.fc-datepicker').datepicker({
            format: "dd/mm/yyyy",
            startDate: "01-01-2015",
            endDate: "01-01-2020",
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
            container: '#fm_model modal-body'
        });
    });

    $('.select2').select2({
        placeholder: 'Choose one',
        width: '100%'
    });
</script>
<?= $this->endSection() ?>