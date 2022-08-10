<?php
session_start();
require_once("inc/banned_ip_russia.php");

if(isset($_POST['btn_submit'])){

}

?>
<!doctype HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TemplateRo - Digital Products Marketplace ">
    <meta name="keywords" content="marketplace, easy digital download, digital product, digital, html5">
    <title>TemplateRo - Digital Products Marketplace</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">
    <!-- inject:css-->
    <link rel="stylesheet" href="assets/vendor_assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/animate.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/select2.min.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/slick.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/trumbowyg.min.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>/assets/img/logo/icon.png">
</head>

<body class="preload">
    <?php require_once("inc/menu.php"); ?>
    <section class="dashboard-area">
        <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button class="menu-toggler d-md-none">
                            <span class="icon-menu"></span> Dashboard Menu
                        </button>
                        <ul class="dashboard_menu">
                            <li>
                                <a href="dashboard.html"><span class="lnr icon-home"></span>Dashboard</a>
                            </li>
                            <li>
                                <a href="dashboard-setting.html"><span class="lnr icon-settings"></span>Setting</a>
                            </li>
                            <li>
                                <a href="dashboard-purchase.html"><span class="lnr icon-basket"></span>Purchase</a>
                            </li>
                            <li>
                                <a href="dashboard-add-credit.html"><span class="lnr icon-credit-card"></span>Add Credits</a>
                            </li>
                            <li>
                                <a href="dashboard-statement.html"><span class="lnr icon-chart"></span>Statements</a>
                            </li>
                            <li>
                                <a href="dashboard-upload.html"><span class="lnr icon-cloud-upload"></span>Upload Items</a>
                            </li>
                            <li class="active">
                                <a href="dashboard-manage-item.html"><span class="lnr icon-note"></span>Manage Items</a>
                            </li>
                            <li>
                                <a href="dashboard-withdrawal.html"><span class="lnr icon-briefcase"></span>Withdrawals</a>
                            </li>
                        </ul><!-- ends: .dashboard_menu -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
        <div class="dashboard_contents section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h3>Edit Your Item</h3>
                                </div>
                            </div>
                        </div>
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <form action="#">
                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3>Item Name & Description</h3>
                                </div><!-- ends: .module_title -->
                                <div class="modules__content">
                                    <div class="form-group">
                                        <label for="category">Select Category</label>
                                        <div class="select-wrap select-wrap2">
                                            <select name="country" id="category" class="text_field">
                                                <option value="">Select one</option>
                                                <option value="wordpress">Wordpress</option>
                                                <option value="html">Html</option>
                                                <option value="graphic">Graphics</option>
                                                <option value="illustration">Illustration</option>
                                                <option value="music">Music</option>
                                                <option value="video">Video</option>
                                            </select>
                                            <span class="lnr icon-arrow-down"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Product Name
                                            <span>(Max 100 characters)</span>
                                        </label>
                                        <input type="text" id="product_name" class="text_field" placeholder="Enter your product name here...">
                                    </div>
                                    <div class="form-group no-margin">
                                        <p class="label">Product Description</p>
                                        <div id="trumbowyg-demo"></div>
                                    </div>
                                </div><!-- ends: .modules__content -->
                            </div><!-- ends: .upload_modules -->
                            <div class="upload_modules module--upload">
                                <div class="modules__title">
                                    <h4>Upload Files</h4>
                                </div><!-- ends: .module_title -->
                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <div class="upload_wrapper">
                                                    <div class="upload-field">
                                                        <div class="custom_upload">
                                                            <label for="thumbnail">
                                                                <input type="file" id="thumbnail" class="files">
                                                                <span class="btn btn-primary btn--md"><i class="icon-cloud-upload"></i>Upload File</span>
                                                            </label>
                                                        </div> <!-- ends: .custom_upload -->
                                                        <p>Upload Thumbnail
                                                            <span>(JPEG or PNG 100x100px)</span>
                                                        </p>
                                                    </div>
                                                </div><!-- ends:.upload_wrapper -->
                                            </div><!-- ends: .form-group -->
                                            <div class="form-group">
                                                <div class="upload_wrapper">
                                                    <div class="upload-field">
                                                        <div class="custom_upload">
                                                            <label for="main_file">
                                                                <input type="file" id="main_file" class="files">
                                                                <span class="btn btn-primary btn--md"><i class="icon-cloud-upload"></i>Upload File</span>
                                                            </label>
                                                        </div> <!-- ends: .custom_upload -->
                                                        <p>Upload Main File
                                                            <span>(ZIP - All files)</span>
                                                        </p>
                                                    </div>
                                                </div><!-- ends:.upload_wrapper -->
                                            </div><!-- ends: .form-group -->
                                            <div class="form-group">
                                                <div class="upload_wrapper">
                                                    <div class="upload-field">
                                                        <div class="custom_upload">
                                                            <label for="screenshot">
                                                                <input type="file" id="screenshot" class="files">
                                                                <span class="btn btn-primary btn--md"><i class="icon-cloud-upload"></i>Upload File</span>
                                                            </label>
                                                        </div> <!-- ends: .custom_upload -->
                                                        <p>Upload Screenshots
                                                            <span>(ZIP file of images)</span>
                                                        </p>
                                                    </div>
                                                </div><!-- ends:.upload_wrapper -->
                                            </div><!-- ends: .form-group -->
                                        </div><!-- ends:.col-md-6 -->
                                        <div class="col-lg-12 col-md-12">
                                            <div class="progress-single">
                                                <div class="progress_wrapper">
                                                    <div class="labels d-flex justify-content-between">
                                                        <p>Thumbnail.jpg</p>
                                                        <span data-width="89">89%</span>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 89%;">
                                                            <span class="sr-only">70% Complete</span>
                                                        </div>
                                                    </div>
                                                </div><!-- ends: .progress_wrapper -->
                                                <div class="upload_cross">
                                                    <span><img src="img/cancel.svg" alt="" class="svg"></span>
                                                </div>
                                            </div><!-- ends: .progress-single -->
                                            <div class="progress-single">
                                                <div class="progress_wrapper">
                                                    <div class="labels d-flex justify-content-between">
                                                        <p>WordPress Blog Theme.zip</p>
                                                        <span data-width="90">90%</span>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                                            <span class="sr-only">90% Complete</span>
                                                        </div>
                                                    </div>
                                                </div><!-- ends: .progress_wrapper -->
                                                <div class="upload_cross">
                                                    <span><img src="img/cancel.svg" alt="" class="svg"></span>
                                                </div>
                                            </div><!-- ends: .progress-single -->
                                            <div class="progress-single">
                                                <div class="progress_wrapper">
                                                    <div class="labels d-flex justify-content-between">
                                                        <p>Thumbnail.jpg</p>
                                                        <span data-width="78">78%</span>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
                                                            <span class="sr-only">78% Complete</span>
                                                        </div>
                                                    </div>
                                                </div><!-- ends: .progress_wrapper -->
                                                <div class="upload_cross">
                                                    <span><img src="img/cancel.svg" alt="" class="svg"></span>
                                                </div>
                                            </div><!-- ends: .progress-single -->
                                        </div><!-- ends: .col-md-6 -->
                                    </div><!-- ends: .row -->
                                </div><!-- ends .module_content -->
                            </div><!-- ends: .upload_modules -->
                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h4>Others Information</h4>
                                </div><!-- ends: .module_title -->
                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="select-multiple">
                                                    <label>Files Included</label>
                                                    <select class="select2_tagged form-control" name="states[]">
                                                        <option value="html">HTML</option>
                                                        <option value="psd">PSD</option>
                                                        <option value="js">JavaScript</option>
                                                        <option value="php">PHP</option>
                                                        <option value="coffee">CoffeeScript</option>
                                                        <option value="video">Video</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- ends:.col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="select-multiple">
                                                    <label>Compatible Browser</label>
                                                    <select class="select2_tagged form-control" name="states[]">
                                                        <option value="html">Mozilla</option>
                                                        <option value="psd">Chrome</option>
                                                        <option value="js">Edge</option>
                                                        <option value="php">Safari</option>
                                                        <option value="coffee">Opera</option>
                                                        <option value="video">IE</option>
                                                    </select>
                                                </div>
                                            </div><!-- ends: .form-group -->
                                        </div><!-- ends:.col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="columns">Columns</label>
                                                <div class="select-wrap select-wrap2">
                                                    <select name="country" id="columns" class="text_field">
                                                        <option value="">Choose Columns</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4+</option>
                                                    </select>
                                                    <span class="lnr icon-arrow-down"></span>
                                                </div>
                                            </div>
                                        </div><!-- ends: .col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dimension">Item Dimensions</label>
                                                <input type="text" id="dimension" class="text_field" placeholder="Ex: 1920x6000.">
                                            </div>
                                        </div><!-- ends: .col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="soft">Minimum Software Version</label>
                                                <div class="select-wrap select-wrap2">
                                                    <select name="version" id="soft" class="text_field">
                                                        <option value="">Choose version</option>
                                                        <option value="4">WordPress 4</option>
                                                        <option value="4.1">WordPress 4.1.*</option>
                                                        <option value="4.2">WordPress 4.2.*</option>
                                                        <option value="4.3">WordPress 4.3.*</option>
                                                        <option value="4.4">WordPress 4.4.*</option>
                                                    </select>
                                                    <span class="lnr icon-arrow-down"></span>
                                                </div>
                                            </div>
                                        </div><!-- ends: .col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="label">High Resolution</p>
                                                <div class="custom_checkbox checkbox-outline">
                                                    <span class="check-confirm" data-text-swap="Yes" data-text-original="No">No</span>
                                                    <label class="toggle-switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div><!-- ends: .custom-checkbox -->
                                            </div>
                                        </div><!-- ends: .col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="label">Responsive Layout</p>
                                                <div class="custom_checkbox checkbox-outline">
                                                    <span class="check-confirm" data-text-swap="Yes" data-text-original="No">No</span>
                                                    <label class="toggle-switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div><!-- ends: .custom-checkbox -->
                                            </div>
                                        </div><!-- ends: .col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="label">Retina Ready</p>
                                                <div class="custom_checkbox checkbox-outline">
                                                    <span class="check-confirm" data-text-swap="Yes" data-text-original="No">No</span>
                                                    <label class="toggle-switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div><!-- ends: .custom-checkbox -->
                                            </div>
                                        </div><!-- ends: .col-md-6 -->
                                        <div class="col-lg-12">
                                            <div class="m-bottom-15">
                                                <label for="tags">Item Tags
                                                    <span>(Max 10 tags)</span>
                                                </label>
                                                <textarea name="tags" id="tags" class="text_field" placeholder="Enter your item tags here..."></textarea>
                                            </div>
                                        </div>
                                    </div><!-- ends: .row -->
                                </div><!-- ends: .upload_modules -->
                            </div><!-- ends: .upload_modules -->
                            <div class="upload_modules pricing--info">
                                <div class="modules__title">
                                    <h4>Price Information</h4>
                                </div><!-- ends: .module_title -->
                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="rlicense">Regular License</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" id="rlicense" class="text_field" placeholder="200">
                                                </div>
                                            </div>
                                        </div><!-- ends: .col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exlicense">Extended License</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" id="exlicense" class="text_field" placeholder="800">
                                                </div>
                                            </div>
                                        </div><!-- ends: .col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cp1">Custom Price #1</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" id="cp1" class="text_field" placeholder="200">
                                                </div>
                                            </div>
                                        </div><!-- ends: .col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cp2">Custom Price #2</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" id="cp2" class="text_field" placeholder="800">
                                                </div>
                                            </div>
                                        </div><!-- ends: .col-md-6 -->
                                    </div><!-- ends: .row -->
                                </div><!-- ends: .modules__content -->
                            </div><!-- ends: .upload_modules -->
                            <div class="btns m-top-40">
                                <input type="submit" name="btn_submit" class="btn btn-lg btn-primary m-right-15" value="Submit Your Item for Review">
                                <button type="submit" class="btn btn-lg btn-danger">Cancel</button>
                            </div>
                        </form>
                    </div><!-- ends: .col-md-8 -->
                    <div class="col-lg-4 col-sm-12">
                        <aside class="sidebar upload_sidebar">
                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Quick Upload Rules</h3>
                                </div>
                                <div class="card_content">
                                    <div class="card_info">
                                        <h4>Image Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut
                                            sceleris que the mattis interdum.</p>
                                    </div>
                                    <div class="card_info">
                                        <h4>File Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut
                                            sceleris que the mattis interdum.</p>
                                    </div>
                                    <div class="card_info">
                                        <h4>Vector Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut
                                            sceleris que the mattis interdum.</p>
                                    </div>
                                </div>
                            </div><!-- ends: .sidebar-card -->
                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Trouble Uploading?</h3>
                                </div>
                                <div class="card_content">
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque
                                        the mattis, leo quam aliquet congue.</p>
                                    <ul>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the</li>
                                    </ul>
                                </div>
                            </div><!-- ends: .sidebar-card -->
                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>More Upload Info</h3>
                                </div>
                                <div class="card_content">
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque
                                        the
                                        mattis, leo quam aliquet congue.</p>
                                    <ul>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the</li>
                                    </ul>
                                </div>
                            </div><!-- ends: .sidebar-card -->
                        </aside><!-- ends: .sidebar -->
                    </div><!-- ends: .col-md-4 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
    </section><!-- ends: .dashboard-area -->
    <?php require_once("inc/footer.php"); ?>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
    <!-- inject:js-->
    <script src="vendor_assets/js/jquery/jquery-1.12.4.min.js"></script>
    <script src="vendor_assets/js/jquery/uikit.min.js"></script>
    <script src="vendor_assets/js/bootstrap/popper.js"></script>
    <script src="vendor_assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="vendor_assets/js/chart.bundle.min.js"></script>
    <script src="vendor_assets/js/grid.min.js"></script>
    <script src="vendor_assets/js/jquery-ui.min.js"></script>
    <script src="vendor_assets/js/jquery.barrating.min.js"></script>
    <script src="vendor_assets/js/jquery.countdown.min.js"></script>
    <script src="vendor_assets/js/jquery.counterup.min.js"></script>
    <script src="vendor_assets/js/jquery.easing1.3.js"></script>
    <script src="vendor_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="vendor_assets/js/owl.carousel.min.js"></script>
    <script src="vendor_assets/js/select2.full.min.js"></script>
    <script src="vendor_assets/js/slick.min.js"></script>
    <script src="vendor_assets/js/tether.min.js"></script>
    <script src="vendor_assets/js/trumbowyg.min.js"></script>
    <script src="vendor_assets/js/venobox.min.js"></script>
    <script src="vendor_assets/js/waypoints.min.js"></script>
    <script src="theme_assets/js/dashboard.js"></script>
    <script src="theme_assets/js/main.js"></script>
    <script src="theme_assets/js/map.js"></script>
    <!-- endinject-->
</body>

</html>