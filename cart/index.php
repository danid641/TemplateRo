<?php
require '../autoload.php';

session_start();

class Controller extends users
{
    public function __construct()
    {
        global $tax;
        global $subTotal;
        global $total;
        global $conn;
        global $main;

        $this->db();
        $this->checkLogged();
        $conn = $this->conn;
        $main = new main;

        if (isset($_SESSION['cart_price']) && isset($_SESSION['cart'])) {
            $price = array_sum($_SESSION['cart_price']);
        } else {
            $price = 0;
        }

        $tax = 1;
        $subTotal = $price;
        $total = $price + $tax;
    }
}

$controller = new Controller;

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
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/bootstrap/bootstrap.css">
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
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-32x32.png">
</head>

<body class="preload">
    <?php $main->menu(); ?>
    <section class="cart_area section--padding bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <style>
                        input {
                            display: inline;
                        }
                    </style>
                    <?php if (empty($_SESSION['cart'])) { ?>
                        <div class="alert alert-warning" role="alert" bis_skin_checked="1">
                            <strong>Warning!</strong> Your Shopping Cart Is Empty Yet...
                        </div>
                        <div style="width:100%; justify-content:center; display:flex;">
                            <form action="">
                                <div class="input-group input-group-light" bis_skin_checked="1">
                                    <span class="icon-left" id="basic-addon1">

                                    </span>
                                    <input type="text" class="form-control search_field" style="width:250px;" placeholder="Find your perfect product">
                                    <button type="submit" name="search_submit" class="btn btn-lg btn-dark"><i class="icon-magnifier"></i></button>
                                </div>
                            </form>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="product_archive added_to__cart">
                            <div class="table-responsive single_product">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <h4>Product Details</h4>
                                            </th>
                                            <th scope="col">
                                                <h4>Category</h4>
                                            </th>
                                            <th scope="col">
                                                <h4>Price</h4>
                                            </th>
                                            <th scope="col">
                                                <h4>Remove</h4>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if (isset($_GET['remove-item'])) {
                                            $ids = $_GET['remove-item'];

                                            unset($_SESSION['cart'][$ids]);
                                            unset($_SESSION['cart_price'][$ids]);
                                        }

                                        if (!empty($_SESSION['cart'])) {
                                            $id = $_SESSION['cart'];

                                            foreach ($id as $list) {
                                                $f = "'" . $list . "'";
                                                $nn[] = $f;
                                            }

                                            $where =  implode(',', $nn);

                                            $fetch_products = "SELECT * FROM products WHERE id IN ($where)";
                                            //execute the query

                                            $results = $conn->query($fetch_products);

                                            if ($results->num_rows > 0) {
                                                //output data of each row
                                                while ($rowss = $results->fetch_assoc()) {
                                        ?>
                                                    <tr>
                                                        <td colspan="1">
                                                            <div class="product__description">
                                                                <div class="p_image"><img src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>view-image.php?image_id=<?php echo $rowss['Main Image']; ?>" alt="Purchase image" width="100" height="80"></div>
                                                                <div class="short_desc">
                                                                    <a href="single-product-v2?id=<?php echo $rowss['id']; ?>">
                                                                        <h6><?php echo $rowss['Product Name']; ?></h6>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="category"><?php echo $rowss['category']; ?></a>
                                                        </td>
                                                        <td>
                                                            <div class="item_price">
                                                                <span><?php if ($rowss['Product Price'] == 0) {
                                                                            echo "Free";
                                                                        } else {
                                                                            echo $rowss['Product Price'] . '&euro;';
                                                                        } ?></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="item_action">
                                                                <a href="?remove-item=<?php echo array_rand($_SESSION['cart']); ?>" class="remove_from_cart">
                                                                    <span class="icon-trash"></span>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                        <?php
                                                }
                                            }
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div><!-- ends: .single_product -->
                            <div class="row">
                                <div class="col-md-6 offset-md-6">
                                    <div class="cart_calculation text-right">
                                        <div class="cart--subtotal">
                                            <p><span>Cart Subtotal</span><?php echo $subTotal . "&euro;";  ?></p>
                                        </div>
                                        <div class="cart--total">
                                            <p><span>total</span><?php if (!empty($price)) {
                                                                        echo $total . "&euro;";
                                                                    } else {
                                                                        echo '0&euro;';
                                                                    } ?></p>
                                        </div>
                                        <?php
                                        if (!empty($_SESSION['cart'])) {
                                        ?>
                                            <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/checkout/"; ?>" class="btn btn--md checkout_link btn-primary">Proceed To Checkout</a>
                                        <?php
                                        } else {
                                        ?>
                                            <button class="btn btn--md btn-primary" disabled>Proceed To Checkout</button>
                                        <?Php
                                        }
                                        ?>
                                    </div>
                                </div><!-- end .col-md-12 -->
                            </div><!-- end .row -->
                        </div><!-- end .added_to__cart -->
                    <?php
                    }
                    ?>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .cart_area -->
    <?php $main->footer(); ?>
</body>
<?php $main->script_src(); ?>

</html>