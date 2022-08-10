<head>
    <meta charset="UTF-8">
    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TemplateRo - Digital Products Marketplace ">
    <meta name="keywords" content="marketplace, easy digital download, digital product, digital, html5">
    <title>TemplateRo</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">
    <!-- inject:css-->
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/trumbowyg.min.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/venobox.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/css/style.css">
    <!-- endinject -->
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>/assets/img/logo/icon.png">
    <style>
        .sticky {
            position: sticky;
            top: 100;
            background-color: yellow;
            font-size: 20px;

        }
    </style>
</head>
<?php
include 'inc/connect.php';
session_start();

if (isset($_SESSION['account']['userData']['username'])) {
    $username = $_SESSION['account']['userData']['username'];

    $verify_aleready_own_product = "SELECT * FROM library WHERE owner='$username'";
    $verify_aleready_own_product_result = mysqli_query($conn, $verify_aleready_own_product);
    $verify_aleready_own_product_ver = mysqli_num_rows($verify_aleready_own_product_result);

    if (isset($_GET['cart'])) {
        $cart = $_GET['cart'];
        $verify_test = "SELECT * FROM products WHERE id='$cart'";
        $verify_test_result = mysqli_query($conn, $verify_test);
        $verify_test_product = mysqli_fetch_array($verify_test_result);

        if ($verify_aleready_own_product_ver == 0) {
            $sel = "SELECT * FROM products WHERE id='$cart'";
            $q = mysqli_query($conn, $sel);
            $num = mysqli_num_rows($q);

            $veri = "SELECT * FROM products WHERE id='$cart'";
            $q2 = mysqli_query($conn, $veri);
            $f1 = mysqli_fetch_array($q2);

            if ($num == 1 && $f1['creator'] != $username) {
                if (empty($_SESSION['cart']) or empty($_SESSION['cart_price'])) {
                    $_SESSION['cart'] = array();
                    $_SESSION['cart_price'] = array();
                }

                $marks = $_GET['cart'];

                $product = "SELECT * FROM products WHERE id='$marks'";
                $res = mysqli_query($conn, $product);
                $fetch = mysqli_fetch_array($res);

                if (in_array($marks, $_SESSION['cart'])) {
                } else {
                    $add = array_push($_SESSION['cart'], $_GET['cart']);
                    $add_price = array_push($_SESSION['cart_price'], $fetch['Product Price']);
                   success();
                }
            } else {
                empty_or_creator_Error();
            }
        } else {
            aleready_own_product();
        }
    }
} else {
    LoginError();
} ?>
<?php
function LoginError()
{
?>
    <style>
        a,
        p {
            display: inline;
        }
    </style>
    <section class=" p-top-100 p-bottom-70 align-items-center justify-content-center d-flex" style="height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="shortcode_modules">
                        <div class="modules__content">
                            <div class="alerts-wrapper">
                                <div class="alert alert-danger" role="alert">
                                    <p> please </p><a href=""> create an account </a>
                                    <p> or </p> <a href=""> sign </a>
                                    <p> in to an existing one so you can add the product to your cart </p>
                                </div>
                            </div><!-- ends: .alerts-wrapper -->
                            <a href="localhost/helpdesk/">report a problem</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2">
                    <div class="shortcode_modules">
                        <div class="modules__content justify-content-center d-flex" style="width: 95%;">
                            <button class="btn btn-lg btn-primary">back</button>
                        </div>
                    </div>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
    </section>
<?php
}
?>

<?php
function aleready_own_product(){
?>
<section class=" p-top-100 p-bottom-70 align-items-center justify-content-center d-flex" style="height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="shortcode_modules">
                        <div class="modules__content">
                            <div class="alerts-wrapper">
                                <div class="alert alert-danger" role="alert">
                                   <p>you can't add a product you already own to your cart</p>
                                </div>
                            </div><!-- ends: .alerts-wrapper -->
                            <a href="">report a problem</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2">
                    <div class="shortcode_modules">
                        <div class="modules__content justify-content-center d-flex" style="width: 95%;">
                            <button class="btn btn-lg btn-primary">back</button>
                        </div>
                    </div>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
    </section>
<?php
}
?>

<?php
function empty_or_creator_Error(){
?>
    <section class=" p-top-100 p-bottom-70 align-items-center justify-content-center d-flex" style="height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="shortcode_modules">
                        <div class="modules__content">
                            <div class="alerts-wrapper">
                                <div class="alert alert-danger" role="alert">
                                   <p>you cannot add a product that does not exist or a product of which you are the creator to the cart</p>
                                </div>
                            </div><!-- ends: .alerts-wrapper -->
                            <a href="">report a problem</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2">
                    <div class="shortcode_modules">
                        <div class="modules__content justify-content-center d-flex" style="width: 95%;">
                            <button class="btn btn-lg btn-primary">back</button>
                        </div>
                    </div>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
    </section>
<?php
}
?>

<?php

function success(){
    header("location: index.php");
}

?>