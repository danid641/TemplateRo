<?php
require_once("inc/connect.php");
require 'autoload.php';
session_start();

class profileController extends users
{

    public function __construct()
    {

        global $product;
        global $username;

        $this->GetName();
        $this->checkLogged();
        $this->banned_ip_russian(true);
        $product = new product;
        $username = $this->username;
    }
}

$profileController = new profileController;

if (isset($_SESSION['account']['userData']['username'])) {
    $username = $_SESSION['account']['userData']['username'];
}

if (!isset($_SESSION['account']['userData']['username']) && !isset($_GET['creator'])) {
    header("location: https://" . $_SERVER['SERVER_NAME'] . "/signup");
}

// if is isset get creator then show info creator
if (isset($_GET['creator'])) {
    $us = $_GET['creator'];

    $testMode = false;

    if (!empty($_SESSION['account']['userData']['username']) && $_SESSION['account']['userData']['username'] == $_GET['creator']) {
        header("location: https://" . $_SERVER['SERVER_NAME'] . "/author");
    }
} else {
    $us = $_SESSION['account']['userData']['username'];
    $testMode = true;
}

$sql_verify_exist_user = "SELECT * FROM users WHERE username='$us'";
$result_verify_exist_user = mysqli_query($conn, $sql_verify_exist_user);
$verify_exist = mysqli_num_rows($result_verify_exist_user);

if ($verify_exist == 0) {
    header("location: index.php");
}

$testMode = false;
//check if that user exists and if you are logged in to an existing account and also check if the user who followed you is not you
if (isset($_GET['follow'])) {
    $id = $_GET['follow'];

    $sql = "SELECT * FROM users WHERE id='$id'";
    $qe = mysqli_query($conn, $sql);
    $f = mysqli_fetch_array($qe);

    if (isset($_SESSION['account']['userData']['username'])) {

        if ($_SESSION['account']['userData']['username'] != $f['username']) {
            $sql1 = "INSERT INTO folllow (followers, username) VALUE ('" . $f['username'] . "', '$username')";
            $que = mysqli_query($conn, $sql1);
            header("location: https://" . $_SERVER['SERVER_NAME'] . "/author?creator=$us");
        } else {
            header("location: https://" . $_SERVER['SERVER_NAME'] . "/author");
        }
    } else {
        header("location: https://" . $_SERVER['SERVER_NAME'] . "/login");
    }
}
//
$sql21 = "SELECT * FROM users WHERE username='$us'";
$results1 = mysqli_query($conn, $sql21);
$rowsq = mysqli_fetch_array($results1);
//

//
if (isset($_POST['following'])) {
    if (isset($_SESSION['account']['userData']['username'])) {
    } else {
        header("location: https://" . $_SERVER['SERVER_NAME'] . "/login?error=pleasesign");
    }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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
    </section><!-- ends: .breadcrumb-area -->
    <section class="author-profile-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="author-profile">
                        <div class="row">
                            <div class="col-lg-5 col-md-7">
                                <div class="author-desc">
                                    <?php if (!empty($rowsq['avatar'])) {
                                    ?>
                                        <img src="view-image.php?image_id=<?php echo $rowsq['avatar']; ?>" alt="user avatar" class="rounded-circle" width="120" height="120">
                                    <?php
                                    } else {
                                    ?>

                                        <div class="rounded-circle d"><?php echo $_SESSION['account']['userData']['username'][0]; ?></div>
                                    <?php
                                    } ?>
                                    <div class="infos">
                                        <h4><?php echo $rowsq['username']; ?></h4>
                                        <span><?php echo $rowsq['member']; ?></span>
                                        <ul>
                                            <?php if (isset($_SESSION['account']['userData']['username']) && !empty($_SESSION['account']['userData']['username']) && $_SESSION['account']['userData']['username'] !=  $us) { ?>
                                                <li>
                                                    <a href="?follow=<?php echo $rowsq['id']; ?>" class="btn btn-primary btn--xs">Follow</a>
                                                </li>
                                                <li>
                                                <?php
                                            }

                                            if (!isset($_SESSION['account']['userData']['username'])) {
                                                echo '<a style="margin-right: 10px;" href="signup" class="btn btn-primary btn--xs">Follow</a>';
                                            }
                                                ?>
                                                <?php
                                                if (!empty($rowsq['email'])) {
                                                ?>
                                                    <a style="margin-right: 10px;" id="btnedit" href="mailto:<?php echo $rowsq['email']; ?>" class="btn btn-danger btn--xs" data-toggle="modal" data-target="#author-contact">
                                                        <span id="mail" class="icon-envelope-open"></span>
                                                        <i style="display: none;" id="edit" class="bi bi-pencil-square"></i>
                                                    </a>
                                                <?php
                                                }                                      ?>
                                                </li>
                                                <li>
                                                    <?php
                                                    if (!empty($rowsq['website'])) {
                                                    ?>
                                                        <a id="btnEditWebsite" <?php if ($testMode == true) {
                                                                                } else {
                                                                                    echo 'href="' . $rowsq['website'] . '"';
                                                                                } ?> class="btn btn-secondary btn--xs">
                                                            <span id="website" class="icon-globe"></span>
                                                            <i data-target="#ModalWebsite" data-toggle="modal" style="display: none;" id="editWebsite" class="bi bi-pencil-square"></i>

                                                        </a>
                                                    <?php
                                                    }                                      ?>
                                                </li>
                                        </ul>
                                    </div>
                                </div><!-- ends: .author-desc -->
                            </div><!-- ends: .col-lg-5 -->
                            <div class="modal fade rating_modal" id="ModalWebsite" tabindex="-1" role="dialog" aria-labelledby="rating_modal">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h3 class="modal-title" id="rating_modal">Rating this Item</h3>
                                            <h4>Product Enquiry Extension</h4>
                                            <p>by
                                                <a href="author?">AazzTech</a>
                                            </p>
                                        </div>
                                        <!-- end /.modal-header -->
                                        <div class="modal-body">
                                            <form action="#">
                                                <div class="rating_field">
                                                    <label for="rating_field">Comments</label>
                                                    <input type="text" name="editwebsite">
                                                    <p class="notice"></p>
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
                            <div class="col-lg-4 order-lg-1 col-md-12 order-md-2">
                                <div class="author-social social social--color--filled">
                                    <ul>
                                        <li>
                                            <?php
                                            if (!empty($rowsq['fackebook'])) {
                                            ?>
                                                <a id="editBtnFackebook" href="<?php echo $rowsq['fackebook']; ?>">
                                                    <span id="fackebook" class="fa fa-facebook"></span> Facebook
                                                    <i style="display: none;" id="editFackebook" class="bi bi-pencil-square"></i>

                                                </a>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            if (!empty($rowsq['twitter'])) {
                                            ?>
                                                <a href="<?php echo $rowsq['twitter']; ?>">
                                                    <span class="fa fa-twitter"></span> Twitter
                                                </a>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            if (!empty($rowsq['dribbble'])) {
                                            ?>
                                                <a href="<?php echo $rowsq['dribbble']; ?>">
                                                    <span class="fa fa-dribbble"></span> Dribble
                                                </a>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </div><!-- ends: .author-social -->
                                <div class="col-lg-3 order-lg-2 col-md-5 order-md-1">
                                    <div class="author-stats">

                                    </div><!-- ends: .author-stats -->
                                </div><!-- ends: .col-lg-4 -->
                            </div><!-- ends: .col-lg-3 -->
                            <div class="col-lg-3 order-lg-2 col-md-5 order-md-1">
                                <div class="author-stats">
                                    <ul>
                                        <li class="t_items">
                                            <?php
                                            $all_products = "SELECT * FROM products WHERE creator='$us'";
                                            $product_query = mysqli_query($conn, $all_products);
                                            $product_rows = mysqli_num_rows($product_query);                                            ?>
                                            <span><?php echo $product_rows ?></span>
                                            <p>Total Items</p>
                                        </li>
                                        <?php
                                        $sale_sql = "SELECT * FROM library WHERE creator='$us'";
                                        $sale_query = mysqli_query($conn, $sale_sql);
                                        $sale = mysqli_num_rows($sale_query);
                                        ?>
                                        <li class="t_sells">
                                            <span><?php echo $sale; ?></span>
                                            <p>Total Sales</p>
                                        </li>
                                        <li class="t_reviews">
                                            <div>
                                                <span class="ratings">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                                <span class="avg_r">5.0</span>
                                                <span>(226 reviews)</span>
                                            </div>
                                            <p>Author Ratings</p>
                                        </li>
                                    </ul>
                                </div><!-- ends: .author-stats -->
                            </div><!-- ends: .col-lg-4 -->
                        </div>
                    </div>
                </div><!-- ends: .col-lg-12 -->
                <div class="col-md-12 author-info-tabs">
                    <ul class="nav nav-tabs" id="author-tab" role="tablist">
                        <li>
                            <a class="active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                        </li>
                        <li>
                            <a id="items-tab" data-toggle="tab" href="#items" role="tab" aria-controls="items" aria-selected="false">Author Items</a>
                        </li>
                        <li>
                            <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                        </li>
                        <li>
                            <a id="followers-tab" data-toggle="tab" href="#followers" role="tab" aria-controls="followers" aria-selected="false">Followers</a>
                        </li>
                        <li>
                            <a id="following-tab" data-toggle="tab" href="#following" role="tab" aria-controls="following" aria-selected="false">Following</a>
                        </li>
                    </ul><!-- Ends: .nav-tabs -->
                    <div class="tab-content" id="author-tab-content">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="author_module about_author"><?Php echo $rowsq['description']; ?>
                            </div>
                            <div class="author_featured_items">
                                <h3>Author
                                    <span>Featured Items</span>
                                </h3>
                                <div class="row">
                                    <?php
                                    $product->GetProduct("products", "creator='$us' AND `Product Price` >= 1 AND status='active' LIMIT 3")
                                    ?>
                                </div>
                            </div><!-- ends: .author_featured_items -->
                        </div><!-- Ends: .profile-tab -->
                        <div class="tab-pane fade" id="items" role="tabpanel" aria-labelledby="items-tab">
                            <h3>All Items By
                                <span><?php echo $us; ?></span>
                            </h3>
                            <div class="row">
                                <?php
                                $product->GetProduct("products", "creator='$us' AND `Product Price` >= 1 AND status='active' LIMIT 3")
                                ?>
                            </div>
                            <!-- Start Pagination -->
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
                        </div><!-- Ends: .items-tab -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="product-title-area">
                                        <div class="product__title">
                                            <h3><span class="bold">226</span> Customer Reviews</h3>
                                        </div>
                                    </div><!-- ends: .product-title-area -->
                                    <div class="thread thread_review thread_review2">
                                        <ul class="media-list thread-list">
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="img/m1.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="">
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>Themexylum</h4>
                                                                    </a>
                                                                    <a href="#" class="rev_item">Mini - Responsive Bootstrap Dashboard</a>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star-half-o"></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">support</span>
                                                            </div>
                                                            <div class="rev_time">9 Hours Ago</div>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent
                                                            pharetra,
                                                            justo ut sceleris que the mattis, leo quam aliquet
                                                            congue placerat mi id nisi interdum mollis.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="img/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="">
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>Jhon Oliver</h4>
                                                                    </a>
                                                                    <a href="#" class="rev_item">Beidea - One Page Parallax</a>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star-half-o"></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Code Quality</span>
                                                            </div>
                                                            <div class="rev_time">18 Hours Ago</div>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent
                                                            pharetra,
                                                            justo ut sceleris que the mattis, leo quam aliquet
                                                            congue placerat mi id nisi interdum mollis.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="img/m3.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="">
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>Adam Smith</h4>
                                                                    </a>
                                                                    <a href="#" class="rev_item">Carlos - Creative Agency Template</a>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star-half-o"></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Design</span>
                                                            </div>
                                                            <div class="rev_time">3 Days Ago</div>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent
                                                            pharetra,
                                                            justo ut sceleris que the mattis, leo quam aliquet
                                                            congue placerat mi id nisi interdum mollis.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="img/m4.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="">
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>EcoTheme</h4>
                                                                    </a>
                                                                    <a href="#" class="rev_item">Appspress - applanding page</a>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star-half-o"></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">support</span>
                                                            </div>
                                                            <div class="rev_time">1 Week Ago</div>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent
                                                            pharetra,
                                                            justo ut sceleris que the mattis, leo quam aliquet
                                                            congue placerat mi id nisi interdum mollis.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="img/m5.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="">
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>Aazztech</h4>
                                                                    </a>
                                                                    <a href="#" class="rev_item">Rida-Onepage vcard portfolio theme</a>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star-half-o"></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">support</span>
                                                            </div>
                                                            <div class="rev_time">2 Weeks Ago</div>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent
                                                            pharetra,
                                                            justo ut sceleris que the mattis, leo quam aliquet
                                                            congue placerat mi id nisi interdum mollis.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="img/m6.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="">
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>MR9</h4>
                                                                    </a>
                                                                    <a href="#" class="rev_item">Tamabill - Multi-Purpose HTML Template</a>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star-half-o"></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Flexibility</span>
                                                            </div>
                                                            <div class="rev_time">1 Month Ago</div>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent
                                                            pharetra,
                                                            justo ut sceleris que the mattis, leo quam aliquet
                                                            congue placerat mi id nisi interdum mollis.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="img/m7.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="">
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>Tueld T</h4>
                                                                    </a>
                                                                    <a href="#" class="rev_item">Khadim - Extension Bundle</a>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star-half-o"></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">support</span>
                                                            </div>
                                                            <div class="rev_time">3 Months Ago</div>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent
                                                            pharetra,
                                                            justo ut sceleris que the mattis, leo quam aliquet
                                                            congue placerat mi id nisi interdum mollis.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="img/m8.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="">
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>Visual Eggs</h4>
                                                                    </a>
                                                                    <a href="#" class="rev_item">Elpis - A Simple Design For Bloggers</a>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star-half-o"></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Features</span>
                                                            </div>
                                                            <div class="rev_time">4 Months Ago</div>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent
                                                            pharetra,
                                                            justo ut sceleris que the mattis, leo quam aliquet
                                                            congue placerat mi id nisi interdum mollis.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="img/m9.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="">
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>Mr. Potato</h4>
                                                                    </a>
                                                                    <a href="#" class="rev_item">Dhalua - WordPress Theme for Personal Blog</a>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star-half-o"></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Documentation</span>
                                                            </div>
                                                            <div class="rev_time">6 Months Ago</div>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent
                                                            pharetra,
                                                            justo ut sceleris que the mattis, leo quam aliquet
                                                            congue placerat mi id nisi interdum mollis.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="img/m10.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="">
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>BumbleBee</h4>
                                                                    </a>
                                                                    <a href="#" class="rev_item">Transform - Flexible Transform Plugin</a>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star"></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="fa fa-star-half-o"></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">customization</span>
                                                            </div>
                                                            <div class="rev_time">1 Year Ago</div>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent
                                                            pharetra,
                                                            justo ut sceleris que the mattis, leo quam aliquet
                                                            congue placerat mi id nisi interdum mollis.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul><!-- ends: .media-list -->
                                    </div><!-- ends: .comments -->
                                    <!-- Start Pagination -->
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
                                </div><!-- ends: .col-md-12 -->
                            </div><!-- ends: .row -->
                        </div><!-- Ends: reviews-tab -->
                        <div class="tab-pane fade" id="followers" role="tabpanel" aria-labelledby="followers-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="product-title-area">
                                        <div class="product__title">
                                            <?php

                                            $follow_num = "SELECT * FROM folllow WHERE username='$us'";
                                            $follow_result_num = mysqli_query($conn, $follow_num);
                                            $follow_fetch_num = mysqli_num_rows($follow_result_num);

                                            ?>
                                            <h3><span class="bold"><?php echo $follow_fetch_num; ?></span> Followers</h3>
                                        </div>
                                    </div><!-- ends: .product-title-area -->
                                    <div class="user_area">
                                        <div class="row">
                                            <?php

                                            $fetch_product = "SELECT * FROM folllow WHERE username = '$us'";

                                            //execute the query

                                            $result = $conn->query($fetch_product);

                                            if ($result->num_rows > 0) {
                                                //output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <?php
                                                    $followers_sql = "SELECT * FROM users WHERE username='" . $row['followers'] . "'";
                                                    $folowers_res = mysqli_query($conn, $followers_sql);
                                                    $followers_f = mysqli_fetch_array($folowers_res);

                                                    $followers_num_product = "SELECT * FROM products WHERE creator='" . $row['followers'] . "'";
                                                    $followers_num_res_p = mysqli_query($conn, $followers_num_product);
                                                    $followers_product = mysqli_num_rows($followers_num_res_p);

                                                    $followers_num_sale = "SELECT * FROM library WHERE creator='" . $row['followers'] . "'";
                                                    $followers_num_res = mysqli_query($conn, $followers_num_sale);
                                                    $followers_sale = mysqli_num_rows($followers_num_res);

                                                    ?>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class='user-single card '>
                                                            <div class="card-body">
                                                                <img src="https://cdn.templatero.rf.gd/view-image.php?image_id=<?php echo $followers_f['avatar']; ?>" alt="" class="rounded-circle" width="70" height="70">
                                                                <h6><?php echo $row['followers']; ?></h6>
                                                                <p>Member Since: <?php echo $followers_f['member']; ?></p>
                                                                <div class="ratings">
                                                                    <span>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    </span>
                                                                    <span>(52)</span>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="stats">
                                                                    <p><span><?php echo $followers_product; ?></span> Items</p>
                                                                    <p><span><?php echo $followers_sale; ?></span> Sales</p>
                                                                    <?php
                                                                    $follow = $row['username'];
                                                                    $followers = $row['followers'];

                                                                    $ver_follow = "SELECT * FROM folllow WHERE username='$us'";
                                                                    $ver_q = mysqli_query($conn, $ver_follow);
                                                                    $verify = mysqli_num_rows($ver_q);
                                                                    $ver = mysqli_fetch_array($ver_q);
                                                                    echo $verify;
                                                                    ?>
                                                                </div>
                                                                <div class="user__status user--following">
                                                                    <form action="" method="POST">
                                                                        <?php if ($verify <= 0) {
                                                                            if ($username != $row['followers']) {
                                                                                echo '<input type="submit" name="following" class="btn btn-sm btn-secondary" value="following">';
                                                                            }
                                                                        } else {
                                                                            if ($row['followers'] != $username) {
                                                                                echo '<input type="submit" name="follow" class="btn btn-sm btn-primary" value="follow">';
                                                                            }
                                                                        } ?>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div><!-- ends: .user-single -->
                                                    </div><!-- ends: .col-lg-4 -->
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div><!-- ends: .user_area -->
                                    <!-- Start Pagination -->
                                    <!-- Start Pagination -->
                                </div><!-- ends: .col-md-12 -->
                            </div><!-- ends: .row -->
                        </div>
                        <!-- Ends: followers-tab -->
                        <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="following-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="product-title-area">
                                        <div class="product__title">
                                            <h3><span class="bold">143</span> Following</h3>
                                        </div>
                                    </div><!-- ends: .product-title-area -->
                                    <div class="user_area">
                                        <div class="row">
                                            <?php
                                            $fetch_product = "SELECT * FROM folllow  WHERE username='$followers'";

                                            //execute the query

                                            $result = $conn->query($fetch_product);

                                            if ($result->num_rows > 0) {
                                                //output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <?php
                                                    $followers_sql = "SELECT * FROM users WHERE username='" . $row['followers'] . "'";
                                                    $folowers_res = mysqli_query($conn, $followers_sql);
                                                    $followers_f = mysqli_fetch_array($folowers_res);

                                                    $followers_num_product = "SELECT * FROM products WHERE creator='" . $row['followers'] . "'";
                                                    $followers_num_res_p = mysqli_query($conn, $followers_num_product);
                                                    $followers_product = mysqli_num_rows($followers_num_res_p);

                                                    $followers_num_sale = "SELECT * FROM library WHERE creator='" . $row['followers'] . "'";
                                                    $followers_num_res = mysqli_query($conn, $followers_num_sale);
                                                    $followers_sale = mysqli_num_rows($followers_num_res);
                                                    ?>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class='user-single card '>
                                                            <div class="card-body">
                                                                <img src="https://cdn.templatero.rf.gd/view-image.php?image_id=<?php echo $followers_f['avatar']; ?>" alt="" class="rounded-circle" width="70" height="70">
                                                                <h6><?php echo $row['followers']; ?></h6>
                                                                <p>Member Since: <?php echo $followers_f['member']; ?></p>
                                                                <div class="ratings">
                                                                    <span>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    </span>
                                                                    <span>(52)</span>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="stats">
                                                                    <p><span><?php echo $followers_product; ?></span> Items</p>
                                                                    <p><span><?php echo $followers_sale; ?></span> Sales</p>
                                                                    <?php
                                                                    $follow = $row['username'];
                                                                    $followers = $row['followers'];
                                                                    $ver_follow = "SELECT * FROM folllow WHERE username='$followers' AND followers='$us'";
                                                                    $ver_q = mysqli_query($conn, $ver_follow);
                                                                    $verify = mysqli_num_rows($ver_q);
                                                                    ?>
                                                                </div>
                                                                <?php if ($verify == 1) {
                                                                    echo '<div class="user__status user--following"><a href="#" class="btn btn-sm btn-secondary">Following</a></div';
                                                                } else {
                                                                    echo '<a href="#" class="btn btn-sm btn-primary">Follow</a>';
                                                                } ?>
                                                            </div>
                                                        </div><!-- ends: .user-single -->
                                                    </div><!-- ends: .col-lg-4 -->
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div><!-- ends: .user_area -->
                                    <!-- Start Pagination -->
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
                                </div><!-- ends: .col-md-12 -->
                            </div>
                        </div><!-- Ends: following-tab -->
                    </div><!-- ends: .tab-content -->
                </div><!-- Ends: .author-info-tabs -->
            </div>
        </div>
    </section><!-- ends: .author-profile-area -->
    <?php require_once("inc/footer.php"); ?>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
    <!-- inject:js-->
    <?php if ($testMode == true) {
        echo '<script src="assets/js/index.js"></script>';
    } ?>
    <script src="assets/vendor_assets/js/jquery/jquery-1.12.4.min.js"></script>
    <script src="assets/vendor_assets/js/jquery/uikit.min.js"></script>
    <script src="assets/vendor_assets/js/bootstrap/popper.js"></script>
    <script src="assets/vendor_assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="assets/vendor_assets/js/chart.bundle.min.js"></script>
    <script src="assets/vendor_assets/js/grid.min.js"></script>
    <script src="assets/vendor_assets/js/jquery-ui.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.barrating.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.countdown.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.counterup.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.easing1.3.js"></script>
    <script src="assets/vendor_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendor_assets/js/owl.carousel.min.js"></script>
    <script src="assets/vendor_assets/js/select2.full.min.js"></script>
    <script src="assets/vendor_assets/js/slick.min.js"></script>
    <script src="assets/vendor_assets/js/tether.min.js"></script>
    <script src="assets/vendor_assets/js/trumbowyg.min.js"></script>
    <script src="assets/vendor_assets/js/venobox.min.js"></script>
    <script src="assets/vendor_assets/js/waypoints.min.js"></script>
    <script src="assets/theme_assets/js/dashboard.js"></script>
    <script src="assets/theme_assets/js/main.js"></script>
    <script src="assets/theme_assets/js/map.js"></script>
    <!-- endinject-->
</body>

</html>