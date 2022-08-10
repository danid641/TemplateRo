<?php
include 'autoload.php';
session_start();

class PageController extends users
{
    public function __construct()
    {
        global $conn;
        global $all_template;
        $this->db();
        $conn = $this->conn;
        $select_all_template = "SELECT * FROM products";
        $select_all_template_result = mysqli_query($conn, $select_all_template);
        $all = mysqli_num_rows($select_all_template_result);

        $all_template = $all;
    }
}

$PageController = new PageController;
$main = new main;
$product = new product;

?>
<!doctype HTML>
<html lang="en">

<head>
    <?php $main->head(); ?>
    <title>TemplateRo - Digital Products Marketplace</title>

</head>

<body class="preload">
    <?php $main->menu(); ?>
    <section class="hero-area2 hero-area3 bgimage">
        <div class="bg_image_holder">
            <img src="img/hero-image01.png" alt="background-image">
        </div>
        <div class="hero-content content_above">
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero__content__title">
                                <h1><?php echo $all_template; ?> Premium Templates & Themes</h1>
                            </div><!-- end .hero__btn-area-->
                            <div class="search-area">
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2">
                                        <div class="search_box2">
                                            <form action="" method="POST">
                                                <?php
                                                if (isset($_POST['SearchBtn'])) {
                                                    $search = $_POST['Search'];
                                                    if (!empty($search)) {
                                                        header("location: ?query=$search");
                                                    }
                                                }
                                                ?>
                                                <input type="text" name="Search" class="text_field" placeholder="Search your products..." value="<?php if (!empty($_GET['query'])) {
                                                                                                                                                        echo $_GET['query'];
                                                                                                                                                    } ?>">
                                                <input type="submit" name="SearchBtn" class="search-btn btn--lg btn-primary" value="Search Now">
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
    <div class="filter-area product-filter-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-bar">
                        <div class="filter__option filter--dropdown">
                            <a href="#" id="drop1" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories
                                <span class="icon-arrow-down"></span>
                            </a>
                            <ul class="custom_dropdown custom_drop2 dropdown-menu" aria-labelledby="drop1">
                                <li>
                                    <a href="#">Wordpress
                                        <span>35</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Landing Page
                                        <span>45</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Psd Template
                                        <span>13</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Plugins
                                        <span>08</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">HTML Template
                                        <span>34</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Components
                                        <span>78</span>
                                    </a>
                                </li>
                            </ul>
                        </div><!-- end .filter__option -->
                        <div class="filter__option filter--dropdown">
                            <a href="#" id="drop2" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter By
                                <span class="icon-arrow-down"></span>
                            </a>
                            <ul class="custom_dropdown dropdown-menu" aria-labelledby="drop2">
                                <li>
                                    <a href="#">Trending items</a>
                                </li>
                                <li>
                                    <a href="#">Popular items</a>
                                </li>
                                <li>
                                    <a href="#">New items </a>
                                </li>
                                <li>
                                    <a href="#">Best seller </a>
                                </li>
                                <li>
                                    <a href="#">Best rating </a>
                                </li>
                            </ul>
                        </div><!-- end .filter__option -->
                        <div class="filter__option filter--dropdown filter--range">
                            <a href="#" id="drop3" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Price Range
                                <span class="icon-arrow-down"></span>
                            </a>
                            <div class="custom_dropdown dropdown-menu" aria-labelledby="drop3">
                                <div class="range-slider price-range"></div>
                                <div class="price-ranges">
                                    <span class="from rounded">$30</span>
                                    <span class="to rounded">$300</span>
                                </div>
                            </div>
                        </div><!-- end .filter__option -->
                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <select name="price">
                                    <option value="12">12 Items per page</option>
                                    <option value="15">15 Items per page</option>
                                    <option value="25">25 Items per page</option>
                                </select>
                                <span class="icon-arrow-down"></span>
                            </div>
                        </div><!-- end .filter__option -->
                    </div><!-- end .filter-bar -->
                </div><!-- end .col-md-12 -->
            </div>
        </div>
    </div>
        <section class="product-grid p-bottom-100">
            <div class="container">
                <div class="row">
                    <!-- Start .product-list -->
                    <div class="col-md-12 product-list">
                        <div class="row">
                            <?php

                            if (!empty($_GET['query'])) {
                                $searchs = $_GET['query'];
                                $fetch_product = "SELECT * FROM products WHERE `status` = 'active' AND Tags like '%$searchs%' or `Product Name` like '%$searchs%'";
                            } else {
                                $fetch_product = "SELECT * FROM products";
                            }
                            $result = $conn->query($fetch_product);

                            if ($result->num_rows > 0) {
                                //output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    $creator = $row['creator'];

                                    $users = "SELECT * FROM users WHERE username ='$creator'";
                                    $resultss = mysqli_query($conn, $users);
                                    $rows = mysqli_fetch_array($resultss);

                            ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <!-- <div class="s-promotion">-40%</div> -->
                                                <figure>
                                                    <img src="view-image.php?image_id=<?php echo $row['Main Image']; ?>" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href="?cart=<?php echo $row['id']; ?>"><span class="icon-basket"></span></a></li>
                                                            <li><a href="<?php echo $row['Live Demo']; ?>">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="single-product-v2?id=<?php echo $row['id']; ?>"><?php echo  $row['Product Name'] ?></a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="view-image?image_id=<?php echo $rows['avatar']; ?>" alt="author image">
                                                        <p><a href="#"><?php echo $row['creator']; ?></a></p>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price"><?php if ($row['Product Price'] == 0 or empty($row['Product Price'])) {
                                                                            echo 'Free';
                                                                        } else {
                                                                            echo $row['Product Price'] . '&euro;';
                                                                        } ?></li>
                                                    <li class="sells">
                                                        <?php
                                                        $sqls = "SELECT * FROM library WHERE `Product id`='" . $row['id'] . "'";
                                                        $res = mysqli_query($conn, $sqls);
                                                        $num = mysqli_num_rows($res);
                                                        ?>
                                                        <span class="icon-basket"></span><?php echo $num; ?>
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
                                                    </li>
                                                    <li class="product-rating">
                                                        <ul class="list-unstyled">
                                                            <li><span class="rate_active"></span></li>
                                                            <li><span class="rate_active"></span></li>
                                                            <li><span class="rate_active"></span></li>
                                                            <li><span class="rate_active"></span></li>
                                                            <li><span class="rate_disabled"></span></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-lg-4 -->
                            <?php
                                }
                            } else {
                                echo '<h2>Sorry, but we did not find products matching your request '.'<span class="primary">"'.$searchs.'"</span>'.'</h2>';
                            }
                            ?>
                        </div>
                        <!-- Start Pagination -->
                        <!--
                             <nav class="pagination-default mb-lg-0 mb-30">
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
                            </nav>-->
                        <!-- Ends: .pagination-default -->

                    </div>
                    <!-- Ends: .product-list -->
                </div>
            </div>
        </section><!-- ends: .product-grid -->
        <section class="cta2 bgimage">
            <div class="bg_image_holder">
                <img src="img/cta-bg.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cta-content">
                            <div class="cta-text">
                                <h2>Ready To Join Our Marketplace!</h2>
                                <p>Grow your marketing and be happy with your online business</p>
                            </div>
                            <div class="cta-btn">
                                <a href="" class="btn btn--md btn-primary">Join Us Today</a>
                            </div>
                        </div>
                    </div><!-- ends: .col-md-12 -->
                </div>
            </div>
        </section><!-- ends: .cta2 -->
        <?php require_once("inc/footer.php"); ?>
</body>
<?php $main->script_src(); ?>
</html>