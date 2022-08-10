<?php
require_once("inc/connect.php");
require_once("inc/banned_ip_russia.php");
session_start();

if (!isset($_SESSION['account']['userData']['username'])) {
    header("location: https://" . $_SERVER['SERVER_NAME'] . "/login.php");
} else {
    $username = $_SESSION['account']['userData']['username'];
}

$sql = "SELECT * FROM users WHERE username='$username'";
$sql_q = mysqli_query($conn, $sql);
$sql_r = mysqli_fetch_array($sql_q);

if (isset($_POST['validate'])) {
    $user = $_POST['username'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];
    $website = $_POST['website'];
    $cpassword = $_POST['cpassword'];
    $Password_hash = $sql_r['password'];

    if (!empty($password)) {
        if ($password == $cpassword) {
            $passwords = password_hash($password, PASSWORD_DEFAULT);
        }
    } else {
        $passwords = $Password_hash;
    }

    if (empty($user)) {
        $user = $_SESSION['account']['userData']['username'];
    }
    if (empty($password)) {
        $password = $sql_r['password'];
    }
    if (empty($mail)) {
        $mail = $sql_r['mail'];
    }
    if (empty($website)) {
        $website = $sql_r['website'];
    }

    if (empty($_FILES['photo']['name'])) {
        $avatar = $sql_r['avatar'];
    } else {
        $avatar = uniqid();
        $imgData = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $imageProperties = getimageSize($_FILES['photo']['tmp_name']);
    }
    $sql = "UPDATE users SET username='$user', password='$passwords', Website='$website', avatar='$avatar' WHERE username='$username'";
    $query = mysqli_query($conn, $sql);

    if (!empty($_FILES['photo']['name'])) {
        $image = "INSERT INTO images (ImageId, imageType, imageData) VALUE ('$avatar','{$imageProperties['mime']}', '{$imgData}')";
        $image_query = mysqli_query($conn, $image);
    }
}

if (isset($_POST['delte_image'])) {
    $sql = "UPDATE users SET avatar='' WHERE username='$username'";
    $query = mysqli_query($conn, $sql);
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
    <section class="dashboard-area">
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
                            <li class="active">
                                <a href="dashboard-setting.php"><span class="lnr icon-settings"></span>Setting</a>
                            </li>
                            <li>
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
                <form action="" method="POST" enctype="multipart/form-data" class="setting_form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="information_module">
                                <div class="information__set profile_images">
                                    <div class="information_wrapper">
                                        <div class="profile_image_area">
                                            <div>
                                                <label for="cover_photo" class="upload_btn">
                                                    <div id="change_avatar" style="display: flex; position:absolute; width: 100px; height: 100px; justify-content:center; align-items:center;">
                                                        <i id="change" class="bi bi-camera" style="font-size: 30px; display:none;">
                                                    </div></i>
                                                    <?php if (empty($sql_r['avatar'])) { ?>
                                                        <style>
                                                            .d {
                                                                margin-right: 20px;
                                                                width: 100px;
                                                                height: 100px;
                                                                justify-content: center;
                                                                align-items: center;
                                                                display: flex;
                                                                font-size: 50px;
                                                                text-transform: uppercase;
                                                                color: white;
                                                                <?Php echo $hex_string = "background-color: #" . bin2hex(openssl_random_pseudo_bytes(3)) . ";"; ?>
                                                            }
                                                        </style>
                                                        <div class="rounded-circle d"><?php echo $_SESSION['account']['userData']['username'][0]; ?></div>
                                                    <?php } else { ?>
                                                        <img id="exec" src="view-image.php?image_id=<?php echo $sql_r['avatar']; ?>" alt="Author profile area" width="100" height="100">
                                                    <?php } ?>
                                                </label>
                                                <div class="img_info">
                                                    <input type="file" style="display: none;" name="photo" id="cover_photo">
                                                    <p class="bold">Profile Image</p>
                                                    <p class="subtitle">JPG, GIF or PNG 100x100 px</p>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-sm btn-danger" name="delte_image" value="Delete Image">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- ends: .information_module -->
                        </div><!-- ends: .col-md-12 -->
                        <div class="col-md-12">
                            <div class="information_module">
                                <div class="toggle_title">
                                    <h4>Personal Information</h4>
                                </div>
                                <div class="information__set">
                                    <div class="information_wrapper form--fields row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="usrname">Username
                                                    <sup>*</sup>
                                                </label>
                                                <input type="text" name="username" id="usrname" class="text_field" placeholder="Account name" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="emailad">Email Address
                                                    <sup>*</sup>
                                                </label>
                                                <input type="text" name="mail" id="emailad" class="text_field" placeholder="Email address" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password
                                                    <sup>*</sup>
                                                </label>
                                                <input type="password" name="password" id="password" class="text_field" placeholder="Enter Password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="conpassword">Confirm Password
                                                    <sup>*</sup>
                                                </label>
                                                <input type="password" name="cpassword" id="conpassword" class="text_field" placeholder="re-enter password">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="">
                                                <label for="authbio">Author Bio</label>
                                                <textarea name="author_bio" name="bio" id="authbio" class="text_field" placeholder="Short brief about yourself or your account..."></textarea>
                                            </div>
                                        </div>
                                    </div><!-- ends: .information_wrapper -->
                                </div><!-- ends: .information__set -->
                            </div><!-- ends: .information_module -->
                        </div><!-- ends: .col-md-12 -->
                        <!--
                         <div class="col-md-12">
                            <div class="information_module">
                                <div class="toggle_title">
                                    <h4>Security</h4>
                                </div>
                                <div class="information__set mail_setting">
                                    <div class="information_wrapper">
                                        <div class="custom_checkbox">
                                            <label class="toggle-switch">
                                                <input type="checkbox" checked>
                                                <span class="slider round"></span>
                                                <span class="radio_title">check that the ip you created your account with is the current one</span>
                                                <span class="desc">this security option will add an option that will check if the ip with which you created the account is equal to the current one, if it is not equal to the current one it will ask you to enter the password to update the information in the account</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       -->
                        <div class="col-md-12">
                            <div class="information_module">
                                <div class="toggle_title">
                                    <h4>Social Profiles</h4>
                                </div>
                                <div class="information__set social_profile">
                                    <div class="information_wrapper">
                                        <div class="social__single">
                                            <div class="social_icon">
                                                <i class="fa fa-globe" style="font-size: 50px;" aria-hidden="true"></i>
                                            </div>
                                            <div class="link_field">
                                                <input type="text" name="personal_Website" class="text_field" placeholder="ex: https://danid.rf.gd">
                                            </div>
                                        </div><!-- ends: .social__single -->
                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-facebook"></span>
                                            </div>
                                            <div class="link_field">
                                                <input type="text" name="fackebook" class="text_field" placeholder="ex: https://fackebook.com/templatero">
                                            </div>
                                        </div><!-- ends: .social__single -->
                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-twitter"></span>
                                            </div>
                                            <div class="link_field">
                                                <input type="text" name="twitter" class="text_field" placeholder="ex:  https://twitter.com/TemplateRoOffi1">
                                            </div>
                                        </div><!-- ends: .social__single -->
                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-google-plus"></span>
                                            </div>
                                            <div class="link_field">
                                                <input type="text" name="google++" class="text_field" placeholder="ex: https://google.com/templatero">
                                            </div>
                                        </div><!-- ends: .social__single -->
                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-dribbble"></span>
                                            </div>
                                            <div class="link_field">
                                                <input type="text" name="dribbbles" class="text_field" placeholder="ex: https://dribbble.com/TemplateRo">
                                            </div>
                                        </div><!-- ends: .social__single -->
                                    </div><!-- ends: .information_wrapper -->
                                </div><!-- ends: .social_profile -->
                            </div><!-- ends: .information_module -->
                        </div><!-- ends: .col-md-6 -->
                        <div class="col-md-12">
                            <div class="dashboard_setting_btn">
                                <input type="submit" name="validate" class="btn btn--md btn-primary" value="Save Change">
                                <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                            </div>
                        </div><!-- ends: .col-md-12 -->
                    </div><!-- ends: .row -->
                </form><!-- end /form -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
    </section><!-- ends: .dashboard-area -->
    <script>
        var avatar = document.querySelector("#change_avatar");
        var exec = document.querySelector("#change");

        avatar.addEventListener("mouseenter", () => {
            exec.style.display = "flex";
            avatar.style.cursor = "pointer";
        });

        avatar.addEventListener("mouseleave", () => {
            exec.style.display = "none";
        });
    </script>
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