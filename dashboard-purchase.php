<?php
session_start();

include 'inc/connect.php';
require_once("inc/banned_ip_russia.php");

if(isset( $_SESSION['account']['userData']['username'])){
    $username = $_SESSION['account']['userData']['username'];
}else{
        header("location: https://".$_SERVER['SERVER_NAME']."/login.php");  
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
    <section class="dashboard-area dashboard_purchase">
        <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button class="menu-toggler d-md-none">
                            <span class="icon-menu"></span> Dashboard Menu
                        </button>
                        <ul class="dashboard_menu">
                            <li>
                                <a href="dashboard.php"><span class="lnr icon-home"></span>Dashboard</a>
                            </li>
                            <li>
                                <a href="dashboard-setting.php"><span class="lnr icon-settings"></span>Setting</a>
                            </li>
                            <li class="active">
                                <a href="dashboard-purchase.php"><span class="lnr icon-basket"></span>Purchase</a>
                            </li>
                            <li>
                                <a href="dashboard-add-credit.php"><span class="lnr icon-credit-card"></span>Add Credits</a>
                            </li>
                            <li>
                                <a href="dashboard-statement.php"><span class="lnr icon-chart"></span>Statements</a>
                            </li>
                            <li>
                                <a href="uploader.php"><span class="lnr icon-cloud-upload"></span>Upload Items</a>
                            </li>
                            <li>
                                <a href="dashboard-manage-item.php"><span class="lnr icon-note"></span>Manage Items</a>
                            </li>
                            <li>
                                <a href="dashboard-withdrawal.php"><span class="lnr icon-briefcase"></span>Withdrawals</a>
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
                        <div class="filter-bar clearfix filter-bar2">
                            <div class="dashboard__title">
                                <?php 
                                $sql = "SELECT * FROM library WHERE owner='$username'";
                                $resu = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($resu);
                                
                                ?>
                                <h3><?php echo $num; ?> Product Purchased</h3>
                            </div>
                            <div class="filter__items">
                                <div class="filter__option filter--search">
                                    <form action="#">
                                        <input type="text" placeholder="Search products">
                                        <button type="submit"><span class="icon-magnifier"></span></button>
                                    </form>
                                </div>
                                <div class="filter__option filter--select">
                                    <div class="select-wrap">
                                        <select name="price">
                                            <option>All Categories</option>
                                            <option>Wordpress</option>
                                            <option>HTML</option>
                                            <option>PSD</option>
                                        </select>
                                        <span class="lnr icon-arrow-down"></span>
                                    </div>
                                </div>
                            </div><!-- ends: .pull-right -->
                        </div><!-- ends: .filter-bar -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
                <div class="product_archive">
                    <div class="title_area">
                        <div class="row">
                            <div class="col-md-5 col-sm-6">
                                <h5>Product Details</h5>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <h5 class="add_info">Additional Info</h5>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <h5>Price</h5>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <h5>Download</h5>
                            </div>
                        </div>
                    </div><!-- ends: .title_area -->
                    <div class="row">

                        <?Php
                        $users = "SELECT `Product id` FROM library WHERE owner ='" . $_SESSION['account']['userData']['username'] . "'";
                        $resultss = $conn->query($users);


                        if ($resultss->num_rows > 0) {

                            while ($row = $resultss->fetch_assoc()) { {

                                    $where = implode(',', $row);

                                    $fetch_product = "SELECT * FROM products  WHERE id IN ($where)";
                                    $result = $conn->query($fetch_product);
                                    if ($result->num_rows > 0) {

                                        while ($row = $result->fetch_assoc()) {

                         $sql = "SELECT * FROM library WHERE owner='". $_SESSION['account']['userData']['username']."'";
                         $res = mysqli_query($conn, $sql);
                         $rw = mysqli_fetch_array($res);

                        ?>
                                            <div class="single_product clearfix col-md-12">
                                                <div class="row">
                                                    <div class="col-lg-5 col-sm-12">
                                                        <div class="product__description">
                                                            <img src="view-image.php?image_id=<?php echo $row['Main Image']; ?>" alt="Purchase image" width="100" height="80">
                                                            <div class="short_desc">
                                                                <h5>
                                                                    <a href=""><?php echo $row['Product Name']; ?></a>
                                                                </h5>
                                                                <p><?php echo $row['category']; ?></p>
                                                            </div>
                                                        </div>
                                                        <!-- ends: .product__description -->
                                                    </div>
                                                    <!-- ends: .col-md-5 -->
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="product__additional_info">
                                                            <ul>
                                                                <li>
                                                                    <p>
                                                                        <span>Date: <?php echo $row['posted_on']; ?></span>
                                                                    </p>
                                                                </li>
                                                                <li class="license">
                                                                    <p>
                                                                        <span>Licence:</span> 
                                                                    </p>
                                                                </li>
                                                                <li>
                                                                    <p>
                                                                        <span>Author:</span> <?php echo $row['creator']; ?>
                                                                    </p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- ends: .product__additional_info -->
                                                    </div>
                                                    <!-- ends: .col-md-3 -->
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="product__price_download">
                                                            <div class="item_price v_middle">
                                                                <span><?php if(!empty($row['Product Price'])){echo '&euro;'.$row['Product Price'];}else{echo 'FREE';} ?></span>
                                                            </div>
                                                            <div class="item_action v_middle">
                                                                <a href="<?Php if(!empty($row['Main File'])){echo $row['Main File'];}else{echo 'contact-us.php';} ?>" class="btn btn-sm btn-primary" <?php if(!empty($row['Main File'])){echo 'download=""';} ?>>Download Item</a>
                                                                <a href="#" class="btn btn-sm rating--btn not--rated" data-toggle="modal" data-target="#myModal1">
                                                                    <P class="rate_it">Rate Now</P>
                                                                    <div class="rating product--rating">
                                                                        <ul>
                                                                            <li>
                                                                                <span class="fa fa-star-o"></span>
                                                                            </li>
                                                                            <li>
                                                                                <span class="fa fa-star-o"></span>
                                                                            </li>
                                                                            <li>
                                                                                <span class="fa fa-star-o"></span>
                                                                            </li>
                                                                            <li>
                                                                                <span class="fa fa-star-o"></span>
                                                                            </li>
                                                                            <li>
                                                                                <span class="fa fa-star-o"></span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </a><!-- ends: .rating_btn -->
                                                            </div><!-- ends: .item_action -->
                                                        </div><!-- ends: .product__price_download -->
                                                    </div><!-- ends: .col-md-4 -->
                                                </div>
                                            </div><!-- ends: .single_product -->
                        <?php
                                        }
                                    }
                                }
                            }
                        }

                        ?>


                        <!-- Start Pagination -->
                        <div class="col-md-12">
                            <!-- Start Pagination -->
                            <nav class="pagination-default ">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true"><i class="fa fa-long-arrow-left"></i></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">10</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true"><i class="fa fa-long-arrow-right"></i></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav><!-- Ends: .pagination-default -->
                        </div>
                    </div><!-- ends: .row -->
                </div><!-- ends: .product_archive2 -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
    </section><!-- ends: .dashboard-area -->
    <!-- Modal Rating -->
    <div class="modal fade rating_modal" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="rating_modal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="rating_modal">Rating this Item</h3>
                    <h4>Product Enquiry Extension</h4>
                    <p>by
                        <a href="author.php">AazzTech</a>
                    </p>
                </div>
                <!-- end /.modal-header -->
                <div class="modal-body">
                    <form action="#">
                        <ul>
                            <li>
                                <p>Your Rating</p>
                                <div class="right_content btn btn--round btn--white btn--md">
                                    <select name="rating" class="give_rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <p>Rating Causes</p>
                                <div class="right_content">
                                    <div class="select-wrap">
                                        <select name="review_reason" id="rev">
                                            <option value="design">Design Quality</option>
                                            <option value="customization">Customization</option>
                                            <option value="support">Support</option>
                                            <option value="performance">Performance</option>
                                            <option value="documentation">Well Documented</option>
                                        </select>
                                        <span class="icon-arrow-down"></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="rating_field">
                            <label for="rating_field">Comments</label>
                            <textarea name="rating_field" id="rating_field" class="text_field" placeholder="Please enter your rating reason to help the author"></textarea>
                            <p class="notice">Your review will be ​publicly visible​ and the author may reply to your
                                comments. </p>
                        </div>
                        <div class="button-group m-n1">
                            <button type="submit" class="btn btn-md btn-primary m-1">Submit Rating</button>
                            <button class="btn modal_close m-1" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                    <!-- end /.form -->
                </div>
                <!-- end /.modal-body -->
            </div>
        </div>
    </div>
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