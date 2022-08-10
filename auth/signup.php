<?php
require '../autoload.php';
session_start();

class Controller extends users
{
    public function __construct()
    {
        global $error_username_aleready_exist;
        global $registred;
        global $password_not_match;
        global $main;

        $error_username_aleready_exist = false;
        $registred = false;
        $password_not_match = false;

        $this->db();
        $conn = $this->conn;
        $main = new main;

        if (isset($_POST['validate'])) {

            $cpassword = $_POST['cpassword'];
            $password = $_POST['password'];
            $actual_date = date("Y/m/d");

            $mail = $_POST['mail'];
            $username = $_POST['username'];
            $id = uniqid();
            $ip = $_SERVER['REMOTE_ADDR'];

            if (!empty($password) && !empty($cpassword) && !empty($mail) && !empty($username)) {

                $sql = "SELECT * FROM users WHERE username='{$username}'";
                $result = mysqli_query($conn, $sql) or die("Query unsuccessful");

                if (mysqli_num_rows($result) == 0) {
                    if ($password == $cpassword) {
                        $sqlS = "INSERT INTO users (id, `Ip Adress`, username, member, email, password) VALUE ('$id','$ip','$username','$actual_date', '$mail', '" . password_hash($password, PASSWORD_DEFAULT) . "')";
                        $sql_q = mysqli_query($conn, $sqlS);
                        /* notification System
                        $notification = "INSERT INTO `notification` (`from_users`,`type`, `message`) value ('$username','system','welcome to templatero')";
                        $notification_query = mysqli_query($conn, $notification);
                      */
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
    }
}

$Controller = new Controller;
?>
<!doctype HTML>
<html lang="en">

<head>
    <title>TemplateRo - Digital Products Marketplace</title>
   <?php $main->head(); ?>
</head>

<body class="preload">
    <?php $main->menu(); ?>
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
                                if ($error_username_aleready_exist == true) {
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
                                if ($password_not_match == true) {
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
                                if ($registred == true) {
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
    <?php $main->footer(); ?>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
    <!-- inject:js-->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <?php
    if (isset($_POST['validate'])) {
    ?>
        <script>
            if (document.querySelector("#user_name").length = 0) {
                document.querySelector("#user_name").style.border = "2px solid red";
            }
            if (document.querySelector("#email_ad").length = 0) {
                document.querySelector("#email_ad").style.border = "2px solid red";
            }
            if (document.querySelector("#password").length = 0) {
                document.querySelector("#password").style.border = "2px solid red";
            }
            if (document.querySelector("#con_pass").length = 0) {
                document.querySelector("#con_pass").style.border = "2px solid red";
            }
        </script>
    <?php
    }
    ?>
</body>
<?Php $main->script_src(); ?>
</html>