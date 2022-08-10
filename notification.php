<?php
require 'inc/connect.php';
require_once("inc/banned_ip_russia.php");
session_start();

if(isset( $_SESSION['account']['userData']['username'])){
    $username = $_SESSION['account']['userData']['username'];
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
    <section class="dashboard-area section--padding">
        <div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="dashboard__title">
                                <h3>Your Notifications</h3>
                            </div>
                        </div>
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="cardify notifications_module">
                            <?php
                            
                            $fetch_product = "SELECT * FROM notification WHERE `from_users`='$username'";
                            $result = $conn->query($fetch_product);
                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {

                            ?>
                            <div class="notification notification__unread">
                                <div class="notification__info">
                                    <div class="info_avatar">
                                        <?php
                                        $by = $row['by_users'];
                                        $sql = "SELECT * FROM users WHERE username='$by'";
                                        $query = mysqli_query($conn, $sql);
                                        $rw = mysqli_fetch_array($query);
                                        ?>
                                        <img src="<?php if($row['type'] == "system"){echo "https://www.uth.edu/sponsored-projects-administration/about-spa/images/iconcogs.png";}else{echo $rw['avatar'];} ?>" alt="">
                                    </div>
                                    <div class="info">
                                        <p>
                                        <?php
                                        if($row['type'] == "favorite"){
                                        ?>
                                            <span><?php echo $row['by_users']; ?></span> added to
                                            <a href="">Favourite</a> <?php echo $row['purchased']; ?>
                                        <?php
                                        }else if($row['type'] == "message"){
                                        ?>
                                            <span><?php echo $row['by_users']; ?></span> added to
                                            <a href="">Favourite</a> <?php echo $row['purchased']; ?>
                                        <?php
                                        }else if($row['type'] == "purchased"){
                                        ?>
                                            <span><?php echo $row['by_users']; ?></span> purchased <a href=""><?php echo $row['purchased']; ?></a>
                                        <?php
                                        }else if($row['type'] == "system"){
                                        ?>
                                         <span></span>by system</p><p>welcome to templatero</p>
                                        <?php
                                        }
                                        ?>
                                        </p>
                                        <p class="time">Just now</p>
                                    </div>
                                </div><!-- ends: .notifications -->
                                <div class="notification__icons ">
                                    <?php
                                    $id = $row['id'];
                                    if(isset($_POST['delete'])){
                                        $sqls = "DELETE FROM `notification` WHERE id='$id'";
                                        $quer = mysqli_query($conn, $sqls);
                                    }
                                    ?>
                                   <form action="" method="POST">
                                       <input type="submit" id="delete" name="delete" style="display:none">    
                                       <label for="delete" ><span class="icon-close"></span></label>                                 
                                   </form>
                                </div><!-- ends: .notifications -->
                            </div><!-- ends: .notifications -->
                            <?php
                                }}
                            ?>
                        </div><!-- ends: .notifications_modules -->
                    </div><!-- ends: .col-md-12 -->
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