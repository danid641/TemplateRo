<?php
require_once("inc/connect.php");
require_once("inc/banned_ip_russia.php");
session_start();

$error_username_aleready_exist = false;
$registred = false;
$password_not_match = false;

if (isset($_POST['validate'])) {

    $cpassword = $_POST['cpassword'];
    $password = $_POST['password'];
    $actual_date = date("Y/m/d");

    $mail = $_POST['mail'];
    $username = $_POST['username'];

    if (!empty($password) && !empty($cpassword) && !empty($mail) && !empty($username)) {

        $sql = "SELECT * FROM users WHERE username='{$username}'";
        $result = mysqli_query($conn, $sql) or die("Query unsuccessful");

        if (mysqli_num_rows($result) == 0) {
            if ($password == $cpassword) {
                $sqlS = "INSERT INTO users (username, member, email, password, balance) VALUE ('$username','$actual_date', '$mail', '" . password_hash($password, PASSWORD_DEFAULT) . "', '100')";
                $sql_q = mysqli_query($conn, $sqlS);
                $notification = "INSERT INTO `notification` (`from_users`,`type`, `message`) value ('$username','system','welcome to templatero')";
                $notification_query = mysqli_query($conn, $notification);
        //=======================================================================================================
        // Create new webhook in your Discord channel settings and copy&paste URL
        //=======================================================================================================

        $webhookurl = "https://discord.com/api/webhooks/951158837958828092/NwnBnnJtAG40VY2xQu8bXEIafHltG8KddKyZIQkhlQrM3ICIdTDJ0qSrBg2Co1Qp5_E3";
        $message = "new user";
        $title = "new transaction";

        //=======================================================================================================
        // Compose message. You can use Markdown
        // Message Formatting -- https://discordapp.com/developers/docs/reference#message-formatting
        //========================================================================================================

        $timestamp = date("c", strtotime("now"));

        $json_data = json_encode([

            "username" => "TemplateRo",


            "avatar_url" => "https://www.linkpicture.com/q/logov21.png",

            "tts" => false,

            // File upload
            // "file" => "",

            // Embeds Array
            "embeds" => [
                [
                    "title" => "$message",

                    "type" => "rich",

                    //"url" => "https://www.templatero.rf.gd",

                    //"timestamp" => $timestamp,

                    "color" => hexdec("6e4ff6"),

                    "footer" => [
                        "text" => "TemplateRo. All rights reserved.",
                        "icon_url" => "https://www.linkpicture.com/q/logov21.png"
                    ],

                    "image" => [
                        "url" => "https://www.linkpicture.com/q/logov21.png"
                    ],

                    // Author
                    "author" => [
                        "name" => "creator: danid#5249",
                        "url" => "https://danid.rf.gd"
                    ],

                    "fields" => [
                        // Field 1
                        [
                            "name" => "username: $username",
                            "value" => "**mail: $mail**",
                            "inline" => true
                        ],
                    ]
                ]
            ]

        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


        $ch = curl_init($webhookurl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        // If you need to debug, or find out why you can't send message uncomment line below, and execute script.
        // echo $response;
        curl_close($ch);
        //======================================================================================================= whebook discord
                $registred = true;
            } else {
                $password_not_match = true;
            }
        } else {
            $error_username_aleready_exist = true;
        }
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
    <section class="signup_area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form action="" method="POST" autocomplete="off">
                        <div class="cardify signup_form">
                            <div class="login--header">
                                <h3>Create Your Account</h3>
                                <p>Please fill the following fields with appropriate information to register a new
                                    TemplateRo
                                    account.
                                </p>
                            </div><!-- end .login_header -->
                            <div class="login--form">
                            <?php
                            if($error_username_aleready_exist == true){
                            ?>                        
                            <div class="alert alert-danger" role="alert" bis_skin_checked="1">
                                    <strong><?php echo $username; ?> aleready exist</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span class="icon-close" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <?php
                                 }
                                ?>
                                <?php
                                if($password_not_match == true){
                                ?>
                                <div class="alert alert-danger" role="alert" bis_skin_checked="1">
                                    <strong>password not match</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span class="icon-close" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <?php
                                }
                                ?>
<?php
if($registred == true){
?>
                                <div class="alert alert-success" role="alert" bis_skin_checked="1">
                                    <strong>you successfully registred</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span class="icon-close" aria-hidden="true"></span>
                                    </button>
                                </div>
                            <?php
                                                        }
?>
                                <div class="form-group">
                                    <label for="user_name">Username</label>
                                    <input id="user_name" name="username" type="text" class="text_field" placeholder="Enter your username...">
                                </div>
                                <div class="form-group">
                                    <label for="email_ad">Email Address</label>
                                    <input id="email_ad" name="mail" type="text" class="text_field" placeholder="Enter your email address">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" name="password" type="password" class="text_field" placeholder="Enter your password...">
                                </div>
                                <div class="form-group">
                                    <label for="con_pass">Confirm Password</label>
                                    <input id="con_pass" name="cpassword" type="password" class="text_field" placeholder="Confirm password">
                                </div>
                                <input class="btn btn--md register_btn btn-primary" name="validate" type="submit" value="Register Now">
                                <div class="login_assist">
                                    <p>Already have an account?
                                        <a href="login.php">Login</a>
                                    </p>
                                </div>
                            </div><!-- end .login--form -->
                        </div><!-- end .cardify -->
                    </form>
                </div><!-- end .col-md-6 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .signup_area -->
    <?php require_once("inc/footer.php"); ?>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
    <!-- inject:js-->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <?php
     if(isset($_POST['validate'])){
    ?>
        <script>
        if(document.querySelector("#user_name").length = 0){
        document.querySelector("#user_name").style.border = "2px solid red";            
        }
        if(document.querySelector("#email_ad").length = 0){
            document.querySelector("#email_ad").style.border = "2px solid red";            
        }
        if(document.querySelector("#password").length = 0){
            document.querySelector("#password").style.border = "2px solid red";            
        }
        if(document.querySelector("#con_pass").length = 0){
        document.querySelector("#con_pass").style.border = "2px solid red";
        }
    </script>
    <?php
     }
    ?>
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