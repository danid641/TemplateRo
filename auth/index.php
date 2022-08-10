<?php

require '../autoload.php';

session_start();

$error_require = false;
$error_incorect_pass_or_user = false;
$logged = false;

class Controller extends users
{
    public function __construct()
    {
        global $error_incorect_pass_or_user;
        global $error_require;
        global $logged;
        global $main;

        $this->db();
        $conn = $this->conn;

        $main = new main;

        if (isset($_POST['validate'])) {
            $username = $_POST['user'];
            $password = $_POST['password'];

            $Rember = $_POST['RememberAccount'];

            if (empty($Rember)) {
                $Rember = false;
            }

            if ($Rember == false) {
                $actual_time = date("Y-m-d H:i:s");
                $duration = '+30 minutes';
                $_SESSION['expire'] = date('Y-m-d H:i:s', strtotime($duration, strtotime($actual_time)));
            }


            $user = "SELECT * FROM users WHERE username	='$username'";
            $user_query = mysqli_query($conn, $user);
            $user_row = mysqli_fetch_array($user_query);

            if (!empty($username) && !empty($user_row['username']) && $username == $user_row['username'] && password_verify($password, $user_row['password'])) {
                $_SESSION['account'] = array('userData' =>
                array(
                    'id' => $user_row['id'],
                    'username' => $user_row['username']
                ));
                $logged = true;
            } else {
                if (!empty($username) && !empty($password)) {
                    $error_incorect_pass_or_user = true;
                }
            }

            if (empty($username) or empty($password)) {
                $error_require = true;
            }
        }
        if (isset($_SESSION['account']['userData']['username'])) {
            header("location: /dashboard.php");
        }
    }
}

$controller = new Controller;

/*

$ip = $_SERVER['REMOTE_ADDR'];

$authorized = "::1";


if ($ip == $authorized) {
} else {
    header("location: https://".$_SERVER['SERVER_NAME']."/wait-zone.php");
}
*/
?>
<!doctype HTML>
<html lang="en">

<head>
    <?php $main->head(); ?>
    <title>TemplateRo - Digital Products Marketplace</title>
</head>

<body class="preload">
    <?php $main->menu(); ?>
    <section class="login_area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                    <form action="" method="POST">
                        <div class="cardify login">
                            <div class="login--header">
                                <h3>Welcome Back</h3>
                                <p>You can sign in with your username</p>
                            </div><!-- end .login_header -->
                            <div class="login--form">
                                <?php
                                if ($error_incorect_pass_or_user == true) {
                                ?>
                                    <div class="alert alert-danger" role="alert" bis_skin_checked="1">
                                        <strong>username or password is incorect</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span class="icon-close" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if ($error_require == true) {
                                ?>
                                    <div class="alert alert-danger" role="alert" bis_skin_checked="1">
                                        <strong>Username and password required</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span class="icon-close" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if ($logged == true) {
                                ?>
                                    <div class="alert alert-success" role="alert" bis_skin_checked="1">
                                        <strong>you successfully logged</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span class="icon-close" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="form-group">
                                    <label for="user_name">Username</label>
                                    <input id="user_name" name="user" type="text" class="text_field" placeholder="Enter your username...">
                                </div>
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input id="pass" name="password" type="password" class="text_field" placeholder="Enter your password...">
                                </div>
                                <div class="form-group">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" name="RememberAccount" id="ch2" value="true">
                                        <label for="ch2">
                                            <span class="shadow_checkbox"></span>
                                            <span class="label_text">Remember me</span>
                                        </label>
                                    </div>
                                </div>
                                <input type="submit" id="btn" class="btn btn--md btn-primary" name="validate" value="Login Now">
                                <div class="login_assist">
                                    <p class="recover">Lost your
                                        <a href="recover-pass.php">username</a> or
                                        <a href="recover-pass.php">password</a>?
                                    </p>
                                    <p class="signup">Don't have an
                                        <a href="signup.php">account</a>?
                                    </p>
                                </div>
                            </div><!-- end .login--form -->
                        </div><!-- end .cardify -->
                    </form>
                </div><!-- end .col-md-6 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .login_area -->
    <?php $main->footer(); ?>
    <style>
        #btn:focus {
            border: none;
        }
    </style>
</body>
<?php $main->script_src(); ?>

</html>