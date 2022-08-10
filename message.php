<?php
require_once("inc/banned_ip_russia.php");
session_start();
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
    <section class="message_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_title">
                        <h3>Messages</h3>
                    </div><!-- ends: .content_title -->
                </div><!-- ends: .col-md-12 -->
            </div><!-- ends: .row -->
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="cardify messaging_sidebar">
                        <div class="messaging__header">
                            <div class="messaging_menu">
                                <a href="#" id="drop2" class="dropdown-toggle dropdown-trigger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="icon-drawer"></span>Inbox
                                    <span class="msg">6</span>
                                    <span class="icon-arrow-down"></span>
                                </a>
                                <ul class="dropdown messaging_dropdown dropdown-menu" aria-labelledby="drop2">
                                    <li>
                                        <a href="#">
                                            <span class="icon-drawer"></span>Inbox</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="icon-star"></span>Starred</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="icon-film"></span>Sent</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="icon-trash"></span>Trash</a>
                                    </li>
                                </ul>
                            </div><!-- ends: .messaging_menu -->
                            <div class="messaging_action">
                                <span class="icon-trash"></span>
                                <span class="icon-refresh"></span>
                                <a href="message-compose.html" class="btn btn--xs bg-white">
                                    <span class="icon-pencil"></span>
                                    <span class="text">Compose</span>
                                </a>
                            </div><!-- ends: .messaging_action -->
                        </div><!-- ends: .messaging__header -->
                        <div class="messaging__contents">
                            <div class="message_search">
                                <input type="text" placeholder="Search messages...">
                                <span class="icon-magnifier"></span>
                            </div>
                            <div class="messages">
                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch1">
                                                <label for="ch1">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="avatar">
                                            <img src="img/notification_head4.png" alt="">
                                        </div>
                                    </div><!-- ends: .message__actions_avatar -->
                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>NukeThemes</p>
                                                <span class="icon-envelope-open"></span>
                                            </div>
                                            <span class="time">Just now</span>
                                            <p>Hello John Smith! Nunc placerat mi</p>
                                        </div>
                                    </div><!-- ends: .message_data -->
                                </div><!-- ends: .message -->
                                <div class="message active">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch2">
                                                <label for="ch2">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="avatar">
                                            <img src="img/notification_head5.png" alt="">
                                        </div>
                                    </div><!-- ends: .message__actions_avatar -->
                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Crazy Coder</p>
                                                <span class="icon-envelope-open"></span>
                                            </div>
                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum</p>
                                        </div>
                                    </div><!-- ends: .message_data -->
                                </div><!-- ends: .message -->
                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch3">
                                                <label for="ch3">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="avatar">
                                            <img src="img/notification_head2.png" alt="">
                                        </div>
                                    </div><!-- ends: .message__actions_avatar -->
                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Hybrid Insane</p>
                                            </div>
                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum</p>
                                        </div>
                                    </div><!-- ends: .message_data -->
                                </div><!-- ends: .message -->
                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch4">
                                                <label for="ch4">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="avatar">
                                            <img src="img/notification_head3.png" alt="">
                                        </div>
                                    </div><!-- ends: .message__actions_avatar -->
                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>ThemeXylum</p>
                                            </div>
                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum</p>
                                        </div>
                                    </div><!-- ends: .message_data -->
                                </div><!-- ends: .message -->
                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch5">
                                                <label for="ch5">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="avatar">
                                            <img src="img/notification_head4.png" alt="">
                                        </div>
                                    </div><!-- ends: .message__actions_avatar -->
                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>NukeThemes</p>
                                                <span class="icon-envelope-open"></span>
                                            </div>
                                            <span class="time">Just now</span>
                                            <p>Hello John Smith! Nunc placerat mi</p>
                                        </div>
                                    </div><!-- ends: .message_data -->
                                </div><!-- ends: .message -->
                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch6">
                                                <label for="ch6">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="avatar">
                                            <img src="img/notification_head5.png" alt="">
                                        </div>
                                    </div><!-- ends: .message__actions_avatar -->
                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Crazy Coder</p>
                                                <span class="icon-envelope-open"></span>
                                            </div>
                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum</p>
                                        </div>
                                    </div><!-- ends: .message_data -->
                                </div><!-- ends: .message -->
                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch7">
                                                <label for="ch7">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="avatar">
                                            <img src="img/notification_head2.png" alt="">
                                        </div>
                                    </div><!-- ends: .message__actions_avatar -->
                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Hybrid Insane</p>
                                            </div>
                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum</p>
                                        </div>
                                    </div><!-- ends: .message_data -->
                                </div><!-- ends: .message -->
                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch8">
                                                <label for="ch8">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="avatar">
                                            <img src="img/notification_head3.png" alt="">
                                        </div>
                                    </div><!-- ends: .message__actions_avatar -->
                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>ThemeXylum</p>
                                            </div>
                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum</p>
                                        </div>
                                    </div><!-- ends: .message_data -->
                                </div><!-- ends: .message -->
                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch9">
                                                <label for="ch9">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="avatar">
                                            <img src="img/notification_head4.png" alt="">
                                        </div>
                                    </div><!-- ends: .message__actions_avatar -->
                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>NukeThemes</p>
                                                <span class="icon-envelope-open"></span>
                                            </div>
                                            <span class="time">Just now</span>
                                            <p>Hello John Smith! Nunc placerat id</p>
                                        </div>
                                    </div><!-- ends: .message_data -->
                                </div><!-- ends: .message -->
                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch10">
                                                <label for="ch10">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="avatar">
                                            <img src="img/notification_head5.png" alt="">
                                        </div>
                                    </div><!-- ends: .message__actions_avatar -->
                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Crazy Coder</p>
                                                <span class="icon-envelope-open"></span>
                                            </div>
                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum</p>
                                        </div>
                                    </div><!-- ends: .message_data -->
                                </div><!-- ends: .message -->
                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch11">
                                                <label for="ch11">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="avatar">
                                            <img src="img/notification_head2.png" alt="">
                                        </div>
                                    </div><!-- ends: .message__actions_avatar -->
                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Hybrid Insane</p>
                                            </div>
                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum</p>
                                        </div>
                                    </div><!-- ends: .message_data -->
                                </div><!-- ends: .message -->
                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch12">
                                                <label for="ch12">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="avatar">
                                            <img src="img/notification_head3.png" alt="">
                                        </div>
                                    </div><!-- ends: .message__actions_avatar -->
                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>ThemeXylum</p>
                                            </div>
                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum</p>
                                        </div>
                                    </div><!-- ends: .message_data -->
                                </div><!-- ends: .message -->
                            </div><!-- ends: .messages -->
                        </div><!-- ends: .messaging__contents -->
                    </div><!-- ends: .cardify -->
                </div><!-- ends: .col-md-5 -->
                <div class="col-lg-7 col-md-12">
                    <div class="chat_area cardify">
                        <div class="chat_area--title">
                            <h3>Message with <span class="name">Codepoet</span></h3>
                            <div class="message_toolbar">
                                <a href="#">
                                    <span class="icon-flag"></span>
                                </a>
                                <a href="#">
                                    <span class="icon-trash"></span>
                                </a>
                                <a href="#" id="drop1" class="dropdown-toggle dropdown-trigger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="img/menu_icon.png" class="dropdown-trigger" alt="Menu icon">
                                </a>
                                <ul class="dropdown dropdown-menu" aria-labelledby="drop1">
                                    <li>
                                        <a href="#">Mark as unread</a>
                                    </li>
                                    <li>
                                        <a href="#">Dropdown link</a>
                                    </li>
                                    <li>
                                        <a href="#">All Attachments</a>
                                    </li>
                                </ul><!-- ends: .dropdown -->
                            </div><!-- ends: .message_toolbar -->
                        </div><!-- ends: .chat_area--title -->
                        <div class="chat_area--conversation">
                            <div class="conversation">
                                <div class="head">
                                    <div class="chat_avatar">
                                        <img src="img/notification_head5.png" alt="Notification avatar">
                                    </div>
                                    <div class="name_time">
                                        <div>
                                            <h4>Codepoet</h4>
                                            <p>Mar 2, 2017 at 2:14 pm</p>
                                        </div>
                                        <span class="email">jonathan@domain.com</span>
                                    </div><!-- ends: .name_time -->
                                </div><!-- ends: .head -->
                                <div class="body">
                                    <p>Faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac. Donec vitae leo at sem lobortis porttitor eu conse quat risus. Mauris sed congue orci. Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue.</p>
                                </div><!-- ends: .body -->
                            </div><!-- ends: .conversation -->
                            <div class="conversation">
                                <div class="head">
                                    <div class="chat_avatar">
                                        <img src="img/notification_head4.png" alt="Notification avatar">
                                    </div>
                                    <div class="name_time">
                                        <div>
                                            <h4>AazzTech</h4>
                                            <p>Mar 2, 2017 at 2:14 pm</p>
                                        </div>
                                        <span class="email">Me</span>
                                    </div><!-- ends: .name_time -->
                                </div><!-- ends: .head -->
                                <div class="body">
                                    <p>Faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac. Donec vitae leo at sem lobortis porttitor eu conse quat risus. Mauris sed congue orci. Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue.</p>
                                </div><!-- ends: .body -->
                            </div><!-- ends: .conversation -->
                            <div class="conversation">
                                <div class="head">
                                    <div class="chat_avatar">
                                        <img src="img/notification_head5.png" alt="Notification avatar">
                                    </div>
                                    <div class="name_time">
                                        <div>
                                            <h4>Codepoet</h4>
                                            <p>Mar 2, 2017 at 2:14 pm</p>
                                        </div>
                                        <span class="email">jonathan@domain.com</span>
                                    </div><!-- ends: .name_time -->
                                </div><!-- ends: .head -->
                                <div class="body">
                                    <p>Faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac. Donec
                                        vitae leo at sem lobortis porttitor.</p>
                                    <div class="attachments">
                                        <div class="attachment_head">
                                            <p><span class="icon-paperclip"></span> 2 Attachments</p>
                                            <a href="#"><span class="icon-cloud-download"></span> Download</a>
                                        </div>
                                        <div class="attachment">
                                            <ul>
                                                <li>
                                                    <a href="img/att_av.jpg" class="venobox"><img src="img/att_av.jpg" alt="image attachment"></a>
                                                </li>
                                                <li>
                                                    <a href="img/att_av2.jpg" class="venobox"><img src="img/att_av2.jpg" alt="image attachment"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- ends: .body -->
                            </div><!-- ends: .conversation -->
                        </div><!-- ends: .chat_area--conversation -->
                        <div class="message_composer">
                            <div class="composer_field" id="trumbowyg-demo"></div><!-- ends: .trumbowyg-demo -->
                            <div class="attached"></div>
                            <div class="btns">
                                <button class="btn send btn--sm btn-primary">Reply</button>
                                <label for="att">
                                    <input type="file" class="attachment_field" id="att" multiple>
                                    <span class="icon-paper-clip"></span> Attachment
                                </label>
                            </div><!-- ends: .message_composer -->
                        </div><!-- ends: .message_composer -->
                    </div><!-- ends: .chat_area -->
                </div><!-- ends: .col-md-7 -->
            </div><!-- ends: .row -->
        </div><!-- ends: .container -->
    </section><!-- ends: .message_area -->
    <?php require_once("inc/footer.php"); ?>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
    <!-- inject:js-->
    <script src="vendor_assets/js/jquery/jquery-1.12.4.min.js"></script>
    <script src="vendor_assets/js/jquery/uikit.min.js"></script>
    <script src="vendor_assets/js/bootstrap/popper.js"></script>
    <script src="vendor_assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="vendor_assets/js/chart.bundle.min.js"></script>
    <script src="vendor_assets/js/grid.min.js"></script>
    <script src="vendor_assets/js/jquery-ui.min.js"></script>
    <script src="vendor_assets/js/jquery.barrating.min.js"></script>
    <script src="vendor_assets/js/jquery.countdown.min.js"></script>
    <script src="vendor_assets/js/jquery.counterup.min.js"></script>
    <script src="vendor_assets/js/jquery.easing1.3.js"></script>
    <script src="vendor_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="vendor_assets/js/owl.carousel.min.js"></script>
    <script src="vendor_assets/js/select2.full.min.js"></script>
    <script src="vendor_assets/js/slick.min.js"></script>
    <script src="vendor_assets/js/tether.min.js"></script>
    <script src="vendor_assets/js/trumbowyg.min.js"></script>
    <script src="vendor_assets/js/venobox.min.js"></script>
    <script src="vendor_assets/js/waypoints.min.js"></script>
    <script src="theme_assets/js/dashboard.js"></script>
    <script src="theme_assets/js/main.js"></script>
    <script src="theme_assets/js/map.js"></script>
    <!-- endinject-->
</body>

</html>