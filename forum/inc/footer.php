<?php
$info = "SELECT * FROM public_info";
$query = mysqli_query($conn, $info);
$rows = mysqli_fetch_array($query);

?>
<footer class="footer-area footer--light">
    <div class="footer-big">
        <!-- start .container -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <div class="widget-about">
                            <img src="img/footer-logo.png" alt="" class="img-fluid">
                            <p>Pellentesque facilisis the ullamcorp keer sapien interdum is the magna pellentesque
                                kequis
                                hasellus keur condimentum eleifend.</p>
                            <ul class="contact-details">
                                <li>
                                    <span class="icon-earphones"></span>
                                    Call Us:
                                    <a href="tel:<?php echo $rows['phone']; ?>"><?php echo $rows['phone']; ?></a>
                                </li>
                                <li>
                                    <span class="icon-envelope-open"></span>
                                    <a href="mailto:<?php echo $rows['support']; ?>"><?php echo $rows['support']; ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Ends: .footer-widget -->
                </div>
                <!-- end /.col-md-4 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-menu footer-menu--1">
                            <h5 class="footer-widget-title">Popular Category</h5>
                            <ul>
                                <li>
                                    <a href="#">Wordpress</a>
                                </li>
                                <li>
                                    <a href="#">Plugins</a>
                                </li>
                                <li>
                                    <a href="#">Joomla Template</a>
                                </li>
                                <li>
                                    <a href="#">Admin Template</a>
                                </li>
                                <li>
                                    <a href="#">HTML Template</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.footer-menu -->
                    </div>
                    <!-- Ends: .footer-widget -->
                </div>
                <!-- end /.col-md-3 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-menu">
                            <h5 class="footer-widget-title">Our Company</h5>
                            <ul>
                                <li>
                                    <a href="#">About Us</a>
                                </li>
                                <li>
                                    <a href="#">How It Works</a>
                                </li>
                                <li>
                                    <a href="#">Affiliates</a>
                                </li>
                                <li>
                                    <a href="#">Testimonials</a>
                                </li>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#">Plan & Pricing</a>
                                </li>
                                <li>
                                    <a href="#">Blog</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.footer-menu -->
                    </div>
                    <!-- Ends: .footer-widget -->
                </div>
                <!-- end /.col-lg-3 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-menu no-padding">
                            <h5 class="footer-widget-title">Help Support</h5>
                            <ul>
                                <li>
                                    <a href="#">Support Forum</a>
                                </li>
                                <li>
                                    <a href="#">Terms & Conditions</a>
                                </li>
                                <li>
                                    <a href="#">Support Policy</a>
                                </li>
                                <li>
                                    <a href="#">Refund Policy</a>
                                </li>
                                <li>
                                    <a href="#">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Buyers Faq</a>
                                </li>
                                <li>
                                    <a href="#">Sellers Faq</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.footer-menu -->
                    </div>
                    <!-- Ends: .footer-widget -->
                </div>
                <!-- Ends: .col-lg-3 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end /.footer-big -->
    <div class="mini-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright-text">
                        <p>&copy; 2021 - <?php echo date('Y'); ?>
                            <a><?Php echo $rows['site_name']; ?></a>. All rights reserved. Created by
                            <a href="https://danid.rf.gd">danid</a>
                        </p>
                    </div>
                    <div class="go_top">
                    <i class="bi bi-chat-dots"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>