<?php
require 'autoload.php';
session_start();

class IndexController extends users
{

    public function __construct()
    {

        global $num_templates;
        global $username;
        global $product;
        global $ip;

        $this->RunSql("SELECT * FROM products WHERE status='active'", 'num_templates', 'num', true);

        $this->GetName();
        $this->checkLogged();
        $product = new product;
        $num_templates = $this->num_templates;
        $username = $this->username;
        $ip = $_SERVER['REMOTE_ADDR'];
    }
}


$indexController = new IndexController;
$main = new main;
?>
<!doctype HTML>
<html lang="en">

<head>
    <?php $main->head(); ?>
    <title>TemplateRo</title>
</head>
<?php


?>

<body class="preload">
    <?php $main->menu(); ?>
    <section class="hero-area4 bgimage">
        <div class="bg_image_holder">
            <img src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/img/shape_2.png" alt="background-image">
        </div>
        <div class="hero-content content_above">
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero__content__title">
                                <h1><span><?php echo $num_templates['row']; ?></span> Premium Templates & Website Themes</h1>
                                <p class="tagline">Templatero is the most powerful, & customizable template for Easy Digital Downloads Products</p>
                            </div><!-- end .hero__btn-area-->
                            <div class="search-area">
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2">
                                        <div class="search_box2">
                                            <form action="" method="POST">
                                                <?php

                                                if (isset($_POST['seraval'])) {
                                                    $search = $_POST['search'];
                                                    if (!empty($search)) {
                                                        echo '<script>window.location.href = "?query=' . $search . '"</script>';
                                                    }
                                                }
                                                ?>
                                                <input type="text" name="search" class="text_field" placeholder="Search your products...">
                                                <button type="submit" name="seraval" class="search-btn btn--lg btn-primary">Search Now</button>
                                            </form>
                                        </div><!-- end .search_box -->
                                    </div>
                                </div>
                            </div>
                            <!--start .search-area -->
                        </div><!-- end .col-md-12 -->
                    </div>
                </div>
            </div><!-- end .contact_wrapper -->
        </div><!-- end hero-content -->
    </section><!-- ends: .hero-area -->
    <section class="featured-products2 p-top-80 p-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title2">
                        <ul class="list-unstyled">
                            <li>
                                <h2>Featured Products</h2>
                            </li>
                            <li><a href="category-grid" class="btn btn-outline-primary">View All</a></li>
                        </ul>
                    </div>
                </div>
                <?php
                $product->GetProduct("products", "status='active'")
                ?>
            </div>
        </div>
    </section><!-- ends: .fearured-product2 -->
    <section class="latest-product p-top-80 p-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title2">
                        <ul class="list-unstyled">
                            <li>
                                <h2>Newest Products</h2>
                            </li>
                            <li><a href="" class="btn btn-outline-primary">View All</a></li>
                        </ul>
                    </div>
                </div><!-- Ends: .col-md-12 -->
                <div class="col-md-12 product-list">
                    <div class="row">
                        <?php
                        $product->GetProduct("products", "status='active'")
                        ?>
                    </div>
                </div><!-- Ends: .product-list -->
            </div>
        </div>
    </section><!-- ends: .latest-product -->
    <section class="services bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-lock"></span>
                        <h4>secure payments</h4>
                        <p>payments secured by paypal and mastercard</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-like"></span>
                        <h4>Quality Products</h4>
                        <p>we had quality service and products</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-wallet"></span>
                        <h4>14 Days Money Backs</h4>
                        <p>if you don't like what you bought you have 14 days to return it</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-people"></span>
                        <h4>24/7 Customer Care</h4>
                        <p>I had 24/7 active supporters</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
            </div>
        </div>
    </section><!-- ends: .services -->
    <section class="subscribe bgimage">
        <div class="bg_image_holder">
            <img src="assets/img/subscribe-bg.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 subscribe-inner">
                    <div class="envelope-svg">
                        <img src="assets/svg/newsletter.svg" alt="" class="svg">
                    </div>
                    <p>Subscribe to get the latest themes, templates and offer information. Don't worry, we won't send
                        spam!</p>
                    <form action="" method="POST" class="subscribe-form">
                        <div class="form-group">
                            <?php
                            if (isset($_POST['validate'])) {
                                $mail = $_POST['mail'];
                                $verify = "SELECT * FROM subscribe'";
                                $ver = mysqli_query($conn, $verify);
                                $verify_num = mysqli_num_rows($ver);
                                if (!empty($mail)) {
                                    if (mysqli_num_rows($ver) == 0) {
                                        $subscribe = "INSERT INTO `subscribe` (username, email) VALUE ('$username', '$mail')";
                                        $sub_result = mysqli_query($conn, $subscribe);
                                    } else {
                                        echo "you are already a subscriber";
                                    }
                                } else {
                                    echo "please complete pass";
                                }
                            }
                            ?>
                            <input type="email" name="mail" placeholder="Enter your email address" required>
                            <button type="submit" name="validate" class="btn btn--sm btn-primary">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- ends: .subscribe -->
    <?php $main->footer(); ?>
</body>

<?php $main->script_src(); ?>

</html>