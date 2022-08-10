<?php

if (isset($_SERVER['HTTP_CLIENT_IP']))
{
    $real_ip_adress = $_SERVER['HTTP_CLIENT_IP'];
}

if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
{
    $real_ip_adress = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else
{
    $real_ip_adress = $_SERVER['REMOTE_ADDR'];
}

$cip = $real_ip_adress;
$iptolocation = 'http://api.hostip.info/country.php?ip='. $cip;
$creatorlocation = file_get_contents($iptolocation);

if($creatorlocation != "RU"){
   header("location: https://".$_SERVER['SERVER_NAME']."/error/403.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>мы поддерживаем украину!</title>
    <link rel="icon" type="image/png" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>/assets/img/logo/icon.png">
</head>
<body>
<style>
    body{
        width: 98%;
        height: 97vh;
        background-image: url("https://upload.wikimedia.org/wikipedia/commons/4/49/Flag_of_Ukraine.svg");
        background-size: cover;
    }
.cl{
    width: 100%;
    height: 50vh;
    justify-content:center;
    align-items:center;
    display:flex;
}

 .cl2{
 width: 100%;
 justify-content: center;
 flex-wrap: wrap;
 display: flex;
}

video{
    margin-left: 5px;
    margin-top: 10px;
}
</style>
<div class="cl">
    
<div>
<h1>Русские IP запрещены, извините!</h1>
<h2 style="text-align:center;">мы поддерживаем украину!</h2> 
<p style="text-align: center;">#stopwar #остановить войну</p>
</div>
</div>
<div class="cl2">
<video width="320" height="240" controls autoplay muted loop>
  <source src="https://video.twimg.com/ext_tw_video/1498787338088062981/pu/vid/640x360/Bjnh8P4De_gpm08p.mp4?tag=12" type="video/mp4">
</video>
<video width="320" height="240" controls autoplay muted loop>
  <source src="https://video.twimg.com/ext_tw_video/1498694850241347586/pu/vid/480x270/Dw7g4aBAi3Y-FiPk.mp4?tag=12" type="video/mp4">
</video>

    <video width="320" height="240" controls autoplay muted loop>
    <source src="https://video.twimg.com/ext_tw_video/1498776791846207491/pu/vid/320x426/8mPSDV6yhj0S4eyM.mp4?tag=12" type="video/mp4">
    </video>

    <video width="320" height="240" controls autoplay muted loop>
    <source src="https://video.twimg.com/ext_tw_video/1498612065589776385/pu/vid/320x566/9MJKIBipTOIZz_hH.mp4?tag=12" type="video/mp4">
    </video>
</div>
</body>
</html>