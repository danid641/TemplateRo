<?php
require('../autoload.php');
session_start();

class Controller extends users
{

    public function __construct()
    {
        global $main;
        $main = new main;
    }
}

$controller = new controller;

?>
<!doctype HTML>
<html lang="en">

<head>
    <title>404</title>
    <?php $main->head(); ?>
</head>

<body class="preload">
    <?php $main->menu(); ?>
    <!-- START 404 AREA -->
    <section class="four_o_four_area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <span style="font-size: 100px; text-shadow: 10px 10px 10px rgb(179, 172, 172); color: rgb(135, 134, 134);">400</span>
                    <div class="not_found">
                        <h2>Bad Request</h2>
                        <a href="https://templatero.rf.gd" class="btn btn--md btn-primary">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- ends: .four_o_four_area -->
    <?php $main->footer(); ?>
</body>
<?php $main->script_src(); ?>

</html>