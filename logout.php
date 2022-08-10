<?Php
require_once("inc/banned_ip_russia.php");
session_start();
session_destroy();
header("location: https://".$_SERVER['SERVER_NAME']."/");