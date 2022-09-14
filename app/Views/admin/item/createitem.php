<?= $this->extend(THEME . 'form') ?>

<?= $this->section('content') ?>
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<form action="<?= url('admin/Home/createitem') ?>" class="ajax-form-submit" method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Brand Name<span class="tx-danger">*</span></label>
                <select name="brand" id="brand" class="form-control" required>
                    <?php if (isset($item['brand'])) { ?>
                        <option value="<?= @$item['brand'] ?>" selected><?= @$item['brand_name'] ?></option>
                    <?php } ?>
                </select>
                <input type="hidden" id="id" name="id" value="<?= @$item['id']; ?>">
            </div>
            <div class="form-group">
                <label>Category Name<span class="tx-danger">*</span></label>
                <select name="category" id="category" class="form-control" required>
                    <?php if (isset($item['category'])) { ?>
                        <option value="<?= @$item['category'] ?>" selected><?= @$item['category_name'] ?></option>
                    <?php } ?>
                </select>

            </div>
            <div class="form-group">
                <label>Item Name<span class="tx-danger">*</span></label>
                <input type="text" name="item" class="form-control" value="<?= @$item['name']; ?>" placeholder="Enter Item Name" required>
                <input value="<?= @$item['id'] ?>" name="id" type="hidden">
            </div>

            <div class="form-group">
                <label>Image<span class="tx-danger">*</span></label>
                <input type="file" class="dropify" data-height="200" name="image" data-height="100" data-default-file="<?= (!empty(@$item)) ? @$item['image'] : ''; ?>">
            </div>
            <div class="col-lg-12 form-group">
                <label class="form-label">Galary Pic</label>
                <div id="dzupload_galary_image" class="dropzone text-center">
                </div>
                <div class="product_galary_input"></div>
            </div>

            <input type="hidden" id="last_array" value="0">
            <div class="form-group">
                <label>Description<span class="tx-danger">*</span></label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control" value="" placeholder="Enter description"><?= @$item['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Additional Information :</label>
                <textarea class="form-control" id="summernote1" name="additional_information" value="" placeholder="Enter additional information"><?= @$item['additional_information'] ? $item['additional_information'] : '' ?></textarea>
            </div>

            <div class="form-group">
                <label>MRP Price<span class="tx-danger">*</span></label>
                <input type="number" name="mrpprice" id="mrpprice" class="form-control" value="<?= @$item['price']; ?>" maxlength="7" placeholder="Enter MRP Price" required>
            </div>
            <div class="form-group">
                <label class="form-label"> Listed Price :<span class="tx-danger">*</span></label>
                <div class="text-danger form_proccessing1"></div>
                <input class="form-control" onblur="countdiscount()" id="listed_price" name="price" value="<?= @$item['listedprice'] ?>" maxlength="7" placeholder="Enter Listed Price" required="" type="number">
            </div>

            <div class="form-group">
                <label class="form-label">Discount :</span></label>
                <input class="form-control" onkeyup="count_discount()" id="discount" name="discount" value="<?= @$item['discount'] ?>" maxlength="3" placeholder="Enter Discount in %" type="number">
            </div>
            <div class="form-group">
                <label class="form-label">Igst<span class="tx-danger">*</span></label>
                <input class="form-control"  type="number" maxlength="2" name="igst" value="<?= @$item['igst'] ?>" placeholder="Enter GST in %" required>
            </div>
            <div class="form-group">
                <label class="form-label">Cgst<span class="tx-danger">*</span></label>
                <input class="form-control"  type="number" name="cgst" maxlength="1" value="<?= @$item['cgst'] ?>" placeholder=" %" required>
            </div>
            <div class="form-group">
                <label class="form-label">Sgst<span class="tx-danger">*</span></label>
                <input class="form-control"  type="number" name="sgst" maxlength="1" value="<?= @$item['sgst'] ?>" placeholder=" %" required>
            </div>
            <div class="form-group">
                <label class="form-label">Stock<span class="tx-danger">*</span></label>
                <input type="text" name="stock" class="form-control" value="<?= @$item['stock']; ?>" placeholder="Enter stock" required>
            </div>
        </div>
    </div>
    </div>
    <div class="form_proccessing text-success"></div>
    <div class="error-msg text-danger"></div>
    <div class="col-md-12">
        <p class="text-right">
            <button class="btn btn-space btn-primary" id="save_data" type="submit">Submit</button>
        </p>
    </div>
</form>

<script>
    Dropzone.autoDiscover = false;
    var filegalary = <?= ((@$item['gallery']) ? @$item['gallery'] : 'new Array') ?>;
    console.log(filegalary);

    var dz2 = $("#dzupload_galary_image").dropzone({
        sendingmultiple: function(file, xhr, formData) {
            // $('form_proccessing').html("<i class='far fa-spinner fa-spin'></i> Please wait...");
            // $('#save_data').prop('disabled', true);
            // $('.loader_fs').show();
            var last_array = $('#last_array').val();
            formData.append('last_array', last_array);
            formData.append('user', <?= session('id') ?>);
            formData.append('type', 'galary');
            formData.append('store_path', $('#store_path').val());
            last_array = parseInt(last_array) + 1;
            $('#last_array').val(last_array);
        },
        renameFilename: function(filename) {
            return new Date().filename;
        },
        // params:{as:'inputbox'+inputbox},
        // paramName : inputbox,
        uploadMultiple: true,
        maxFilesize: 500,
        maxFiles: 100,
        headers: {
            'Cache-Control': null,
            'X-Requested-With': null,
        },
        parallelUploads: 100,
        /*removedfile: function(file) {
            for(f=0;f<fileList.length;f++){
                if(fileList[f].fileName == file.name)
                {
                    $('.product_input input[data-val="'+file.name+'"]').remove();
                    var _ref;
                    return (ref = file.previewElement) != null ? ref.parentNode.removeChild(file.previewElement) : void 0;
                }
                
            }
        },*/
        acceptedFiles: ".jpg,.jpeg,.png",
        paramName: "file",
        url: PATH + "/admin/Home/ImageUpload",
        addRemoveLinks: true,
        dictDefaultMessage: '<i class="far fa-image" aria-hidden="true" style="font-size: 80px;"></i>',
        successmultiple: function(file, response) {

            $('#save_data').html("Submit");
            $('#save_data').prop('disabled', false);
            // $('.loader_fs').hide();   
            var json = response;
            if (json.status == '1') {
                i = 0;
                $.each(json.iid, function(key, value) {

                    filegalary[i] = {
                        "iid": value,
                        "filename": json.name[key],
                        "fileId": i
                    };
                    $('.product_galary_input').append(json.input[key]);
                    i++;

                });


                filegalary = $.grep(filegalary, function(n) {
                    return (n);
                });

                $(file).each(function() {

                    if ((this).status == 'success') {
                        (this).previewElement.classList.add("dz-success");
                    }
                });
                $('.error_images').hide();
            } else {
                $('#save_data').prop('disabled', true);
                toastr.error(json.error);
            }
        },
        init: function() {

            /*this.on("thumbnail", function(file) {
             // Do the dimension checks you want to do
             if (file.width < 399 || file.height < 399) {
             file.rejectDimensions()
             }
             else {
             file.acceptDimensions();
             }
             });*/

            this.on("removedfile", function(file) {
                // console.log(filegalary[f].iid);
                for (f = 0; f < filegalary.length; f++) {
                    if (filegalary[f].filename == file.name) {
                        var remove = f;
                        console.log(filegalary[f].iid);
                        console.log(file.name);

                        $('.product_galary_input input[data-val="' + filegalary[f].iid +
                            '"]').remove();
                        // var _ref;
                        // return (ref = file.previewElement) != null ? ref.parentNode.removeChild(file.previewElement) : void 0;

                    }
                }
            });

            this.on('addedfile', function(file) {
                var preview = document.getElementsByClassName('dz-filename');
                preview = preview[preview.length - 1];
                preview.removeChild(preview.childNodes[0]);

                var imageName = document.createElement('span');
                imageName.innerHTML = file.name;

                preview.insertBefore(imageName, preview.firstChild);
                if (this.files.length > 100) {
                    this.removeFile(this.files[0]);
                }
            });
            var j = $('#last_array').val();
            console.log("j" + j);

            thisDropzone = this;
            $.each(filegalary, function(key, value) {
                var mockFile = {
                    name: value.file_name,
                    size: value.file_size,
                    type: value.file_type
                };

                thisDropzone.options.addedfile.call(thisDropzone, mockFile);

                thisDropzone.options.thumbnail.call(thisDropzone, mockFile, value.h_path +
                    value.t_path + value.image_name);
                mockFile.previewElement.classList.add('dz-success');
                mockFile.previewElement.classList.add('dz-complete');
                //var j= $('#last_array').val();
                new_input = "<input type='hidden' class='p_images' data-val='" + value.iid +
                    "'  name='p_images[" + j + "]' value='" + value.iid + "'>";
                //var c = j - 1;
                filegalary[j] = {
                    "iid": value.iid,
                    "filename": value.file_name,
                    "fileId": j
                };
                $('.product_galary_input').append(new_input);

                j++;

                $('#last_array').val(j);
                filegalary = $.grep(filegalary, function(n) {
                    return (n);
                });

            });
        },
        /*accept: function(file, done) {
         file.acceptDimensions = done;
         file.rejectDimensions = function() { 
         done(); 
         toastr.error("Please
         upload upto 400px image resolution");	
         };
         },*/
    });

    $(document).ready(function() {
        $("#brand").select2({
            width: '100%',
            placeholder: 'Search...',
            ajax: {
                url: PATH + "/admin/Home/Getdata/getbrand",
                type: "post",
                allowClear: true,
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });

        $("#category").select2({
            width: '100%',
            placeholder: 'Select...',
            ajax: {
                url: PATH + "/admin/Home/Getdata/getcategory",
                type: "post",
                allowClear: true,
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    });

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
                if (response.st == 'success') {
                    $('#fm_model').modal('toggle');
                    swal("success!", response.msg, "success");
                    datatable_load('');
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

    // function afterload() {
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

    function count_discount() {

        var mrp = $('#mrpprice').val();
        var discount = $('#discount').val();
        var discountprice = (mrp * discount) / 100;
        var listedprice = mrp - discountprice;
        $('#listed_price').val(listedprice);

    }

    function countdiscount() {

        var mrp = $('#mrpprice').val();
        var listedprice = $('#listed_price').val();

        if (listedprice > mrp) {
            // toastr.error("Enter Valid Price");
            $('.form_proccessing1').html('Enter valid Listed Price...');
            return false;
        } else {
            var discount_price = (listedprice * 100) / mrp;
            var discount = 100 - discount_price;
            $('#discount').val(discount);
        }

    }
    $(document).on('keyup', 'input[name="igst"]', function() {
        var igst = $('input[name="igst"]').val();
        $('input[name="cgst"],input[name="sgst"]').val(igst / 2);
    });

    $('#summernote1').summernote({

        placeholder: 'Enter Additional Information',
        tabsize: 3,
        height: 100,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });
</script>
<?= $this->endSection() ?>