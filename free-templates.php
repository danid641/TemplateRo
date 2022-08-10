<?php
include 'inc/connect.php';

session_start();

if (isset($_GET['cart'])) {
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
        echo '<script>window.location.href = "";</script>';
    }
}

if (isset($_GET['favorite'])) {
    if (empty($_SESSION['favorite'])) {
        $_SESSION['favorite'] = array();
    }

    $fav = $_GET['favorite'];

    if (in_array($fav, $_SESSION['favorite'])) {
    } else {
        $adds = array_push($_SESSION['favorite'], $_GET['favorite']);
        echo '<script>window.location.href = "";</script>';
    }
}

if (isset($_GET['r-favorite'])) {
    $ids = $_GET['r-favorite'];
    if (($ids = array_search($ids, $_SESSION['favorite'])) !== false) {
        unset($_SESSION['favorite'][$ids]);
    }
}

if (isset($_GET['remove-item'])) {
    $ids = $_GET['remove-item'];

    unset($_SESSION['cart'][$ids]);
    unset($_SESSION['cart_price'][$ids]);
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
    <section class="hero-area2 gradient_overlay bgimage">
        <div class="bg_image_holder">
            <img src="img/intro-5.jpg" alt="background-image">
        </div>
        <div class="hero-content content_above">
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero__content__title">
                                <?php 
                                $sqls = "SELECT * FROM products";
                                $q = mysqli_query($conn, $sqls);
                                $rws = mysqli_num_rows($q);
                                ?>
                                <h1><span><?php echo $rws; ?></span> Free & Premium Templates</h1>
                                <p class="tagline">TemplateRo is the most powerful, & customizable template for Easy Digital Downloads Products</p>
                            </div><!-- end .hero__btn-area-->
                            <div class="search-area">
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2">
                                        <div class="search_box2">
                                            <form action="#">
                                                <input type="text" class="text_field" placeholder="Search your products...">
                                                <button type="submit" class="search-btn btn--lg btn-primary">Search Now</button>
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
    <section class="product-sorting">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-unstyled">
                        <li class="active">
                            <span class="icon-flag"></span>
                            <a href="">Free Products</a>
                        </li>
                        <li>
                            <span class="icon-badge"></span>
                            <a href="">Premium Products</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!-- ends: .product-sorting -->
    <section class="product-grid section--padding">
        <div class="container">
            <div class="row">
                <!-- Start Section Title -->
                <div class="col-md-12">
                    <div class="section-title2">
                        <ul class="list-unstyled">
                            <li>
                                <h2>Free Products</h2>
                            </li>
                            <li><a href="" class="btn btn-outline-primary">View All</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Start .col-md-4 -->
                <!-- Start .product-list -->
                <div class="col-md-12 product-list">
                    <div class="product-list">
                        <ul class="nav nav__product-list" id="lp-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-one" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">All Items</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-two" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">WordPress</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Site Template</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-four" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">PSD Template</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-five" data-toggle="tab" href="#tab5" role="tab" aria-controls="tab5" aria-selected="false">Joomla</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-six" data-toggle="tab" href="#tab6" role="tab" aria-controls="tab6" aria-selected="false">User Interface</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-seven" data-toggle="tab" href="#tab7" role="tab" aria-controls="tab7" aria-selected="false">Landing Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-eight" data-toggle="tab" href="#tab8" role="tab" aria-controls="tab8" aria-selected="false">Software</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="lp-tab-content">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-one">
                                <div class="row">
                                    <?php
                                    $fetch_product = "SELECT * FROM products WHERE `Product Price`= 0";

                                    //execute the query

                                    $result = $conn->query($fetch_product);

                                    if ($result->num_rows > 0) {
                                        //output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            $user = $row['creator'];
                                            $select = "SELECT * FROM users WHERE username='$user'";
                                            $query = mysqli_query($conn , $select);
                                            $fetch = mysqli_fetch_array($query);
                                    ?>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="product-single latest-single">
                                                    <div class="product-thumb">
                                                        <figure>
                                                            <img src="view-image.php?image_id=<?php echo $row['Main Image']; ?>" alt="" class="img-fluid">
                                                            <figcaption>
                                                                <ul class="list-unstyled">
                                                                    <?php
                                                                    if($row['creator'] != $username){
                                                                    ?>
                                                                    <li><a href=""><span class="icon-basket"></span></a></li>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <li><a href="<?Php echo $row['Live Demo']; ?>">Live Demo</a></li>
                                                                </ul>
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                    <!-- Ends: .product-thumb -->
                                                    <div class="product-excerpt">
                                                        <h5>
                                                            <a href=""><?php echo $row['Product Name']; ?></a>
                                                        </h5>
                                                        <ul class="titlebtm">
                                                            <li>
                                                                <img class="auth-img" src="<?php echo $fetch['avatar']; ?>" alt="author image">                   
                                                                <p><a href="author?creator=<?php echo $row['creator']; ?>"><?php echo $row['creator']; ?></a></p>                                                     
                                                            </li>
                                                        </ul>
                                                        <ul class="product-facts clearfix">
                                                            <li class="price">Free</li>
                                                            <li class="sells">
                                                                <span class="icon-cloud-download"></span>81
                                                            </li>
                                                            <li class="product-fav">
                                                            <a href="<?php 
                                             
                                             if(!empty($_SESSION['favorite'])){
                                                      
                                              if (in_array($row['id'], $_SESSION['favorite'])) {
                                                  echo '?r-favorite=' . $row['id'];
                                              } else {
                                                  echo '?favorite=' . $row['id'];
                                              }
                                             }else{
                                                 echo '?favorite='. $row['id'];
                                             }
                                              
                                                          ?>"><?php

if(!empty($_SESSION['favorite'])){
  if (in_array($row['id'], $_SESSION['favorite'])) {
      echo '<i style="color: red;" class="bi bi-heart-fill" title="Add to collection" data-toggle="tooltip"></i>';
  } else {
      echo '<span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>';
  }

}else{
  echo '<span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>';

}
                                                                  
                                                                  ?> </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- Ends: .product-excerpt -->
                                                </div><!-- Ends: .product-single -->
                                            </div><!-- ends: .col-md-6 -->
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div><!-- Ends: .tab-pane -->
                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab-two">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab-three">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab-four">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                            <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab-five">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                            <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="tab-six">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                            <!-- Start .tab-pane -->
                            <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="tab-seven">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                            <!-- Start .tab-pane -->
                            <div class="tab-pane fade" id="tab8" role="tabpanel" aria-labelledby="tab-eight">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">Free</li>
                                                    <li class="sells">
                                                        <span class="icon-cloud-download"></span>81
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart"></span> 7938
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                        </div>
                    </div>
                    <!-- Ends: .product-list -->
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
                <!-- Ends: .product-list -->
            </div>
        </div>
    </section>
    <section class="services bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-lock"></span>
                        <h4>Secure Paument</h4>
                        <p>Pellentesque facilisis kamcorper sapien interdum magna.</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-like"></span>
                        <h4>Quality Products</h4>
                        <p>Pellentesque facilisis kamcorper sapien interdum magna.</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-wallet"></span>
                        <h4>14 Days Money Backs</h4>
                        <p>Pellentesque facilisis kamcorper sapien interdum magna.</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-people"></span>
                        <h4>24/7 Customer Care</h4>
                        <p>Pellentesque facilisis kamcorper sapien interdum magna.</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
            </div>
        </div>
    </section><!-- ends: .services -->
    <section class="subscribe bgimage">
        <div class="bg_image_holder">
            <img src="img/subscribe-bg.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 subscribe-inner">
                    <div class="envelope-svg">
                        <img src="img/svg/newsletter.svg" alt="" class="svg">
                    </div>
                    <p>Subscribe to get the latest themes, templates and offer information. Don't worry, we won't send
                        spam!</p>
                    <form action="#" class="subscribe-form">
                        <div class="form-group">
                            <input type="text" placeholder="Enter your email address" required>
                            <button type="submit" class="btn btn--sm btn-primary">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- ends: .subscribe -->
    <?php require_once("inc/footer.php"); ?>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
    <!-- inject:js-->
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