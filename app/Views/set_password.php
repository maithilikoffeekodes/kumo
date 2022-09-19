<?= $this->extend(THEME . 'template') ?>
<?= $this->section('content') ?>


<section class="middle">
    <div class="container">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="text-center d-block mb-5">
                <h1>Forgot Password?</h1>
                    <p>Set New Password
                    <p>
                </div>
            </div>
        </div>
        <div class="row align-items-start justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mfliud">

                <form action="<?= url('Home/set_new_pass') ?>" method="post" class="ajax-form-submit">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="email" name="email" value="<?php $session = session();
                                                                    echo $session->has('email') ? session('email') : ''; ?>" class="form-control" id="inputName" placeholder="Enter Email" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="password" name="password" class="form-control" id="txtPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[@,_])(?=.*[A-Z]).{6,}" placeholder="Set New Password">
                        </div>

                        <div class="row" style="justify-content:left;">
                            <div id="para" style="margin-left:20px;color:red;margin-bottom:10px;"></div>
                            <div id="letter" style="color:red;text-align:left;"></div>
                            <div id="upletter" style="color:red;text-align:left;"></div>
                            <div id="no" style="color:red;"></div>
                            <div id="len" style="color:red;"></div>
                        </div>

                        <div class="form_proccessing text-success"></div>
                        <div class="error-msg text-danger"></div>
                        <div class="form-group col-md-12 mt-4">
                            <div class="chk-btn12 mb-0">
                                <button class="btn btn-md full-width bg-dark text-light fs-md ft-medium mb-5" type="submit" id="save_data">Log In</button>
                            </div>
                            <span>New Account? <a href="#">Sign up Now</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endsection() ?>
<?= $this->section('scripts') ?>
<script>
    $('.ajax-form-submit').on('submit', function(e) {
        e.preventDefault();
        var email = $('#inputName').val();
        if (email == '') {
            toastr.error("Please Enter email");
            return false;
        }
        var password = $('#txtPassword').val();
        if (password == '') {
            toastr.error("Please Enter Password");
            return false;
        }
        $('#save_data').prop('disabled', true);
        $('.error-msg').html('');
        $('.form_proccessing').html('Please wait...');
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
                    toastr.success(response.msg)
                    $('#save_data').prop('disabled', false);
                    $('.form_proccessing').html('');
                    window.location.href = "<?php echo base_url('Home/login') ?>";
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