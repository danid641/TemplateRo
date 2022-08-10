<?php
$conn = mysqli_connect("localhost", "root", "", "digital");
if (isset($_GET['image_id'])) {
    $id = $_GET['image_id'];
    if (empty($_GET['image_id'])) {
?>

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
            <link rel="stylesheet" href="https://templatero.rf.gd/assets/vendor_assets/css/bootstrap/bootstrap.css">
            <link rel="stylesheet" href="https://templatero.rf.gd/assets/vendor_assets/css/animate.css">
            <link rel="stylesheet" href="https://templatero.rf.gd/assets/vendor_assets/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://templatero.rf.gd/assets/vendor_assets/css/jquery-ui.css">
            <link rel="stylesheet" href="https://templatero.rf.gd/assets/vendor_assets/css/line-awesome.min.css">
            <link rel="stylesheet" href="https://templatero.rf.gd/assets/vendor_assets/css/magnific-popup.css">
            <link rel="stylesheet" href="https://templatero.rf.gd/assets/vendor_assets/css/owl.carousel.css">
            <link rel="stylesheet" href="https://templatero.rf.gd/assets/vendor_assets/css/select2.min.css">
            <link rel="stylesheet" href="https://templatero.rf.gd/assets/vendor_assets/css/simple-line-icons.css">
            <link rel="stylesheet" href="https://templatero.rf.gd/assets/vendor_assets/css/slick.css">
            <link rel="stylesheet" href="https://templatero.rf.gd/assets/vendor_assets/css/trumbowyg.min.css">
            <link rel="stylesheet" href="https://templatero.rf.gd/assets/vendor_assets/css/venobox.css">
            <link rel="stylesheet" href="https://templatero.rf.gd/assets/css/style.css">
            <!-- endinject -->
            <!-- Favicon Icon -->
            <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-32x32.png">
        </head>
        <section class="four_o_four_area section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <span style="font-size: 100px; text-shadow: 10px 10px 10px rgb(179, 172, 172); color: rgb(135, 134, 134);">404</span>
                        <div class="not_found">
                            <h2>Oops! Image Not Found</h2>
                            <a href="https://templatero.rf.gd" class="btn btn--md btn-primary">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    } else {
        $sql = "SELECT imageType,imageData FROM images WHERE ImageId='$id'";
        $result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
        $row = mysqli_fetch_array($result);
        header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];
        mysqli_close($conn);

    }
}
