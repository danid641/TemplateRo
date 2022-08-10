<?php require_once 'inc/banned_ip_russia.php';
include 'inc/install_verify.php';

session_start();
// if checked = true then login mode is enabled, if check = false then login mode is disabled
$check = true;

//<!-------------------------------------------------------------!>//
if (isset($_POST['validate_account'])) {
  if ($check == true) {
    $email = 'daniromaniahd@gmail.com';
    $pass = 'danid123';
    $security_code = 879;

    if (strlen($security_code) == 4) {
    }

    $pass1 = $_POST['pass1'];
    $em = $_POST['email'];
    if (!empty($pass1) && !empty($em)) {
      if ($email == $em && $pass == $pass1) {
        $_SESSION['permision'] = $email;
      } else {
        $password_incorect = true;
      }
    } else {
      $requires_all_fields = true;
    }
  }
}
//<!-------------------------------------------------------------!>//

if ($installed == false) {
  if (
    isset($_POST['validate']) && !empty($_POST['host']) or
    !empty($_POST['username']) or
    !empty($_POST['password']) or
    !empty($_POST['database'])
  ) {
    $host_db = $_POST['host'];
    $username_db = $_POST['username'];
    $password_db = $_POST['password'];
    $database = $_POST['database'];

    if (isset($_SESSION['permision']) or $check == false) {
      error_reporting(E_PARSE);
      $link = mysqli_connect("$host_db", "$username_db", '');

      // Check connection
      if ($link === false) {
        die('ERROR: Could not connect. ' . mysqli_connect_error());
      }

      // Attempt create database query execution
      $sql = "CREATE DATABASE IF NOT EXISTS $database";
      if (mysqli_query($link, $sql)) {
        echo 'Database created successfully';
      } else {
        echo "ERROR: Could not able to execute $sql. " .
          mysqli_error($link);
      }

      // Close connection
      mysqli_close($link);

      $con = mysqli_connect(
        "$host_db",
        "$username_db",
        "$password_db",
        "$database"
      );
      //<!-------------------------------------------------------------!>//
      $myfile = fopen("inc/connect.php", "w");

      $txt = '    <?php
      $host = "' . $host_db . '";
      $username = "' . $username_db . '";
      $password = "' . $password_db . '";
      $database = "' . $database . '";
      
      $conn = mysqli_connect($host,$username, $password, $database);
      
      if (!$conn) 
      {
          die ("Could not connect to the database host: ". mysqli_connect_error());
      }
               
      //Set the character set of the connection
      if(!mysqli_set_charset ( $conn , "UTF8" ))
      {
          die("mysqli_set_charset() failed");
      }
      ?>
      ';
      fwrite($myfile, $txt);
      fclose($myfile);
      //<!-------------------------------------------------------------!>//
      $paypal_db = fopen('db_connection.php', 'w');

      $txt_paypal_db =
        '
      <?php

$db_conn = mysqli_connect("' .
        $host_db .
        '", "' .
        $username_db .
        '", "' .
        $password_db .
        '", "' .
        $database .
        '");
// Check connection
if($db_conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
error_reporting(E_ALL);
ini_set("display_errors","Off");

?>
      ';
      fwrite($paypal_db, $txt_paypal_db);
      fclose($paypal_db);
      //<!-------------------------------------------------------------!>//

    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta Http-equiv=”refresh” content=”60; write_the_url_of_the_page_to_be_tested_over_here.html”>
  <title>install theme</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" />
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    .app {
      background-color: #2b2a2a;
      width: 100%;
      height: 100vh;
      align-items: center;
      justify-content: center;
      display: flex;
    }

    .col {
      padding: 15px;
      border-radius: 5px;
      background-color: #0f0f0f;
      width: 400px;
      height: 500px;
    }

    .form-group {
      padding-top: 10px;
    }

    .form-group:last-child {
      display: flex;
      justify-content: center;
      margin-top: 50px;
    }

    .form-content {
      width: inherit;
      height: inherit;
      align-items: center;
      flex-direction: column;
      justify-content: center;
      display: flex;
    }

    .style1 {
      padding: 10px;
      width: 300px;
      border-radius: 10px;
      border: transparent;
      background-color: #000;
      color: #fff;
    }

    .style1:focus {
      outline: transparent;
    }

    .btn {
      width: 100px;
      height: 40px;
      border-radius: 10px;
      background-color: #000;
      border: 1px solid #202121;
      cursor: pointer;
      color: #787a79;
    }

    .btn:hover {
      background-color: #121111;
    }

    @media (max-width: 460px) {
      .col {
        width: 390px;
      }
    }

    @media (max-width: 441px) {
      .col {
        width: 350px;
      }
    }

    @media (max-width: 441px) {
      .col {
        width: 350px;
      }
    }

    @media (max-width: 400px) {
      .col {
        width: 320px;
      }
    }

    @media (max-width: 380px) {
      .col {
        width: 290px;
      }

      .style1 {
        width: 250px;
      }
    }

    @media (max-width: 340px) {
      .col {
        width: 260px;
      }
    }

    @media (max-width: 310px) {
      .col {
        width: 220px;
      }

      .style1 {
        width: 200px;
      }
    }

    @media (max-width: 280px) {
      .col {
        width: 150px;
      }

      .style1 {
        width: 130px;
      }

      .logo {
        font-size: 19px;
      }
    }

    @media (max-width: 200px) {
      .col {
        width: 140px;
      }

      .style1 {
        width: 120px;
      }
    }

    .alert {
      width: 320px;
      height: 50px;
      justify-content: space-around;
      align-items: center;
      display: flex;
      -webkit-border-radius: 3px;
      border-radius: 3px;
      font-size: 16px;
      margin-bottom: 30px;
      position: relative;
    }

    .alert-warning {
      background-color: rgba(255, 184, 34, 0.1);
      color: #ffb822;
      border: 1px solid rgba(255, 184, 34, 0.1);
    }

    .alert-error {
      background-color: #feedf0;
      color: #f4516c;
      border: 1px solid #fcced6;
    }

    .bi-x-circle {
      cursor: pointer;
    }

    .bi-box-arrow-left {
      color: #f4516c;
      font-size: 30px;
      cursor: pointer;
    }

    .menu {
      display: flex;
      justify-content: space-around;
    }

    .logo {
      color: #787a79;
    }

    .logo::selection {
      background-color: transparent;
    }

    .icon-menu {
      font-size: 30px;
      cursor: pointer;
    }

    .icon-menu:nth-child(1) {
      color: gray;
    }

    .social-bar {
      height: 50px;
      justify-content: center;
      align-items: center;
      display: flex;
    }

    ul li {
      border-radius: 100%;
      padding: 5px;
      background-color: #000;
      float: left;
      margin-left: 10px;
      list-style: none;
      cursor: pointer;
    }

    ul li a {
      color: #fff;
    }

    ul li:hover {
      background-color: #121111;
    }


    .justify-content-center {
      justify-content: center;
    }

    .align-items-center {
      align-items: center;
    }

    .flex-direction-column {
      flex-direction: column;
    }

    .d-flex {
      display: flex;
    }

    .w-100 {
      width: inherit;
    }

    .h-100 {
      height: inherit;
    }
  </style>
</head>

<body>
  <div class="app">
    <?php if ($installed == false) {
      if ($check == false or isset($_SESSION['permision'])) { ?>
        <form action="" id="submit_data" method="POST">
          <div class="col" id="db_config">
            <div class="menu">
              <b></b>
              <h1 class="logo">
                TemplateRo
              </h1>
              <i class="bi bi-box-arrow-left" id="logout"></i>
            </div>
            <h2>database config</h2>
            <div class="form-content">
              <form action="" method="POST" autocomplete="off">
                <div class="form-group">
                  <input class="style1" type="text" name="host" placeholder="HostName" id="" />
                </div>
                <div class="form-group">
                  <input class="style1" type="text" name="username" placeholder="UserName" id="" />
                </div>
                <div class="form-group">
                  <input class="style1" type="password" name="password" placeholder="Password" id="" />
                </div>
                <div class="form-group">
                  <input class="style1" type="text" name="database" placeholder="Database" id="" />
                </div>
                <div class="form-group">
                  <button role="button" id="next-1" onclick="return false;" class="btn">next</button>
                </div>
              </form>
              <div class="social-bar">
                <ul>
                  <li><a href="https://discord.gg/x6yCHQPZmN"><i class="bi bi-discord"></i></a></li>
                  <li><a href="https://www.instagram.com/___danid___122/"><i class="bi bi-instagram"></i></a></li>
                  <li><a href="https://twitter.com/danid45374247"><i class="bi bi-twitter"></i></a></li>
                  <li><a href="https://github.com/danid641"><i class="bi bi-github"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-----------------stripe---------------------->
          <div class="col" id="stripe-config" style="display: none;">
            <div class="menu">
              <b></b>
              <h1 class="logo">
                TemplateRo
              </h1>
              <i class="bi bi-box-arrow-left" id="logout"></i>
            </div>
            <h2>stripe config</h2>
            <div class="form-content">
              <div class="form-group">
                <input class="style1" type="password" name="secret_key_stripe" placeholder="stripe secret key" id="" />
              </div>
              <div class="form-group">
                <input class="style1" type="text" name="publishable_key_stripe" placeholder="stripe publishable key" id="" />
              </div>
              <div class="form-group">
                <button role="button" id="next-2" onclick="return false;" class="btn">next</button>
              </div>
              <div class="social-bar">
                <ul>
                  <li><a href="https://discord.gg/x6yCHQPZmN"><i class="bi bi-discord"></i></a></li>
                  <li><a href="https://www.instagram.com/___danid___122/"><i class="bi bi-instagram"></i></a></li>
                  <li><a href="https://twitter.com/danid45374247"><i class="bi bi-twitter"></i></a></li>
                  <li><a href="https://github.com/danid641"><i class="bi bi-github"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col" id="paypal_Config" style="display: none;">
            <div class="menu">
              <b></b>
              <h1 class="logo">
                TemplateRo
              </h1>
              <i class="bi bi-box-arrow-left" id="logout"></i>
            </div>
            <h2>paypal config</h2>
            <div class="form-content">
              <div class="form-group">
                <input class="style1" type="password" name="secret_key_paypal" placeholder="paypal secret key" id="" />
              </div>
              <div class="form-group">
                <input class="style1" type="text" name="publishable_key_paypal" placeholder="paypal publishable key" id="" />
              </div>
              <div class="form-group">
                <input class="btn" type="submit" onclick="return true;" id="install" name="validate" value="install">
              </div>
              <div class="social-bar">
                <ul>
                  <li><a href="https://discord.gg/x6yCHQPZmN"><i class="bi bi-discord"></i></a></li>
                  <li><a href="https://www.instagram.com/___danid___122/"><i class="bi bi-instagram"></i></a></li>
                  <li><a href="https://twitter.com/danid45374247"><i class="bi bi-twitter"></i></a></li>
                  <li><a href="https://github.com/danid641"><i class="bi bi-github"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </form>
      <?php } else { ?>
        <div class="col">
          <h1 style="text-align: center; color: #787a79;">TemplateRo</h1>
          <div class="form-content">
            <?php
            if (isset($password_incorect) && $password_incorect == true) {
            ?>
              <div class="alert alert-error">
                <i class="bi bi-exclamation-circle"></i>
                <p>Password or username is incorect</p>
                <i class="bi bi-x-circle" id="close" style="color: gray;"></i>
              </div>
            <?php
            }
            ?>
            <?php
            if (isset($requires_all_fields) && $requires_all_fields == true) {
            ?>
              <div class="alert alert-warning">
                <i class="bi bi-exclamation-circle"></i>
                <p>requires all fields</p>
                <i class="bi bi-x-circle" id="close" style="color: gray;"></i>
              </div>
            <?php
            }
            ?>
            <form action="" method="POST" autocomplete="off">
              <div class="form-group">
                <input class="style1" type="text" name="email" placeholder="Email" id="" />
              </div>

              <div class="form-group">
                <input class="style1" type="password" name="pass1" placeholder="Password" id="" />
              </div>

              <div class="form-group">
                <input class="btn" type="submit" name="validate_account" id="" value="Login" />
              </div>
            </form>
            <div class="social-bar">
              <ul>
                <li><a href="https://discord.gg/x6yCHQPZmN"><i class="bi bi-discord"></i></a></li>
                <li><a href="https://www.instagram.com/___danid___122/"><i class="bi bi-instagram"></i></a></li>
                <li><a href="https://twitter.com/danid45374247"><i class="bi bi-twitter"></i></a></li>
                <li><a href="https://github.com/danid641"><i class="bi bi-github"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      <?php }
    } else {
      ?>
      <div class="col">
        <h1 style="text-align: center; color: #787a79;">TemplateRo</h1>
        <div class="justify-content-center align-items-center flex-direction-column d-flex w-100 h-100 ">
          <h2 style="color: #fff; text-align:center;">theme is installed</h2>
          <p style="color: #fff; text-align:center;">if you entered something wrong go to the folder: inc / install_verify.php and instead of true put false</p>
          <div class="social-bar">
            <ul>
              <li><a href="https://discord.gg/x6yCHQPZmN"><i class="bi bi-discord"></i></a></li>
              <li><a href="https://www.instagram.com/___danid___122/"><i class="bi bi-instagram"></i></a></li>
              <li><a href="https://twitter.com/danid45374247"><i class="bi bi-twitter"></i></a></li>
              <li><a href="https://github.com/danid641"><i class="bi bi-github"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    <?php

    } ?>
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  const logout = document.getElementById("logout");

  $("#next-1").click(function() {
    $("#db_config").hide(1000);
    $("#stripe-config").show(1000);
  });


  $("#next-2").click(function() {
    $("#stripe-config").hide(1000);
    $("#paypal_Config").show(1000)
  });

  install.addEventListener("click", () => {
    document.getElementById("submit_data").submit();
    window.history.replaceState(null, null, window.location.href);
  });

  logout.addEventListener("click", () => {
    window.location.replace("logout");
  });

  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

</html>