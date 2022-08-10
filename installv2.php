<?Php
require_once("inc/banned_ip_russia.php");
include "inc/install_verify.php";

session_start();
// if checked = true then login mode is enabled, if check = false then login mode is disabled
$check = false;
//<!-------------------------------------------------------------!>//
if (isset($_POST['validate_account'])) {
  if ($check == true) {
    $email = "daniromaniahd@gmail.com";
    $pass = "danid123";

    $pass1 = $_POST['pass1'];
    $em = $_POST['email'];
    if (!empty($pass1) && !empty($em)) {
      if ($email == $em && $pass == $pass1) {
        $_SESSION['permision'] = $email;
      } else {
        echo "email or password is incorect";
      }
    }
  }
}
//<!-------------------------------------------------------------!>//
if ($installed == false) {
  if (isset($_POST['validate'])) {
    if (isset($_SESSION['permision']) or $check == false) {
      error_reporting(E_PARSE);
      $host_db = $_POST['host'];
      $username_db = $_POST['username'];
      $password_db = $_POST['password'];
      $database = $_POST['database'];

      $link = mysqli_connect("$host_db", "$username_db", "");

      // Check connection
      if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
      }

      // Attempt create database query execution
      $sql = "CREATE DATABASE IF NOT EXISTS $database";
      if (mysqli_query($link, $sql)) {
        echo "Database created successfully";
      } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }

      // Close connection
      mysqli_close($link);

      $con = mysqli_connect("$host_db", "$username_db", "$password_db", "$database");
      //<!-------------------------------------------------------------!>//
      $myfile = fopen("inc/connect.php", "w");

      $txt = '    <?php
      $host = "' . $host_db . '";
      $username = "' . $username_db . '";
      $password = "' . $password_db . '";
      $database = "' . $database . '";
      
      $conn = mysqli_connect($host,$username, $password, $database) or die("<style>body {background-image: url("https://5.imimg.com/data5/DZ/WI/LU/SELLER-6814007/repair-maintenance-500x500.png");background-repeat: no-repeat;background-position: center;margin: 0;padding: 0;}.error {justify-content: center;align-items: center;display: flex;width: 100%;height: 100vh;} .pos{color: orange; background-color: black; text-align: center;}</style><div class="error"><div class="pos"><h1>internal server error</h1><br/><span>please contact developer </span><a href="forum.templatero.rf.gd">https://forum.templatero.rf.gd</a><p>twitter: danid122</p><p>instagram: ___danid___122</p></div></div>");
      
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
      $install_verify = fopen("inc/install_verify.php", "w");

      $txt_install_verify = '<?php $installed = true; ?>';
      fwrite($install_verify, $txt_install_verify);
      fclose($install_verify);
      //<!-------------------------------------------------------------!>//
      $paypal_db = fopen("db_connection.php", "w");

      $txt_paypal_db =
        '
      <?php

$db_conn = mysqli_connect("' . $host_db . '", "' . $username_db . '", "' . $password_db . '", "' . $database . '");
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

      $sql_contactUS = "CREATE TABLE `contact-us` (
        `id` int(11) NOT NULL,
        `username` varchar(600) NOT NULL,
        `email` varchar(600) NOT NULL,
        `message` varchar(600) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

      $sql_category = "CREATE TABLE `category` (
          `id` int(11) NOT NULL,
          `category name` varchar(222) NOT NULL,
          `tag` varchar(222) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
      //<!-------------------------------------------------------------!>//
      $sql_comments = "CREATE TABLE `comment` (
          `id` int(11) NOT NULL,
          `user` longtext NOT NULL,
          `product` longtext NOT NULL,
          `comment` longtext NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
      //<!-------------------------------------------------------------!>//
      $sql_favorite = "CREATE TABLE `favorite` (
          `id` int(11) NOT NULL,
          `product` int(11) NOT NULL,
          `creator` varchar(1111) NOT NULL,
          `owner` varchar(1111) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
      //<!-------------------------------------------------------------!>//
      $sql_follow = "CREATE TABLE `folllow` (
          `id` int(11) NOT NULL,
          `followers` varchar(1111) NOT NULL,
          `username` varchar(1111) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
      //<!-------------------------------------------------------------!>//
      $sql_library = "CREATE TABLE `library` (
          `id` int(11) NOT NULL,
          `Product id` int(11) NOT NULL,
          `license` varchar(1111) NOT NULL,
          `creator` varchar(1111) NOT NULL,
          `owner` varchar(1111) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
      //<!-------------------------------------------------------------!>//
      $sql_methodPay = "CREATE TABLE `method payment` (
          `id` int(11) NOT NULL,
          `username` varchar(1111) NOT NULL,
          `paypal` varchar(1111) NOT NULL,
          `skrill` varchar(1111) NOT NULL,
          `type` varchar(1111) NOT NULL,
          `number` int(11) NOT NULL,
          `expire date` date NOT NULL,
          `pin` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
      //<!-------------------------------------------------------------!>//
      $sql_notification = "CREATE TABLE `notification` (
          `id` int(11) NOT NULL,
          `from_users` varchar(1111) NOT NULL,
          `type` varchar(1111) NOT NULL,
          `message` varchar(1111) NOT NULL,
          `purchased` mediumtext NOT NULL,
          `message_from` varchar(11111) NOT NULL,
          `added by` varchar(1111) NOT NULL,
          `comented_on` varchar(100) NOT NULL,
          `by_users` varchar(111) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
      //<!-------------------------------------------------------------!>//
      $sql_premium = "CREATE TABLE `premium` (
          `id` int(11) NOT NULL,
          `username` varchar(200) NOT NULL,
          `premium get` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
      //<!-------------------------------------------------------------!>//
      $sql_Products = "CREATE TABLE `products` (
          `id` int(11) NOT NULL,
          `status` varchar(1111) NOT NULL,
          `creator` varchar(1111) NOT NULL,
          `category` varchar(1111) NOT NULL,
          `posted_on` date DEFAULT NULL,
          `Product Name` varchar(1111) NOT NULL,
          `Live Demo` varchar(1111) NOT NULL,
          `description` varchar(1111) NOT NULL,
          `Tags` varchar(1111) NOT NULL,
          `Main Image` varchar(1111) NOT NULL,
          `Main File` varchar(1111) NOT NULL,
          `Product Price` int(11) NOT NULL,
          `Files Included` mediumtext NOT NULL,
          `Columns` mediumtext NOT NULL,
          `Compatible Browser` mediumtext NOT NULL,
          `Minimum Software` mediumtext NOT NULL,
          `High Resolution` mediumtext NOT NULL,
          `Responsive Layout` mediumtext NOT NULL,
          `Retina Ready` mediumtext NOT NULL,
          `Item Dimensions` mediumtext NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
      //<!-------------------------------------------------------------!>//
      $sql_publicInfo = "CREATE TABLE `public_info` (
          `id` int(11) NOT NULL,
          `site_name` varchar(200) NOT NULL,
          `support` varchar(200) NOT NULL,
          `phone` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
      //<!-------------------------------------------------------------!>//
      $sql_reply = "CREATE TABLE `reply` (
          `id` int(11) NOT NULL,
          `comment id` int(11) NOT NULL,
          `user` longtext NOT NULL,
          `reply from` longtext NOT NULL,
          `product` longtext NOT NULL,
          `comment` longtext NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
      //<!-------------------------------------------------------------!>//     
      $sql_subscribe = "CREATE TABLE `reply` (
          `id` int(11) NOT NULL,
          `comment id` int(11) NOT NULL,
          `user` longtext NOT NULL,
          `reply from` longtext NOT NULL,
          `product` longtext NOT NULL,
          `comment` longtext NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
      //<!-------------------------------------------------------------!>//
      $sql_transaction =  "CREATE TABLE `transaction` (
          `id` int(11) NOT NULL,
          `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
          `adress` mediumtext COLLATE utf8_unicode_ci NOT NULL,
          `product_id` int(10) DEFAULT NULL,
          `transaction_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
          `payment_amount` float(10,2) NOT NULL,
          `currency_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
          `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
          `invoice_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
          `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
          `createdtime` datetime DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
      //<!-------------------------------------------------------------!>//
      $sql_image = "CREATE TABLE `images` (
          `imageType` varchar(255) NOT NULL,
          `imageData` longblob NOT NULL,
          `ImageId` longtext NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
      //<!-------------------------------------------------------------!>//
      $query_image = mysqli_query($con, $sql_image); //                 !>//
      //<!-------------------------------------------------------------!>//
      $query_contact = mysqli_query($con, $sql_contactUS); //           !>//
      //<!-------------------------------------------------------------!>//
      $query_category = mysqli_query($con, $sql_category); //           !>//
      //<!-------------------------------------------------------------!>//
      $query_comments = mysqli_query($con, $sql_comments); //           !>//
      //<!-------------------------------------------------------------!>//
      $query_favorite = mysqli_query($con, $sql_favorite); //           !>//
      //<!-------------------------------------------------------------!>//
      $query_Products = mysqli_query($con, $sql_Products); //           !>//
      //<!-------------------------------------------------------------!>//
      $query_follow = mysqli_query($con, $sql_follow); //               !>//
      //<!-------------------------------------------------------------!>//
      $query_methodPay = mysqli_query($con, $sql_library); //           !>//
      //<!-------------------------------------------------------------!>//
      $query_methodPay = mysqli_query($con, $sql_methodPay); //         !>//
      //<!-------------------------------------------------------------!>//
      $query_notification = mysqli_query($con, $sql_notification); //   !>//
      //<!-------------------------------------------------------------!>//
      $query_premium = mysqli_query($con, $sql_premium); //             !>//
      //<!-------------------------------------------------------------!>//
      $query_publicInfo = mysqli_query($con, $sql_publicInfo); //       !>//
      //<!-------------------------------------------------------------!>//
      $query_reply = mysqli_query($con, $sql_reply); //                 !>//
      //<!-------------------------------------------------------------!>//
      $query_subscribe = mysqli_query($con, $sql_subscribe); //         !>//
      //<!-------------------------------------------------------------!>//
      $query_transaction = mysqli_query($con, $sql_transaction); //     !>//
      //<!-------------------------------------------------------------!>//
      $query_users = mysqli_query($con, $sql_users); //                 !>//
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
  <title>install theme</title>
  <style>
    h1 {
      color: #787a79;
    }

    body {
      margin: 0;
      padding: 0;
    }

    .col-md1 {
      width: 100%;
      height: 100vh;
      justify-content: center;
      align-items: center;
      display: flex;
    }

    .container {
      width: 400px;
      height: 500px;
      background-color: #1b1c1b;
      border: #aec5c5 2px solid;
      justify-content: center;
      align-items: center;
      display: flex;
      flex-direction: column;
      border-radius: 5px;
    }

    .inp {
      padding: 10px;
      width: 300px;
      border-radius: 10px;
      margin-top: 20px;
      border: transparent;
      background-color: #000;
      color: #fff;
    }

    .inp:focus {
      outline: 1px solid #bcbcbc;
    }

    .btn-submit {
      margin-top: 50px;
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
  </style>
</head>

<body>
  <?php
  if ($installed == false) {
    if ($check == false or isset($_SESSION['permision'])) {

  ?>
      <form action="" method="POST" autocomplete="off">
        <div class="col-md1">
          <div class="container">
            <h1>welcome to templatero</h1>
            <div class="hostName">
              <input type="text" class="inp" placeholder="host name" name="host">
            </div>
            <div class="username">
              <input type="text" class="inp" placeholder="username" name="username">

            </div>
            <div class="password">
              <input type="password" class="inp" placeholder="password" name="password">
            </div>
            <div class="database">
              <input type="text" class="inp" placeholder="database" name="database">
            </div>
            <Div class="btn-submit">
              <input type="submit" class="btn" name="validate" value="install">
            </Div>
          </div>
        </div>
      </form>
    <?php
    } else {
    ?>
      <form action="" method="POST" autocomplete="off">
        <div class="col-md1">
          <div class="container">
            <h1>welcome to templatero</h1>
            <div class="email">
              <input type="email" class="inp" placeholder="email" name="email">
            </div>
            <div class="password">
              <input type="password" class="inp" placeholder="password" name="pass1">
            </div>
            <Div class="btn-submit">
              <input type="submit" class="btn" name="validate_account" value="login">
            </Div>
          </div>
        </div>
      </form>
    <?Php
    }
  } else {
    ?>
    <div style="height: 100vh; justify-content:center; align-items:center; display:flex; ">
      <span style="font-size: 23px;color: red; margin-right: 2px;">!!</span>
      <p style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 20px;">theme is installed</p><span style="font-size: 23px;color: red; margin-left: 2px;">!!</span>
      <div style="height: 100vh; justify-content:center; align-items:center; display:flex; flex-direction:column; position:absolute; margin-top: 200px;">
        <b>if you entered something wrong go to the folder: inc / install_verify.php and instead of true put false</b>
      </div>
    </div>
  <?php
  }
  ?>
</body>
<script>

</script>

</html>