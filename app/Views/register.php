<?= $this->extend(THEME . 'template') ?>

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
<!-- Page -->
<div class="page main-signin-wrapper">

    <!-- Row -->
    <section class="middle">
        <div class="container">
            <div class="row align-items-start justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mfliud">
                    <form action="<?= url('Home/register') ?>" class="border p-3 rounded ajax-form-submit" method="post">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>First Name<span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" placeholder="Enter First Name" name="fname" id="inputName" value="<?= @$data['first_name']; ?>" required>
                                <input type="hidden" value="<?= @$data['id']; ?>" name="id" id="id">

                            </div>
                            <div class="form-group col-md-6">
                                <label>Last Name<span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" placeholder="Enter Last Name" name="lname" id="inputName" value="<?= @$data['last_name']; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Email <span class="text-danger"> * </span></label>
                                <input type="email" class="form-control" placeholder="Enter Email" name="email" id="inputName" value="<?= @$data['email']; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>MobileNo <span class="text-danger"> * </span></label>
                                <input type="number" class="form-control" placeholder="Enter MolbileNo" name="mobileno" id="inputName" value="<?= @$data['mobileno']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address <span class="text-danger"> * </span></label>
                            <textarea class="form-control" name="address" id="" cols="30" rows="10" id="inputName" placeholder="Enter Address"><?= @$data['address']; ?></textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>States<span class="text-danger">*</span></label>
                                <select name="state" id="state" class="form-control" required>
                                    <?php if (isset($data['state'])) { ?>
                                        <option value="<?= @$data['state'] ?>" selected><?= @$data['state_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>City<span class="text-danger">*</span></label>
                                <select name="city" id="city" class="form-control" required>
                                    <?php if (isset($data['city'])) { ?>
                                        <option value="<?= @$data['city'] ?>" selected><?= @$data['city_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Pincode<span class="text-danger"> * </span></label>
                                <input class="form-control" placeholder="Enter your pincode" type="text" id="inputName" name="pincode" value="<?= @$data['pincode']; ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group  col-md-6">
                                <label>Password <span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Enter Password" id="txtPassword" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[@,_])(?=.*[A-Z]).{6,}" value="<?= @$data['password']; ?>" required>
                                    <div class="input-group-addon">
                                        <a type="button" id="btnToggle" class="toggle">
                                            <i id="eyeIcon" class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Confirm Password <span class="text-danger"> * </span></label>
                                <input type="password" class="form-control" placeholder="Enter Confirm Password" id="txtPassword" name="confirm-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[@,_])(?=.*[A-Z]).{6,}" value="<?= @$data['password']; ?>" required>
                            </div>
                        </div>
                        <div class="row" style="justify-content:left;">
                            <div id="para" style="margin-left:20px;color:red;margin-bottom:10px;"></div>
                            <div id="letter" style="color:red;text-align:left;"></div>
                            <div id="upletter" style="color:red;text-align:left;"></div>
                            <div id="no" style="color:red;"></div>
                            <div id="len" style="color:red;"></div>
                        </div>
                        <div class="error-msg"></div>
                        <div class="form_proccessing"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md full-width bg-dark text-light fs-md ft-medium">Create An Account</button>
                        </div>
                        <div class="mt-3 text-center text">
                            <p class="mb-0">Already have an account? <a href="<?= url('Home/login') ?>">Sign In</a></p>
                        </div>
                        <div class="form-group">
                            <p>By registering your details, you agree with our Terms & Conditions, and Privacy and Cookie Policy.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- End Row -->


<!-- End Page -->
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
    let passwordInput = document.getElementById("txtPassword"),

        toggle = document.getElementById("btnToggle"),
        icon = document.getElementById("eyeIcon");

    function togglePassword() {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.add("fa-eye-slash");
            //toggle.innerHTML = 'hide';
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye-slash");
            //toggle.innerHTML = 'show';
        }
    }

    function checkInput() {

    }

    toggle.addEventListener("click", togglePassword, false);
    passwordInput.addEventListener("keyup", checkInput, false);
</script>
<script>
    $(document).ready(function() {
        $("#state").select2({
            width: '100%',
            placeholder: 'Select...',
            ajax: {
                url: PATH + "/Home/Getdata/getstate",
                type: "post",
                allowClear: true,
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    console.log(params);
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    console.log(response);
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#city").select2({
            width: '100%',
            placeholder: 'Select...',
            ajax: {
                url: PATH + "/Home/Getdata/getcity",
                type: "post",
                allowClear: true,
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                        state_id: $('select[name="state"]').val(),
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
        $('.error-msg').html('');
        $('.form_proccessing').html('Please wait...');
        e.preventDefault();
        var aurl = $(this).attr('action');
        var form = $(this);
        var formdata = false;
        $('#save_data').prop('disabled', true);
        if (window.FormData) {
            //  alert("form");return;
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
                // console.log(response);
                //  alert(response);return;
                if (response.st == 'success') {
                    swal("Success!", response.msg, "success");
                    window.location.href = "<?= url('Home/login') ?>";
                    datatable_load('');
                    //  alert("succes");return;
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

    var myInput = document.getElementById("txtPassword");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    myInput.onblur = function() {
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
            $("#letter").hide();

        } else {
            $("#letter").html("Lowercase", " ");
            $("#letter").show();
        }

        var symbol = /[@,_,.]/g;
        if (myInput.value.match(symbol)) {
            $("#letter").hide();

        } else {
            $("#letter").html("&nbsp;Symbol", " ");
            $("#letter").show();
        }

        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            $("#upletter").hide();
        } else {
            $("#upletter").html("&nbsp;Uppercase");
            $("#upletter").show();
        }

        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            $("#no").hide();
        } else {
            $("#no").html("&nbsp;Number");
            $("#no").show();
        }

        if (myInput.value.length >= 6) {
            $("#len").hide();
        } else {
            $("#len").html("&nbsp;Minimum 6 characters");
            $("#len").show();
        }
    }
</script>
<?= $this->endSection() ?>