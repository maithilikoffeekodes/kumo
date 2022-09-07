<?php

if (!session('id')) {
    header("Location: " . url('admin/Auth/login') . "");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Dashlead -  Admin Panel HTML Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="sales dashboard, admin dashboard, bootstrap 4 admin template, html admin template, admin panel design, admin panel design, bootstrap 4 dashboard, admin panel template, html dashboard template, bootstrap admin panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template">

    <!-- Favicon -->
    <link rel="icon" href="<?= ASSETS; ?>img/brand/favicon.ico" type="image/x-icon" />

    <!-- Title -->
    <title>Dashlead - Admin Panel HTML Dashboard Template</title>

    <!---Fontawesome css-->
    <link href="<?= ASSETS; ?>plugins/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!---Ionicons css-->
    <link href="<?= ASSETS; ?>plugins/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!---Typicons css-->
    <link href="<?= ASSETS; ?>plugins/typicons.font/typicons.css" rel="stylesheet">

    <!---Feather css-->
    <link href="<?= ASSETS; ?>plugins/feather/feather.css" rel="stylesheet">

    <!---Falg-icons css-->
    <link href="<?= ASSETS; ?>plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

    <!---Style css-->
    <link href="<?= ASSETS; ?>css/style.css" rel="stylesheet">
    <link href="<?= ASSETS; ?>css/custom-style.css" rel="stylesheet">
    <link href="<?= ASSETS; ?>css/skins.css" rel="stylesheet">
    <link href="<?= ASSETS; ?>css/dark-style.css" rel="stylesheet">
    <link href="<?= ASSETS; ?>css/custom-dark-style.css" rel="stylesheet">

    <!---Select2 css-->
    <link href="<?= ASSETS; ?>plugins/select2/css/select2.min.css" rel="stylesheet">

    <!--Mutipleselect css-->
    <link rel="stylesheet" href="<?= ASSETS; ?>plugins/multipleselect/multiple-select.css">

    <!---Sidebar css-->
    <link href="<?= ASSETS; ?>plugins/sidebar/sidebar.css" rel="stylesheet">

    <!---Jquery.mCustomScrollbar css-->
    <link href="<?= ASSETS; ?>plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet">

    <!---Sidemenu css-->
    <link href="<?= ASSETS; ?>plugins/sidemenu/sidemenu.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>plugins/sweet-alert/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>plugins/datatable/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>plugins/datatable/responsivebootstrap4.min.css" />
	<link rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css" />
	<link rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>plugins/datatable/fileexport/buttons.bootstrap4.min.css" />
	<link href="<?= ASSETS; ?>plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css" />
	<link href="<?= ASSETS; ?>plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>plugins/summernote/summernote-lite.css">

</head>

<body>

    <!-- Loader -->
    <!-- <div id="global-loader">
        <img src="<? //= ASSETS; 
                    ?>img/loader.svg" class="loader-img" alt="Loader">
    </div> -->
    <!-- End Loader -->

    <!-- Page -->
    <div class="page">

        <!-- Sidemenu -->
        <?= $this->include(THEME . 'block/sidemenu') ?>
        <!-- End Sidemenu -->

        <!-- Main Content-->
        <div class="main-content side-content pt-0">

            <!-- Main Header-->
            <?= $this->include(THEME . 'block/header') ?>
            <!-- End Main Header-->

            <div class="container-fluid">

                <!-- Page Header -->


                <!-- End Page Header -->

                <!--Navbar-->
                <?= $this->include(THEME . 'block/navbar') ?>

                <!--End Navbar -->

                <!-- Row -->
                <?= $this->renderSection('content') ?>
                <!-- End Row -->

            </div>
            <div class="modal fade colored-header colored-header-primary" id="fm_model" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-colored">
                            <h3 class="modal-title "><span class="model_title"></span></h3>
                            <button class="close md-close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"> </span></button>
                        </div>
                        <div class="modal-body">

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Content-->

        <!-- Sidebar -->
        <?= $this->include(THEME . 'block/sidebar') ?>
        <!-- End Sidebar -->

        <!-- Main Footer-->
        <?= $this->include(THEME . 'block/footer') ?>
        <!--End Footer-->

    </div>
    <!-- End Page -->

    <!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <?= $this->include(THEME . 'block/scripts') ?>
    <?= $this->renderSection('scripts') ?>

    <script>
        $('body').on('click', '[data-toggle="modal"]', function() {
            $($(this).data("target") + ' .modal-body').load($(this).attr("href"), function() {
                // afterload();
            });

            $('.model_title').text($(this).data("title"));

        });
    </script>
</body>

</html>