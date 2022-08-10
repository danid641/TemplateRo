<?php
$color_mauve = false;

if (isset($_GET['remove-item'])) {
    header("location: https://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']);
}

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<?php
if ($color_mauve == true) {
?>
    <div class="bg-primary" bis_skin_checked="1">
        <div class="menu-area menu--light" bis_skin_checked="1">
        <?php } ?>
        <div class="top-menu-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-fullwidth">
                            <div class="logo-wrapper">
                                <div class="logo logo-top">
                                    <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>index.php">
                                        <img src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/img/logo/mini-logo_120x120.png" alt="logo image" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="menu-container">
                                <div class="d_menu">
                                    <nav class="navbar navbar-expand-lg mainmenu__menu">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon icon-menu"></span>
                                        </button>
                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                            <ul class="navbar-nav">
                                                <li class="has_dropdown">
                                                    <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>index.php">all product</a>
                                                    <div class="dropdown dropdown--menu">
                                                        <ul>
                                                            <li>
                                                                <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>index.php">Home Multi Vendor</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>index2.php">Home Two Single User</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>index3.php">Home Three Product</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>index4.php">Home Four Product</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>index5.php">Home Five Product</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.navbar-collapse -->
                                    </nav>
                                </div>
                            </div>
                            <div class="author-menu">
                                <!-- start .author-area -->
                                <div class="author-area">
                                    <div class="author__notification_area" style="border-left: 0px;">
                                        <ul>
                                            <?php
                                            if ("fasfh") {
                                            ?>
                                                <li> <a href=""><button class="btn btn-lg btn-primary" style="width: 300px; background-position: 20px; background-image: url('http://localhost/assets/img/logo/icon.png'); background-size: 20px 20px; background-repeat:no-repeat;">unlimited downloads</button></a></li>

                                            <?php
                                            }
                                            ?>
                                            <li><a href=""><button class="btn btn-lg btn-primary" style="width: 220px;"><span class="icon-wallet" style="float: left; margin-top:12%;"></span> start selling</button></a></li>

                                        </ul>
                                    </div>


                                    <div class="author__notification_area">
                                        <ul>
                                            <li class="has_dropdown">

                                                <div class="icon_wrap">
                                                    <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>collection/">
                                                        <span class="icon-heart"></span>
                                                        <span class="notification_count purch"><?php if (isset($_SESSION['favorite'])) {
                                                                                                    echo count($_SESSION['favorite']);
                                                                                                } else {
                                                                                                    echo 0;
                                                                                                }  ?></span>
                                                    </a>
                                                </div>

                                            </li>
                                            <!--
                                                <a href="">
                                                    <li><a href=""><span class="icon-user menu_icon"></span></a></li>

                                                </a>
                                                -->
                                            <!-- Collect the nav links, forms, and other content for toggling -->

                                            <li class="has_dropdown">

                                                <div class="icon_wrap">
                                                    <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>cart.php">
                                                        <span class="icon-basket-loaded"></span>
                                                        <span class="notification_count purch"><?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                                                                                    echo count($_SESSION['cart']);
                                                                                                } else {
                                                                                                    echo 0;
                                                                                                }  ?></span>
                                                    </a>
                                                </div>

                                            </li>
                                        </ul>

                                    </div>

                                    <?php

                                    if (!isset($_SESSION['account']) && !empty($_SESSION['account'])) {
                                    ?>
                                        <div class="author__access_area" bis_skin_checked="1">
                                            <ul class="d-flex">
                                                <li><a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/auth/"; ?>">Sign in</a></li>
                                                <li><a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/auth/signup"; ?>">Sign up</a></li>
                                            </ul>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                    <div class="author-author__info has_dropdown">
                                        <?php
                                        if (!isset($_SESSION['account'])) {
                                        ?>
                                            <div class="author">
                                            <?php
                                        }
                                            ?>
                                            <a href="<?php if (!isset($_SESSION['account'])) { ?> <?php echo "https://" . $_SERVER['SERVER_NAME'] . "/auth/"; ?> <?Php } ?>"><span class="icon-user menu_icon" style="font-size: 16px; background-color: transparent; color:#000;"></span></a>
                                            <?php
                                            if (!isset($_SESSION['account'])) {

                                            ?>
                                            </div>
                                        <?php
                                            }
                                        ?>
                                        <?php
                                        if (isset($_SESSION['account'])) {
                                        ?>
                                            <div class="dropdown dropdown--author">
                                                <div class="author-credits d-flex">
                                                    <div class="author__avatar">
                                                        <img src="view-image?image_id=<?php echo $_SESSION['account']['userData']['avatar']; ?>" alt="user avatar" class="rounded-circle" width="40" height="40">
                                                    </div>
                                                    <div class="autor__info">
                                                        <p class="name">
                                                            danid </p>
                                                        <p class="amount">€999984995</p>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="author.php">
                                                            <span class="icon-user"></span>Profile</a>
                                                    </li>
                                                    <li>
                                                        <a href="dashboard.php">
                                                            <span class="icon-home"></span> Dashboard</a>
                                                    </li>
                                                    <li>
                                                        <a href="dashboard-setting.php">
                                                            <span class="icon-settings"></span> Setting</a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.php">
                                                            <span class="icon-basket"></span>Purchases</a>
                                                    </li>
                                                    <li>
                                                        <a href="favourites.php">
                                                            <span class="icon-heart"></span> Favourite</a>
                                                    </li>
                                                    <li>
                                                        <a href="dashboard-add-credit.php">
                                                            <span class="icon-credit-card"></span>Add Credits</a>
                                                    </li>
                                                    <li>
                                                        <a href="dashboard-statement.php">
                                                            <span class="icon-chart"></span>Sale Statement</a>
                                                    </li>
                                                    <li>
                                                        <a href="uploader.php">
                                                            <span class="icon-cloud-upload"></span>Upload Item</a>
                                                    </li>
                                                    <li>
                                                        <a href="dashboard-manage-item.php">
                                                            <span class="icon-notebook"></span>Manage Item</a>
                                                    </li>
                                                    <li>
                                                        <a href="dashboard-withdrawal.php">
                                                            <span class="icon-briefcase"></span>Withdrawals</a>
                                                    </li>
                                                    <li>
                                                        <a href="logout.php">
                                                            <span class="icon-logout"></span>Logout</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                </div>
                                <!-- end .author-area -->
                                <!-- author area restructured for mobile -->
                                <?php
                                if (isset($_SESSION['account'])) {
                                ?>
                                    <div class="mobile_content ">
                                        <span class="icon-user menu_icon"></span>
                                        <!-- offcanvas menu -->
                                        <div class="offcanvas-menu closed">
                                            <span class="icon-close close_menu"></span>
                                            <div class="author-author__info">
                                                <div class="author__avatar v_middle">
                                                    <img src="<?php echo $rows['avatar']; ?>" alt="user avatar" class="rounded-circle" width="40" height="40">
                                                </div>
                                            </div>
                                            <!--end /.author-author__info-->
                                            <div class="author__notification_area">
                                                <ul>

                                                    <li>
                                                        <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>message.php">
                                                            <div class="icon_wrap">
                                                                <span class="icon-heart"></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>cart.php">
                                                            <div class="icon_wrap">
                                                                <span class="icon-basket"></span>
                                                                <span class="notification_count purch"><?php if (isset($_SESSION['cart'])) {
                                                                                                            echo count($_SESSION['cart']);
                                                                                                        } else {
                                                                                                            echo 0;
                                                                                                        } ?></span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>

                                            </div>
                                            <!--start .author__notification_area -->
                                            <div class="dropdown dropdown--author">
                                                <ul>
                                                    <li>
                                                        <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>author.php">
                                                            <span class="icon-user"></span>Profile</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>dashboard.php">
                                                            <span class="icon-home"></span> Dashboard</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>dashboard-setting.php">
                                                            <span class="icon-settings"></span> Setting</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>cart.php">
                                                            <span class="icon-basket"></span>Purchases</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>favourites.php">
                                                            <span class="icon-heart"></span> Favourite</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>dashboard-add-credit.php">
                                                            <span class="icon-credit-card"></span>Add Credits</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>dashboard-statement.php">
                                                            <span class="icon-chart"></span>Sale Statement</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>uploader.php">
                                                            <span class="icon-cloud-upload"></span>Upload Item</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>dashboard-manage-item.php">
                                                            <span class="icon-notebook"></span>Manage Item</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>dashboard-withdrawal.php">
                                                            <span class="icon-briefcase"></span>Withdrawals</a>
                                                    </li>
                                                    <?Php
                                                    if (isset($_SESSION['account'])) {
                                                    ?>
                                                        <li>
                                                            <a href="#">
                                                                <span class="icon-logout"></span>Logout</a>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>

                                            <?php
                                            if (!isset($_SESSION['account'])) {
                                            ?>
                                                <div class="text-center">
                                                    <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>signup.php" class="author-area__seller-btn inline">Become a
                                                        Seller</a>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?Php
                                } else {
                                ?>

                                <?php
                                }
                                ?>
                                <!-- end /.mobile_content -->

                            </div>
                        </div>
                    </div>

                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end  -->
        </div>
        <?php
        if ($color_mauve == true) {
        ?>
    </div>
<?Php
        }
?>
<div class="dropdown dropdown--author" bis_skin_checked="1">
    <ul>
        <li>
            <a href="author.html">
                <span class="icon-user"></span>Profile</a>
        </li>
        <li>
            <a href="dashboard.html">
                <span class="icon-home"></span> Dashboard</a>
        </li>
        <li>
            <a href="dashboard-setting.html">
                <span class="icon-settings"></span> Setting</a>
        </li>
        <li>
            <a href="cart.html">
                <span class="icon-basket"></span>Purchases</a>
        </li>
        <li>
            <a href="favourites.html">
                <span class="icon-heart"></span> Favourite</a>
        </li>
        <li>
            <a href="dashboard-add-credit.html">
                <span class="icon-wallet"></span>Add Credits</a>
        </li>
        <li>
            <a href="dashboard-statement.html">
                <span class="icon-chart"></span>Sale Statement</a>
        </li>
        <li>
            <a href="dashboard-upload.html">
                <span class="icon-cloud-upload"></span>Upload Item</a>
        </li>
        <li>
            <a href="dashboard-manage-item.html">
                <span class="icon-note"></span>Manage Item</a>
        </li>
        <li>
            <a href="dashboard-withdrawal.html">
                <span class="icon-briefcase"></span>Withdrawals</a>
        </li>
        <li>
            <a href="#">
                <span class="icon-logout"></span>Logout</a>
        </li>
    </ul>
</div>