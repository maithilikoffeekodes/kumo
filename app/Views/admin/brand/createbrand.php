<?= $this->extend(THEME . 'form') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <form action="<?= url('admin/Home/createbrand') ?>" class="ajax-form-submit" method="post" enctype="multipart/form-data">


            <div class="form-group">
                <label class="form-label">Brand: <span class="tx-danger">*</span></label>
                <input class="form-control" name="brand" placeholder="Enter Name" required type="text" value="<?= @$brand['brand']; ?>">
                <input value="<?= @$brand['id'] ?>" name="id" type="hidden">
            </div>

            <div class="form-group">
                <label class="form-label">Image : <span class="tx-danger">*</span></label>
                <input type="file" class="dropify" data-height="200" name="image" data-height="100" data-default-file="<?= (!empty(@$brand)) ? @$brand['image'] : '' ?>">
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
                    window.location.href = "<?= url('admin/Home/brand') ?>";
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

    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong appended.'
        },
        error: {
            'fileSize': 'The file size is too big (2M max).'
        }
    });
</script>
<?= $this->endSection() ?>