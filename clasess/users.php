<?php

class users extends createSQLq
{

    public $username;

    public function connect()
    {
        $this->db();
    }

    public function banned_ip_russian($status)
    {

        if ($status == true) {
            if (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $real_ip_adress = $_SERVER['HTTP_CLIENT_IP'];
            }

            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $real_ip_adress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $real_ip_adress = $_SERVER['REMOTE_ADDR'];
            }

            $cip = $real_ip_adress;
            $iptolocation = 'http://api.hostip.info/country.php?ip=' . $cip;
            $creatorlocation = file_get_contents($iptolocation);

            if ($creatorlocation == "RU") {
                header("location: https://" . $_SERVER['SERVER_NAME'] . "/banned.php");
            }
        }
    }

    public function GetName()
    {
        global $username;

        if (isset($_SESSION['account']['userData']['username'])) {

            $username = $_SESSION['account']['userData']['username'];

            $this->username = $username;
        }
    }

    public function logout()
    {
        $this->GetName();
        $username = $this->username;
        if (isset($_GET['logout']) && isset($username)) {
            unset($_SESSION['account']['userData']['username']);
            unset($_SESSION['cart']);
            unset($_SESSION['favorite']);
            header('location: /');
        }
    }

    public function checkLogged()
    {
        $this->GetName();
        $username = $this->username;
        if (!isset($username)) {
            header("location: /wait-zone.php");
        }
    }

    public function CheckNewIpLogged()
    {
        $username = $this->username;
        if (isset($username)) {
            $this->RunSql("SELECT * FROM users WHERE username='$username'", 'CheckNewIp', 'normal', true);
            $User_ip = $this->CheckNewIp;
            $ip = $_SERVER['REMOTE_ADDR'];
            if ($ip != $User_ip['row']['Ip Adress']) {
?>
                <style>
                    body {
                        overflow: hidden;
                    }
                </style>
                <?php
                if (isset($_POST['CheckNewIp'])) {
                    $password = $_POST['password'];
                    if (!empty($password)) {
                        if (password_verify($password, $User_ip['row']['password'])) {
                            $this->RunSql("UPDATE users SET `Ip Adress` = '$ip' WHERE username='$username'", 'NewIpAdress', '', true);
                            header("Refresh:0;");
                        } else {
                            $password_incorect = true;
                        }
                    } else {
                        $CompleteField = true;
                    }
                }
                ?>
                <div class="modal fade rating_modal show" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="rating_modal" bis_skin_checked="1" style="background-color: rgb(48 48 48 / 90%); display: block; padding-right: 25.9922px;">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" bis_skin_checked="1">
                        <div class="modal-content" bis_skin_checked="1">
                            <div class="modal-header" bis_skin_checked="1">
                                <h3 class="modal-title" id="rating_modal">I detected a new ip address</h3>
                            </div>
                            <!-- end /.modal-header -->

                            <div class="modal-body" bis_skin_checked="1">
                                <form action="" method="POST">
                                    <?php if (isset($password_incorect) && $password_incorect == true) { ?>
                                        <div class="alert alert-danger" role="alert" bis_skin_checked="1">
                                            Password is incorect
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($CompleteField) && $CompleteField == true) { ?>
                                        <div class="alert alert-danger" role="alert" bis_skin_checked="1">
                                            Please Complete Field
                                        </div>
                                    <?php } ?>
                                    <div class="rating_field" bis_skin_checked="1">
                                        <label for="rating_field">Password</label>
                                        <input type="password" name="password" placeholder="Password">
                                        <p class="notice">please enter the password to update the ip address</p>
                                    </div>
                                    <div class="btns m-top-40 d-flex" bis_skin_checked="1">
                                        <input type="submit" name="CheckNewIp" class="w-50 btn btn-lg btn-primary m-right-15" value="Check & Continue">
                                        <a href="/logout.php" style="margin-left: 10px;" class="w-50 btn btn-danger">Logout</a>
                                    </div>
                                </form>
                                <!-- end /.form -->
                            </div>
                            <!-- end /.modal-body -->
                        </div>
                    </div>
                </div>
        <?Php
            }
        }
        if (!empty($ip) && !empty($User_ip['row']['Ip Adress'])) {
            $this->ip = $ip;
            $this->user_ip = $User_ip['row']['Ip Adress'];
        }
    }

    public function CalculateExpireTemplatePlus($actualDate, $ExpireDate)
    {
        $date1 = new DateTime($actualDate);
        $date2 = new DateTime($ExpireDate);
        $interval = $date1->diff($date2);

        $this->interval = $interval;
        return $this->interval;
    }

    public function CheckExpireSession()
    {
        $actual_time = date("Y-m-d H:i:s");

        $duration = '+1 minutes';
        if (isset($_SESSION['expire']) && !empty($_SESSION['expire'])) {
            $expire = $_SESSION['expire'];
            if ($expire < $actual_time) {
                session_destroy();
                header("refresh:0;");
            }
        }
    }

    public function DefaultAvatarUser()
    {
        ?>
        <style>
            .UserAvatar {
                border-radius: 50%;
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
        <div class="rounded-circle UserAvatar"><?php echo $_SESSION['account']['userData']['username'][0]; ?></div>
<?php
    }

    public function __construct()
    {
        $this->connect();
        $this->GetName();
        $this->logout();
        $this->banned_ip_russian(true);
        $this->CheckExpireSession();

        $this->RunSql("SELECT * FROM users WHERE username = 'danid'", 'CheckUser', 'num', true);

        $check = $this->CheckUser;
        $username = $this->username;

        if ($check['row'] != 1) {
            unset($_SESSION['account']['userData']['username']);
            unset($_SESSION['cart']);
            unset($_SESSION['favorite']);
        }
    }
}
