<?php
require_once('connect.php');
$color_mauve = false;

if (isset( $_SESSION['account']['userData']['username'])) {

    $username = $_SESSION['account']['userData']['username'];

    $premium_sql = "SELECT * FROM premium WHERE username='$username'";
    $premium_query = mysqli_query($conn, $premium_sql);
    $premium = mysqli_fetch_array($premium_query);

    $users = "SELECT * FROM users WHERE username='$username'";
    $query5 = mysqli_query($conn, $users);
    $rows = mysqli_fetch_array($query5);
}

if (!empty($_SESSION['cart']) && !empty($_SESSION['cart_price'])) {
    $tax = 1;

    $price = array_sum($_SESSION['cart_price']);

    $subTotal = $price;

    $total = $price + $tax;
}

$date = "22.01.2022";
$actual = date("d.m.Y");
$get_p_free = 1;

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
                                                    <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>index.php">Home</a>
                                                    <div class="dropdown dropdown--menu">
                                                        <ul>
                                                            <li>
                                                                <a href=".php">Home Multi Vendor</a>
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
                                                <li class="has_dropdown">
                                                    <a href="all-products.php">All Product</a>
                                                    <div class="dropdown dropdown--menu">
                                                        <ul>
                                                            <li>
                                                                <a href="all-products.php">Recent Items</a>
                                                            </li>
                                                            <li>
                                                                <a href="all-products.php">Popular Items</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>index5.php">Free Templates</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Follow Feed</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Top Authors</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="has_dropdown">
                                                    <a href="category-grid.php">Categories</a>
                                                    <div class="dropdown dropdown--menu">
                                                        <ul>
                                                            <li>
                                                                <a href="category-grid.php">Popular Items</a>
                                                            </li>
                                                            <li>
                                                                <a href="category-grid.php">Admin Templates</a>
                                                            </li>
                                                            <li>
                                                                <a href="category-grid.php">Blog / Magazine / News</a>
                                                            </li>
                                                            <li>
                                                                <a href="category-grid.php">Creative</a>
                                                            </li>
                                                            <li>
                                                                <a href="category-grid.php">Corporate Business</a>
                                                            </li>
                                                            <li>
                                                                <a href="category-grid.php">Resume Portfolio</a>
                                                            </li>
                                                            <li>
                                                                <a href="category-grid.php">eCommerce</a>
                                                            </li>
                                                            <li>
                                                                <a href="category-grid.php">Entertainment</a>
                                                            </li>
                                                            <li>
                                                                <a href="category-grid.php">Landing Pages</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="has_megamenu">
                                                    <a href="#">Elements</a>
                                                    <div class="dropdown_megamenu contained">
                                                        <div class="megamnu_module">
                                                            <div class="menu_items">
                                                                <div class="menu_column">
                                                                    <ul>
                                                                        <li>
                                                                            <a href="http://localhost/assets/wait/info/accordion.php">Accordion</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="http://localhost/assets/wait/info/alert.php">Alert</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="http://localhost/assets/wait/info/brands.php">Brands</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="http://localhost/assets/wait/info/buttons.php">Buttons</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="http://localhost/assets/wait/info/cards.php">Cards</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="http://localhost/assets/wait/info/charts.php">Charts</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="http://localhost/assets/wait/info/content-block.php">Content
                                                                                Block</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="menu_column">
                                                                    <ul>
                                                                        <li>
                                                                            <a href="dropdowns.php">Dropdowns</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="features.php">Features</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="info-box.php">Info Box</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="modal.php">Modal</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="peoples.php">Peoples</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="products.php">Products</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="social.php">Social</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="menu_column">
                                                                    <ul>
                                                                        <li>
                                                                            <a href="tab.php">Tabs</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="table.php">Table</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="testimonials.php">Testimonials</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="timeline.php">Timeline</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="typography.php">Typography</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="headers.php">Header Styles</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="pricing.php">Pricing</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="has_megamenu">
                                                    <a href="#">Pages</a>
                                                    <div class="dropdown_megamenu">
                                                        <div class="megamnu_module">
                                                            <div class="menu_items">
                                                                <div class="menu_column">
                                                                    <ul>
                                                                        <li class="title">Product</li>
                                                                        <li>
                                                                            <a href="all-products.php">Products Grid</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="category-grid.php">Category Grid</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="search-product.php">Search Product</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="single-product.php">Single Product
                                                                                V1</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="single-product-v2.php">Single Product
                                                                                V2</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="single-product-v3.php">Single Product
                                                                                V3</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="cart.php">Shopping Cart</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="checkout.php">Checkout</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="menu_column">
                                                                    <ul>
                                                                        <li class="title">Author</li>
                                                                        <li>
                                                                            <a href="author.php">Author Profile</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="notification.php">Notifications</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="message.php">Message Inbox</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="message-compose.php">Message
                                                                                Compose</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="favourites.php">Favorites Items</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="career.php">Job Posts</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="job-detail.php">Job Details</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="menu_column">
                                                                    <ul>
                                                                        <li class="title">Dashboard</li>
                                                                        <li>
                                                                            <a href="dashboard.php">Dashboard</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="dashboard-setting.php">Account
                                                                                Settings</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="dashboard-purchase.php">Author
                                                                                Purchases</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="dashboard-add-credit.php">Add
                                                                                Credits</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="dashboard-statement.php">Statements</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="invoice.php">Invoice</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="uploader.php">Upload Item</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="dashboard-manage-item.php">Manage
                                                                                Items</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="edit-item.php">Edit Items</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="dashboard-withdrawal.php">Withdrawals</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="add-payment-method.php">Add Payment
                                                                                Method</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="order-confirm.php">Order Confirm</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="menu_column">
                                                                    <ul>
                                                                        <li class="title">User</li>
                                                                        <li>
                                                                            <a href="support-forum.php">Support Forum</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="support-forum-detail.php">Forum
                                                                                Details</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="support-forum-form.php">Forum Form</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="login.php">Login</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="signup.php">Register</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="recover-pass.php">Recovery
                                                                                Password</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="customer-dashboard.php">Customer
                                                                                Dashboard</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="customer-downloads.php">Customer
                                                                                Downloads</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="customer-info.php">Customer Info</a>
                                                                        </li>
                                                                    </ul>
                                                                    <ul>
                                                                        <li class="title">Blog</li>
                                                                        <li>
                                                                            <a href="blog1.php">Blog V-1</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="blog2.php">Blog V-2</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="single-blog.php">Single Blog</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="menu_column">
                                                                    <ul>
                                                                        <li class="title">Other</li>
                                                                        <li>
                                                                            <a href="how-it-works.php">How It Works</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="about.php">About Us</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="pricing.php">Pricing Plan</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="testimonial.php">Testimonials</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="faq.php">FAQs</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="faq-details.php">FAQ's Details</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="affiliate.php">Affiliates</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="term-condition.php">Terms &amp;
                                                                                Conditions</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="event.php">Event</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="event-detail.php">Event Detail</a>
                                                                        </li>
                                                                        <li class="has_badge">
                                                                            <a href="badges.php">Badges <span class="badge badge-primary">New</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="404.php">404 Error page</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="contact-us.php">contact</a>
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
                                    <div class="search-wrapper">
                                        <div class="nav_right_module search_module">
                                            <span class="icon-magnifier search_trigger"></span>
                                            <div class="search_area">
                                                <?php
                                                if (isset($_POST['search'])) {
                                                    echo $_POST['search'];
                                                }
                                                ?>
                                                <form action="" method="POST">
                                                    <div class="input-group input-group-light">
                                                        <span class="icon-left" id="basic-addon1">
                                                            <i class="icon-magnifier"></i>
                                                        </span>
                                                        <input type="text" name="search" class="form-control search_field" placeholder="Type words and hit enter...">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(isset( $_SESSION['account']['userData']['username'])){ ?>
                                    <div class="author__notification_area">
                                        <ul>
                                                <li class="has_dropdown">
                                                    <div class="icon_wrap">
                                                        <span class="icon-bell"></span>
                                                        <span class="notification_status noti"></span>
                                                    </div>
                                                    <div class="dropdown notification--dropdown">
                                                        <div class="dropdown_module_header">
                                                            <h6>My Notifications</h6>
                                                        </div>
                                                        <div class="notifications_module">
                                                            <?php
                                                            $fetch_product = "SELECT * FROM `notification` WHERE `from_users`='$username' LIMIT 4";
                                                            $result = $conn->query($fetch_product);
                                                            if ($result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {
                                                                    $sql = "SELECT * FROM users WHERE username='" . $row['by_users'] . "'";
                                                                    $resu = mysqli_query($conn, $sql);
                                                                    $fetch = mysqli_fetch_array($resu);
                                                                    $sql2 = "SELECT * FROM products WHERE `Product Name`='" . $row['purchased'] . "'";
                                                                    $resu2 = mysqli_query($conn, $sql2);
                                                                    $fetch2 = mysqli_fetch_array($resu2);
                                                            ?>
                                                                    <div class="notification">
                                                                        <div class="notification__info">
                                                                            <div class="info_avatar">
                                                                                <img src="<?php if ($row['type'] == "system") {
                                                                                                echo 'https://www.uth.edu/sponsored-projects-administration/about-spa/images/iconcogs.png';
                                                                                            } elseif ($row['type'] == "favorite") {
                                                                                                echo $fetch['avatar'];
                                                                                            } elseif ($row['type'] == "purchased") {
                                                                                                echo $fetch['avatar'];
                                                                                            } ?>" alt="" height="40">
                                                                            </div>
                                                                            <div class="info">
                                                                                <p>
                                                                                    <span><?php if ($row['type'] != "system") {
                                                                                                echo $row['from_users'];
                                                                                            } ?></span><?php if ($row['type'] == "system") {
                                                                                                                                                                    echo "by";
                                                                                                                                                                } ?> <?php echo $row['type'] ?>
                                                                                    <?php if ($row['type'] != "system") { ?>
                                                                                        <a href="<?php if ($row['type'] == "purchased") {
                                                                                                        echo 'single-product-v2?id=';
                                                                                                    } ?>"><?php if ($row['type'] == "purchased") {
                                                                                                                                                                                echo $fetch2['Product Name'];
                                                                                                                                                                            } ?></a>
                                                                                    <?php } else { ?>
                                                                                <p><?Php echo $row['message']; ?></p>
                                                                            <?php } ?>
                                                                            </p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end /.notifications -->
                                                                        <div class="notification__icons ">
                                                                            <?php if ($row['type'] == "system") {
                                                                                echo '<i style="font-size:30px;" class="bi bi-gear"></i>';
                                                                            } elseif ($row['type'] == "favorite") {
                                                                                echo '<span class="icon-heart loved noti_icon"></span>';
                                                                            } elseif ($row['type'] == "purchased") {
                                                                                echo '<span class="icon-basket-loaded purchased noti_icon"></span>';
                                                                            } elseif ($row['type'] = "message") {
                                                                                '<span class="icon-bubble commented noti_icon"></span>';
                                                                            } ?>
                                                                        </div>
                                                                        <!-- end /.notifications -->
                                                                    </div>
                                                                    <!-- end /.notifications -->
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            <div class="text-center m-top-30 p-left-20 p-right-20"><a href="notification.php" class="btn btn-primary btn-md btn-block">View
                                                                    All</a></div>
                                                            <!-- end /.notifications -->
                                                        </div>
                                                        <!-- end /.dropdown -->
                                                    </div>
                                                </li>
                                                <li class="has_dropdown">
                                                    <div class="icon_wrap">
                                                        <span class="icon-envelope-open"></span>
                                                        <span class="notification_status msg"></span>
                                                    </div>
                                                    <div class="dropdown messaging--dropdown">
                                                        <div class="dropdown_module_header">
                                                            <h6>My Messages</h6>
                                                        </div>
                                                        <div class="messages">
                                                            <a href="message.php" class="message recent">
                                                                <div class="message__actions_avatar">
                                                                    <div class="avatar">
                                                                        <img src="assets/img/notification_head4.png" alt="">
                                                                    </div>
                                                                </div>
                                                                <!-- end /.actions -->
                                                                <div class="message_data">
                                                                    <div class="name_time">
                                                                        <div class="name">
                                                                            <p>NukeThemes</p>
                                                                            <span class="icon-envelope"></span>
                                                                        </div>
                                                                        <span class="time">Just now</span>
                                                                        <p>Hello John Smith! Nunc placerat mi ...</p>
                                                                    </div>
                                                                </div>
                                                                <!-- end /.message_data -->
                                                            </a>
                                                            <!-- end /.message -->
                                                            <a href="message.php" class="message recent">
                                                                <div class="message__actions_avatar">
                                                                    <div class="avatar">
                                                                        <img src="assets/img/notification_head5.png" alt="">
                                                                    </div>
                                                                </div>
                                                                <!-- end /.actions -->
                                                                <div class="message_data">
                                                                    <div class="name_time">
                                                                        <div class="name">
                                                                            <p>Crazy Coder</p>
                                                                            <span class="icon-envelope"></span>
                                                                        </div>
                                                                        <span class="time">Just now</span>
                                                                        <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                                                    </div>
                                                                </div>
                                                                <!-- end /.message_data -->
                                                            </a>
                                                            <!-- end /.message -->
                                                            <a href="message.php" class="message">
                                                                <div class="message__actions_avatar">
                                                                    <div class="avatar">
                                                                        <img src="assets/img/notification_head2.png" alt="">
                                                                    </div>
                                                                </div>
                                                                <!-- end /.actions -->
                                                                <div class="message_data">
                                                                    <div class="name_time">
                                                                        <div class="name">
                                                                            <p>Hybrid Insane</p>
                                                                        </div>
                                                                        <span class="time">Just now</span>
                                                                        <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                                                    </div>
                                                                </div>
                                                                <!-- end /.message_data -->
                                                            </a>
                                                            <!-- end /.message -->
                                                            <a href="message.php" class="message">
                                                                <div class="message__actions_avatar">
                                                                    <div class="avatar">
                                                                        <img src="assets/img/notification_head3.png" alt="">
                                                                    </div>
                                                                </div>
                                                                <!-- end /.actions -->
                                                                <div class="message_data">
                                                                    <div class="name_time">
                                                                        <div class="name">
                                                                            <p>ThemeXylum</p>
                                                                        </div>
                                                                        <span class="time">Just now</span>
                                                                        <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                                                    </div>
                                                                </div>
                                                                <!-- end /.message_data -->
                                                            </a>
                                                            <!-- end /.message -->
                                                            <a href="message.php" class="message">
                                                                <div class="message__actions_avatar">
                                                                    <div class="avatar">
                                                                        <img src="assets/img/notification_head4.png" alt="">
                                                                    </div>
                                                                </div>
                                                                <!-- end /.actions -->
                                                                <div class="message_data">
                                                                    <div class="name_time">
                                                                        <div class="name">
                                                                            <p>NukeThemes</p>
                                                                            <span class="icon-envelope"></span>
                                                                        </div>
                                                                        <span class="time">Just now</span>
                                                                        <p>Hello John Smith! Nunc placerat mi ...</p>
                                                                    </div>
                                                                </div>
                                                                <!-- end /.message_data -->
                                                            </a>
                                                            <!-- end /.message -->
                                                        </div>
                                                        <div class="text-center m-top-30 m-bottom-30 p-left-20 p-right-20">
                                                            <a href="message.php" class="btn btn-primary btn-md btn-block">View
                                                                All</a>
                                                        </div>
                                                    </div>
                                                </li>

                                            <li class="has_dropdown">
                                                <div class="icon_wrap">
                                                    <span class="icon-basket-loaded"></span>
                                                    <span class="notification_count purch"><?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                                                                                echo count($_SESSION['cart']);
                                                                                            } else {
                                                                                                echo 0;
                                                                                            }  ?></span>
                                                </div>
                                                <div class="dropdown dropdown--cart">
                                                    <div class="cart_area">
                                                        <div class="cart_list">
                                                            <?php
                                                            if (!empty($_SESSION['cart'])) {

                                                                $id = $_SESSION['cart'];

                                                                $where =  implode(',', $id);

                                                                $fetch_products = "SELECT * FROM products WHERE id IN ($where)";
                                                                //execute the query

                                                                $results = $conn->query($fetch_products);

                                                                if ($results->num_rows > 0) {
                                                                    //output data of each row
                                                                    while ($rowss = $results->fetch_assoc()) {
                                                            ?>
                                                                        <div class="cart_product">
                                                                            <div class="product__info">
                                                                                <div class="thumbn">
                                                                                    <img src="view-image.php?image_id=<?php echo $rowss['Main Image'] ?>" alt="cart product thumbnail" width="70" height="70">
                                                                                </div>
                                                                                <div class="info">
                                                                                    <a class="title" href="single-product-v2?id=<?php echo $rowss['id']; ?>">
                                                                                        <?Php echo $rowss['Product Name']; ?>
                                                                                    </a>
                                                                                    <div class="cat">
                                                                                        <a href="#">
                                                                                            <img src="assets/assets/img/catword.png" alt=""><?php echo $rowss['category']; ?></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                            if (isset($_GET['remove-item'])) {
                                                                                $ids = $_GET['remove-item'];

                                                                                unset($_SESSION['cart'][$ids]);
                                                                                unset($_SESSION['cart_price'][$ids]);
                                                                            }

                                                                            ?>
                                                                            <div class="product__action">
                                                                                <a href="?remove-item=<?php echo array_rand($_SESSION['cart']); ?>">
                                                                                    <span class="icon-trash"></span>
                                                                                </a>
                                                                                <p><?php echo '&euro;' . $rowss['Product Price']; ?></p>
                                                                            </div>
                                                                        </div>
                                                            <?php
                                                                    }
                                                                }
                                                            }

                                                            ?>
                                                        </div>
                                                        <div class="total">
                                                            <p>
                                                                <span>fee
                                                                    :</span><?php if (!empty($tax)) {
                                                                                echo '&euro;' . $tax;
                                                                            } else {
                                                                                echo '&euro;0';
                                                                            } ?>
                                                            </p>
                                                            <p>
                                                                <span>Total :</span><?php if (!empty($price)) {
                                                                                        echo '&euro;' . $total;
                                                                                    } else {
                                                                                        echo '&euro;0';
                                                                                    } ?>
                                                            </p>
                                                        </div>
                                                        <div class="cart_action">
                                                            <a class="btn btn-primary" href="cart.php">View
                                                                Cart</a>
                                                            <a class="btn btn-secondary" href="checkout.php">Checkout</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php
                                    }
                                if (!isset( $_SESSION['account']['userData']['username'])) {
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
                                    <!--start .author-author__info-->
                                    <?php
                                    if (isset( $_SESSION['account']['userData']['username'])) {
                                    ?>
                                        <div class="author-author__info has_dropdown">
                                            <div class="author__avatar online">
                                                <?php if (!empty($rows['avatar'])) {
                                                ?>
                                                    <img src="http://localhost/view-image.php?image_id=<?php echo $rows['avatar']; ?>" alt="user avatar" class="rounded-circle" width="40" height="40">
                                                <?Php
                                                } else {
                                                ?>
                                                    <style>
                                                        .m {
                                                            background-color: #<?Php echo $hex_string = bin2hex(openssl_random_pseudo_bytes(3)); ?>;width: 40px;height: 40px;justify-content: center;align-items: center;display: flex;font-size: 20px;text-transform: uppercase;color: white;}
                                                    </style>
                                                    <div class="rounded-circle m"><?php echo $_SESSION['account']['userData']['username'][0]; ?></div>
                                                <?php
                                                } ?>
                                            </div>
                                            <div class="dropdown dropdown--author">
                                                <div class="author-credits d-flex">
                                                    <div class="author__avatar">
                                                        <?php if (!empty($rows['avatar'])) {
                                                        ?>
                                                            <img src="http://localhost/view-image.php?image_id=<?php echo $rows['avatar']; ?>" alt="user avatar" class="rounded-circle" width="40" height="40">
                                                        <?Php
                                                        } else {
                                                        ?>
                                                            <style>
                                                                .m {background-color: # <?php echo $hex_string = bin2hex(openssl_random_pseudo_bytes(3)); ?>;width: 40px;height: 40px;justify-content: center;align-items: center;display: flex;font-size: 20px;text-transform: uppercase;color: white;}
                                                            </style>
                                                            <div class="rounded-circle m"><?php echo $_SESSION['account']['userData']['username'][0]; ?></div>
                                                        <?php
                                                        } ?>
                                                    </div>
                                                    <div class="autor__info">
                                                        <p class="name">
                                                            <?php echo $_SESSION['account']['userData']['username']; ?>
                                                        </p>
                                                        <p class="amount">&euro;<?php echo $rows['balance']; ?></p>
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
                                        <!--end /.author-author__info-->
                                </div>
                                <!-- end .author-area -->
                                <!-- author area restructured for mobile -->
                                <?php
                                if (isset( $_SESSION['account']['userData']['username'])) {
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
                                                        <a href="notification.php">
                                                            <div class="icon_wrap">
                                                                <span class="icon-bell"></span>
                                                                <span class="notification_count noti">25</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="message.php">
                                                            <div class="icon_wrap">
                                                                <span class="icon-envelope"></span>
                                                                <span class="notification_count msg">6</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.php">
                                                            <div class="icon_wrap">
                                                                <span class="icon-basket"></span>
                                                                <span class="notification_count purch">2</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!--start .author__notification_area -->
                                            <div class="dropdown dropdown--author">
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
                                                    <?Php
                                                    if (isset( $_SESSION['account']['userData']['username'])) {
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
                                            if (!isset( $_SESSION['account']['userData']['username'])) {
                                            ?>
                                                <div class="text-center">
                                                    <a href="signup.php" class="author-area__seller-btn inline">Become a
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