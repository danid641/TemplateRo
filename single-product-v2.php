<?php
include 'autoload.php';
session_start();

class PageController extends users
{
    public $error_empty_id;
    public function __construct()
    {
        global $error_empty_id;
        global $username;
        global $conn;
        global $rw;
        global $rowsss;
        global $total_sales;
        global $total_favorites;
        global $check_templateplus;
        global $check_expire;
        global $creator;

        $this->db();
        $this->GetName();

        $conn = $this->conn;
        $username = $this->username;


        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];

            $this->RunSql("SELECT * FROM products WHERE id='$id'", 'check_exist_product', 'num', true);
            $this->RunSql("SELECT * FROM TemplatePlus WHERE username='$username'", 'check_TemplatePlus', 'normal', true);
            $check_templateplus = $this->check_TemplatePlus;
            $check_exist_product = $this->check_exist_product;

            if ($check_exist_product['row'] == 1) {

                $this->RunSql("SELECT * FROM products WHERE id='$id'", 'ProductData', 'normal', true);
                $rw = $this->ProductData;

                $this->RunSql("SELECT * FROM users WHERE username='" . $rw['row']['creator'] . "'", 'rowsss', 'normal', true);
                $rowsss = $this->rowsss;

                $this->RunSql("SELECT * FROM library WHERE `Product id`='$id'", 'total_sales', 'num', true);
                $total_sales = $this->total_sales;

                $this->RunSql("SELECT * FROM favorite WHERE `Product`='" . $rw['row']['id'] . "'", 'total_favorites', 'num', true);
                $total_favorites = $this->total_favorites;
            } else {
                return $error_empty_id = true;
            }
        } else {
            return $error_empty_id = true;
        }

        $expire_define = $check_templateplus['row']['expire'];
        $actual = date('Y-m-d h:m:s');

        $actualdateuse = new DateTime($actual);
        $comparedateuse = new DateTime($expire_define);
        $check_expire = $actualdateuse->diff($comparedateuse)->format("%r%a");

        $creator = $rw['row']['creator'];

        if (isset($_POST['GetProductFree'])) {
            if ($check_expire >= 1) {
                if ($creator != $username) {
                    $this->RunSql("INSERT INTO library (`Product id`, `creator`, `owner`) VALUE ('$id','$creator', '$username')", 'AddInLibrary', 'normal', true);
                }
            }
        }
    }
}

$main = new main;
$product = new product;

$controller = new PageController;

if ($check_expire >= 1) {
    $TemplatePlus = true;
} else {
    $TemplatePlus = false;
}

?>
<!doctype HTML>
<html lang="en">

<head>
    <?php $main->head(); ?>
    <title>TemplateRo - Digital Products Marketplace</title>
</head>

<body class="preload">
    <?Php if ($error_empty_id == false) { ?>
        <?php $main->menu(); ?>
        <section class="single-product-desc">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="item-preview">
                            <div class="item-prev-area">

                                <div class="preview-img-wrapper">
                                    <div class="item__preview-img">
                                        <div class="item__preview-slider slick-initialized slick-slider">
                                            <div class="slick-list draggable">
                                                <div class="slick-track" style="opacity: 1; width: 6070px;">
                                                    <div class="prev-slide slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 800px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;" tabindex="0">
                                                        <img src="/view-image.php?image_id=<?php echo $rw['row']['Main Image']; ?>" alt="Preview Image">
                                                    </div>

                                                </div>
                                            </div>
                                        </div><!-- ends: .item--preview-slider -->
                                    </div>

                                    <div class="item__preview-thumb">
                                        <div class="prev-thumb">
                                            <div class="thumb-slider slick-initialized slick-slider">
                                                <div class="slick-list draggable">
                                                    <div class="slick-track d-flex justify-content-center" style="opacity: 1;">
                                                        <div class="item-thumb slick-slide slick-cloned" data-slick-index="-7" aria-hidden="true" style="width: 76px;" tabindex="-1"></div>
                                                        <div class="item-thumb slick-slide slick-cloned" data-slick-index="-7" aria-hidden="true" style="width: 76px;" tabindex="-1">
                                                            <img src="/view-image?image_id=<?php echo $rw['row']['Slider1']; ?>" alt="Thumbnail Image">
                                                        </div>

                                                        <div class="item-thumb slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" style="width: 76px;" tabindex="-1">
                                                            <img src="/view-image?image_id=<?php echo $rw['row']['Slider2']; ?>" alt="Thumbnail Image">
                                                        </div>
                                                        <div class="item-thumb slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" style="width: 76px;" tabindex="-1">
                                                            <img src="/view-image?image_id=<?php echo $rw['row']['Slider3']; ?>" alt="Thumbnail Image">
                                                        </div>
                                                        <div class="item-thumb slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" style="width: 76px;" tabindex="-1">
                                                            <img src="/view-image?image_id=<?php echo $rw['row']['Slider4']; ?>" alt="Thumbnail Image">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div><!-- end .thumb-slider -->
                                        </div>
                                    </div><!-- ends: .item__preview-thumb -->
                                </div><!-- ends: .preview-img-wrapper -->

                            </div><!-- Ends: .item-prev-area -->
                            <div class="item-preview--excerpt">
                                <div class="item-preview--action">
                                    <div class="action-btns m-n15">
                                        <a href="<?php echo $rw['row']['Live Demo']; ?>" class="btn btn--lg btn-primary m-15">Live Preview</a>
                                        <a href="<?php echo $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']; ?>&favorite=<?php echo $rw['row']['id']; ?>" class="btn btn--lg btn--icon btn-outline-primary m-15">
                                            <span class="lnr icon-heart"></span>Add To Favorites</a>
                                    </div>
                                </div><!-- ends: .item-preview--action -->
                                <div class="item-preview--activity">
                                    <div class="activity-single">
                                        <p>
                                            <span class="icon-basket"></span> Total Sales
                                        </p>
                                        <p><?php echo $total_sales['row']; ?></p>
                                    </div>
                                    <div class="activity-single">
                                        <p>
                                            <span class="icon-star"></span> Reviews
                                        </p>
                                        <ul class="list-unstyled">
                                            <li>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </li>
                                            <li>(35)</li>
                                        </ul>
                                    </div>
                                    <div class="activity-single">
                                        <p>
                                            <span class="icon-heart"></span>Favorities
                                        </p>
                                        <p>
                                            <?Php echo $total_favorites['row']; ?>
                                        </p>
                                    </div>
                                </div><!-- Ends: .item-preview--activity -->
                            </div>
                        </div><!-- ends: .item-preview-->
                        <div class="item-info">
                            <div class="item-navigation">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li>
                                        <a href="#product-details" class="active" id="tab1" aria-controls="product-details" role="tab" data-toggle="tab" aria-selected="true">
                                            <span class="icon icon-docs"></span> Item Details</a>
                                    </li>
                                    <li>
                                        <a href="#product-comment" id="tab2" aria-controls="product-comment" role="tab" data-toggle="tab">
                                            <span class="icon icon-bubbles"></span> Comments </a>
                                    </li>
                                    <li>
                                        <a href="#product-review" id="tab3" aria-controls="product-review" role="tab" data-toggle="tab">
                                            <span class="icon icon-star"></span> Reviews
                                            <span>(35)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#product-support" id="tab4" aria-controls="product-support" role="tab" data-toggle="tab">
                                            <span class="icon icon-support"></span> Support</a>
                                    </li>
                                    <li>
                                        <a href="#product-faq" id="tab5" aria-controls="product-faq" role="tab" data-toggle="tab">
                                            <span class="icon icon-question"></span> item FAQ</a>
                                    </li>
                                </ul>
                            </div><!-- ends: .item-navigation -->
                            <div class="tab-content">
                                <div class="fade show tab-pane product-tab active" id="product-details" role="tabpanel" aria-labelledby="tab1">
                                    <div class="tab-content-wrapper">
                                        <?php
                                        echo $rw['row']['description'];
                                        ?>
                                    </div>
                                </div><!-- ends: .tab-content -->
                                <div class="fade tab-pane product-tab" id="product-comment" role="tabpanel" aria-labelledby="tab2">
                                    <div class="thread">
                                        <?php
                                        $sql = "SELECT * FROM comment";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {

                                            while ($row = $result->fetch_assoc()) {

                                        ?>
                                                <ul class="media-list thread-list">
                                                    <li class="single-thread">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <img class="media-object" src="assets/img/m1.png" alt="Commentator Avatar">
                                                                </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div>
                                                                    <div class="media-heading">
                                                                        <a href="author.php">
                                                                            <h4><?php echo $row['user']; ?></h4>
                                                                        </a>
                                                                        <span>9 Hours Ago</span>
                                                                    </div>
                                                                    <span class="comment-tag buyer">Purchased</span>
                                                                    <a href="#" class="reply-link">Reply</a>
                                                                </div>
                                                                <p><?php echo $row['comment']; ?></p>
                                                            </div>
                                                        </div><!-- ends: .media -->
                                                        <!-- nested comment markup / replies -->
                                                    <?php
                                                }
                                            }

                                            $sql = "SELECT * FROM reply WHERE product='" . $rw['row']['id'] . "'";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                        <ul class="children">
                                                            <li class="single-thread depth-2">
                                                                <div class="media">
                                                                    <div class="media-left">
                                                                        <a href="#">
                                                                            <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                                        </a>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="media-heading">
                                                                            <h4><?php echo $row['user']; ?></h4>
                                                                            <span>6 Hours Ago</span>
                                                                        </div>
                                                                        <span class="comment-tag author">Author</span>
                                                                        <p>
                                                                            <?Php echo $row['comment']; ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                <?php
                                                }
                                            }

                                                ?>
                                                <!-- Start Pagination -->
                                                <!--
                                                <nav class="pagination-default ">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true"><i class="fa fa-long-arrow-left"></i></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">10</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true"><i class="fa fa-long-arrow-right"></i></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                            Ends: .pagination-default -->
                                                <div class="comment-form-area">
                                                    <h4>Leave a comment</h4>
                                                    <div class="media comment-form">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="assets/img/m7.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <?php
                                                        if (isset($_POST['validate'])) {
                                                            $comment = $_POST['reply-comment'];
                                                            if (!empty($comment)) {
                                                                $comments = "INSERT INTO comment (`user`,`product`,`comment`) VALUE ('$username','$id','$comment')";
                                                                $ress = mysqli_query($conn, $comments);
                                                            }
                                                        }
                                                        ?>
                                                        <div class="media-body">
                                                            <form action="" method="POST" class="comment-reply-form">
                                                                <textarea name="reply-comment" placeholder="Write your comment..."></textarea>
                                                                <input type="submit" name="validate" class="btn btn--sm btn-primary" value="Post Comment">
                                                            </form>
                                                        </div>
                                                    </div><!-- ends: .comment-form -->
                                                </div><!-- ends: .comment-form-area -->
                                    </div><!-- ends: .comments -->
                                </div><!-- ends: .product-comment -->
                                <div class="fade tab-pane product-tab" id="product-review" role="tabpanel" aria-labelledby="tab3">
                                    <div class="thread thread_review">
                                        <ul class="media-list thread-list">
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m1.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div><!-- ends: .media-left -->
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <div class="media-heading">
                                                                    <a href="author.php">
                                                                        <h4>Themexylum</h4>
                                                                    </a>
                                                                    <span>9 Hours Ago</span>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star-half-o"></span></li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Support</span>
                                                            </div>
                                                            <a href="#" class="reply-link">Reply</a>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                            justo ut
                                                            sceleris que the mattis, leo quam aliquet congue placerat.</p>
                                                    </div><!-- ends: .media-body -->
                                                </div><!-- ends: .media -->
                                                <!-- comment reply -->
                                                <div class="media depth-2 reply-comment">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="#" class="comment-reply-form">
                                                            <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                            <button class="btn btn--md btn-primary">Post Comment</button>
                                                        </form>
                                                    </div>
                                                </div><!-- comment reply -->
                                            </li><!-- end single comment thread-->
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div><!-- ends: .media-left -->
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <div class="media-heading">
                                                                    <a href="author.php">
                                                                        <h4>EcoTheme</h4>
                                                                    </a>
                                                                    <span>12 Hours Ago</span>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star-half-o"></span></li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Customizability</span>
                                                            </div>
                                                            <a href="#" class="reply-link">Reply</a>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                            justo ut
                                                            sceleris que the mattis, leo quam aliquet congue placerat.</p>
                                                    </div><!-- ends: .media-body -->
                                                </div><!-- ends: .media -->
                                                <!-- comment reply -->
                                                <div class="media depth-2 reply-comment">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="#" class="comment-reply-form">
                                                            <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                            <button class="btn btn--md btn-primary">Post Comment</button>
                                                        </form>
                                                    </div>
                                                </div><!-- comment reply -->
                                            </li><!-- end single comment thread-->
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m3.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div><!-- ends: .media-left -->
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <div class="media-heading">
                                                                    <a href="author.php">
                                                                        <h4>SnzTheme</h4>
                                                                    </a>
                                                                    <span>1 Day Ago</span>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star-half-o"></span></li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Degin Quality</span>
                                                            </div>
                                                            <a href="#" class="reply-link">Reply</a>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                            justo ut
                                                            sceleris que the mattis, leo quam aliquet congue placerat.</p>
                                                    </div><!-- ends: .media-body -->
                                                </div><!-- ends: .media -->
                                                <!-- comment reply -->
                                                <div class="media depth-2 reply-comment">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="#" class="comment-reply-form">
                                                            <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                            <button class="btn btn--md btn-primary">Post Comment</button>
                                                        </form>
                                                    </div>
                                                </div><!-- comment reply -->
                                            </li><!-- end single comment thread-->
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m4.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div><!-- ends: .media-left -->
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <div class="media-heading">
                                                                    <a href="author.php">
                                                                        <h4>ThemeValley</h4>
                                                                    </a>
                                                                    <span>20 Days Ago</span>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star-half-o"></span></li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Others</span>
                                                            </div>
                                                            <a href="#" class="reply-link">Reply</a>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                            justo ut
                                                            sceleris que the mattis, leo quam aliquet congue placerat.</p>
                                                    </div><!-- ends: .media-body -->
                                                </div><!-- ends: .media -->
                                                <!-- comment reply -->
                                                <div class="media depth-2 reply-comment">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="#" class="comment-reply-form">
                                                            <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                            <button class="btn btn--md btn-primary">Post Comment</button>
                                                        </form>
                                                    </div>
                                                </div><!-- comment reply -->
                                            </li><!-- end single comment thread-->
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m5.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div><!-- ends: .media-left -->
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <div class="media-heading">
                                                                    <a href="author.php">
                                                                        <h4>AazzTech</h4>
                                                                    </a>
                                                                    <span>1 Month Ago</span>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star-half-o"></span></li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Features</span>
                                                            </div>
                                                            <a href="#" class="reply-link">Reply</a>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                            justo ut
                                                            sceleris que the mattis, leo quam aliquet congue placerat.</p>
                                                    </div><!-- ends: .media-body -->
                                                </div><!-- ends: .media -->
                                                <!-- comment reply -->
                                                <div class="media depth-2 reply-comment">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="#" class="comment-reply-form">
                                                            <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                            <button class="btn btn--md btn-primary">Post Comment</button>
                                                        </form>
                                                    </div>
                                                </div><!-- comment reply -->
                                            </li><!-- end single comment thread-->
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m1.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div><!-- ends: .media-left -->
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <div class="media-heading">
                                                                    <a href="author.php">
                                                                        <h4>Jhon Smith</h4>
                                                                    </a>
                                                                    <span>1 Month Ago</span>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star-half-o"></span></li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Code Quality</span>
                                                            </div>
                                                            <a href="#" class="reply-link">Reply</a>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                            justo ut
                                                            sceleris que the mattis, leo quam aliquet congue placerat.</p>
                                                    </div><!-- ends: .media-body -->
                                                </div><!-- ends: .media -->
                                                <!-- comment reply -->
                                                <div class="media depth-2 reply-comment">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="#" class="comment-reply-form">
                                                            <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                            <button class="btn btn--md btn-primary">Post Comment</button>
                                                        </form>
                                                    </div>
                                                </div><!-- comment reply -->
                                            </li><!-- end single comment thread-->
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div><!-- ends: .media-left -->
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <div class="media-heading">
                                                                    <a href="author.php">
                                                                        <h4>Stephen George</h4>
                                                                    </a>
                                                                    <span>2 Month Ago</span>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star-half-o"></span></li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Support</span>
                                                            </div>
                                                            <a href="#" class="reply-link">Reply</a>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                            justo ut
                                                            sceleris que the mattis, leo quam aliquet congue placerat.</p>
                                                    </div><!-- ends: .media-body -->
                                                </div><!-- ends: .media -->
                                                <!-- comment reply -->
                                                <div class="media depth-2 reply-comment">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="#" class="comment-reply-form">
                                                            <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                            <button class="btn btn--md btn-primary">Post Comment</button>
                                                        </form>
                                                    </div>
                                                </div><!-- comment reply -->
                                            </li><!-- end single comment thread-->
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m3.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div><!-- ends: .media-left -->
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <div class="media-heading">
                                                                    <a href="author.php">
                                                                        <h4>ThemeShpe</h4>
                                                                    </a>
                                                                    <span>3 Month Ago</span>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star-half-o"></span></li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Others</span>
                                                            </div>
                                                            <a href="#" class="reply-link">Reply</a>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                            justo ut
                                                            sceleris que the mattis, leo quam aliquet congue placerat.</p>
                                                    </div><!-- ends: .media-body -->
                                                </div><!-- ends: .media -->
                                                <!-- comment reply -->
                                                <div class="media depth-2 reply-comment">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="#" class="comment-reply-form">
                                                            <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                            <button class="btn btn--md btn-primary">Post Comment</button>
                                                        </form>
                                                    </div>
                                                </div><!-- comment reply -->
                                            </li><!-- end single comment thread-->
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m4.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div><!-- ends: .media-left -->
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <div class="media-heading">
                                                                    <a href="author.php">
                                                                        <h4>WeBake</h4>
                                                                    </a>
                                                                    <span>6 Month Ago</span>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star-half-o"></span></li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Design Quality</span>
                                                            </div>
                                                            <a href="#" class="reply-link">Reply</a>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                            justo ut
                                                            sceleris que the mattis, leo quam aliquet congue placerat.</p>
                                                    </div><!-- ends: .media-body -->
                                                </div><!-- ends: .media -->
                                                <!-- comment reply -->
                                                <div class="media depth-2 reply-comment">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="#" class="comment-reply-form">
                                                            <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                            <button class="btn btn--md btn-primary">Post Comment</button>
                                                        </form>
                                                    </div>
                                                </div><!-- comment reply -->
                                            </li><!-- end single comment thread-->
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m5.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div><!-- ends: .media-left -->
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <div class="media-heading">
                                                                    <a href="author.php">
                                                                        <h4>WPPlugin</h4>
                                                                    </a>
                                                                    <span>8 Month Ago</span>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star-half-o"></span></li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Support</span>
                                                            </div>
                                                            <a href="#" class="reply-link">Reply</a>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                            justo ut
                                                            sceleris que the mattis, leo quam aliquet congue placerat.</p>
                                                    </div><!-- ends: .media-body -->
                                                </div><!-- ends: .media -->
                                                <!-- comment reply -->
                                                <div class="media depth-2 reply-comment">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="#" class="comment-reply-form">
                                                            <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                            <button class="btn btn--md btn-primary">Post Comment</button>
                                                        </form>
                                                    </div>
                                                </div><!-- comment reply -->
                                            </li><!-- end single comment thread-->
                                            <li class="single-thread">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m1.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div><!-- ends: .media-left -->
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <div class="media-heading">
                                                                    <a href="author.php">
                                                                        <h4>ThemeLand</h4>
                                                                    </a>
                                                                    <span>1 Year Ago</span>
                                                                </div>
                                                                <div class="rating product--rating">
                                                                    <ul>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                        <li><span class="fa fa-star-half-o"></span></li>
                                                                    </ul>
                                                                </div>
                                                                <span class="review_tag">Support</span>
                                                            </div>
                                                            <a href="#" class="reply-link">Reply</a>
                                                        </div>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                            justo ut
                                                            sceleris que the mattis, leo quam aliquet congue placerat.</p>
                                                    </div><!-- ends: .media-body -->
                                                </div><!-- ends: .media -->
                                                <!-- comment reply -->
                                                <div class="media depth-2 reply-comment">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="#" class="comment-reply-form">
                                                            <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                            <button class="btn btn--md btn-primary">Post Comment</button>
                                                        </form>
                                                    </div>
                                                </div><!-- comment reply -->
                                            </li><!-- end single comment thread-->
                                        </ul><!-- ends: .media-list -->
                                        <!-- Start Pagination -->
                                        <nav class="pagination-default ">
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true"><i class="fa fa-long-arrow-left"></i></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                                                <li class="page-item"><a class="page-link" href="#">10</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true"><i class="fa fa-long-arrow-right"></i></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav><!-- Ends: .pagination-default -->
                                    </div><!-- ends: .comments -->
                                </div><!-- ends: .product-comment -->
                                <div class="fade tab-pane product-tab" id="product-support" role="tabpanel" aria-labelledby="tab4">
                                    <div class="support">
                                        <div class="support__title">
                                            <h3>Contact the Author</h3>
                                        </div>
                                        <div class="support__form">
                                            <div class="usr-msg">
                                                <p>Please
                                                    <a href="login.php">sign in</a> to contact this author.
                                                </p>
                                                <form action="#" class="support_form">
                                                    <div class="form-group">
                                                        <label for="subj">Support Subject:</label>
                                                        <input type="text" id="subj" class="text_field" placeholder="Enter your subject">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="supmsg">Support Query: </label>
                                                        <textarea class="text_field" id="supmsg" name="supmsg" placeholder="Enter your text..."></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn--lg btn-primary">Submit
                                                        Now</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- ends: .product-support -->
                                <div class="fade tab-pane product-tab" id="product-faq" role="tabpanel" aria-labelledby="tab5">
                                    <div class="tab-content-wrapper">
                                        <div class="faq-accordion">
                                            <div class="panel-group accordion" role="tablist" id="accordion">
                                                <div class="panel accordion__single" id="panel-one">
                                                    <div class="single_acco_title">
                                                        <h4>
                                                            <a data-toggle="collapse" href="#collapse1" class="collapsed" aria-expanded="false" data-target="#collapse1" aria-controls="collapse1">
                                                                <span>How to write the changelog for theme updates?</span>
                                                                <i class="lnr icon-arrow-right-circle indicator"></i>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse1" class="panel-collapse collapse" aria-labelledby="panel-one" data-parent="#accordion">
                                                        <div class="panel-body">
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                                justo ut
                                                                sceleris que the mattis, leo quam aliquet congue placerat mi
                                                                id nisi
                                                                interdum mollis. Aliquip placeat salvia cillum iphone.
                                                                Seitan
                                                                aliquip
                                                                quis cardigan american apparel, butcher. Nunc placerat mi id
                                                                nisi
                                                                interdum mollis. Praesent pharetra, justo ut sceleris que
                                                                the
                                                                mattis,
                                                                leo quam aliquet congue placerat mi id nisi interdum mollis.
                                                                Aliquip
                                                                placeat salvia cillum iphone. Seitan aliquip quis cardigan
                                                                american
                                                                apparel, butcher .</p>
                                                        </div>
                                                    </div>
                                                </div><!-- end .accordion__single -->
                                                <div class="panel accordion__single" id="panel-two">
                                                    <div class="single_acco_title">
                                                        <h4>
                                                            <a data-toggle="collapse" href="#collapse2" class="collapsed" aria-expanded="false" data-target="#collapse2" aria-controls="collapse2">
                                                                <span>Why do I need to login to purchase an item on
                                                                    TemplateRo?</span>
                                                                <i class="lnr icon-arrow-right-circle indicator"></i>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse2" class="panel-collapse collapse" aria-labelledby="panel-two" data-parent="#accordion">
                                                        <div class="panel-body">
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                                justo ut
                                                                sceleris que the mattis, leo quam aliquet congue placerat mi
                                                                id nisi
                                                                interdum mollis. Aliquip placeat salvia cillum iphone.
                                                                Seitan
                                                                aliquip
                                                                quis cardigan american apparel, butcher. Nunc placerat mi id
                                                                nisi
                                                                interdum mollis. Praesent pharetra, justo ut sceleris que
                                                                the
                                                                mattis,
                                                                leo quam aliquet congue placerat mi id nisi interdum mollis.
                                                                Aliquip
                                                                placeat salvia cillum iphone. Seitan aliquip quis cardigan
                                                                american
                                                                apparel, butcher .</p>
                                                        </div>
                                                    </div>
                                                </div><!-- end .accordion__single -->
                                                <div class="panel accordion__single" id="panel-three">
                                                    <div class="single_acco_title">
                                                        <h4>
                                                            <a data-toggle="collapse" href="#collapse3" class="collapsed" aria-expanded="false" data-target="#collapse3" aria-controls="collapse3">
                                                                <span>How to create an account on TemplateRo?</span>
                                                                <i class="lnr icon-arrow-right-circle indicator"></i>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse3" class="panel-collapse collapse" aria-labelledby="panel-three" data-parent="#accordion">
                                                        <div class="panel-body">
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                                justo ut
                                                                sceleris que the mattis, leo quam aliquet congue placerat mi
                                                                id nisi
                                                                interdum mollis. Aliquip placeat salvia cillum iphone.
                                                                Seitan
                                                                aliquip
                                                                quis cardigan american apparel, butcher. Nunc placerat mi id
                                                                nisi
                                                                interdum mollis. Praesent pharetra, justo ut sceleris que
                                                                the
                                                                mattis,
                                                                leo quam aliquet congue placerat mi id nisi interdum mollis.
                                                                Aliquip
                                                                placeat salvia cillum iphone. Seitan aliquip quis cardigan
                                                                american
                                                                apparel, butcher .</p>
                                                        </div>
                                                    </div>
                                                </div><!-- end .accordion__single -->
                                                <div class="panel accordion__single" id="panel-four">
                                                    <div class="single_acco_title">
                                                        <h4>
                                                            <a data-toggle="collapse" href="#collapse4" class="collapsed" aria-expanded="false" data-target="#collapse4" aria-controls="collapse4">
                                                                <span>How to write the changelog for theme updates?</span>
                                                                <i class="lnr icon-arrow-right-circle indicator"></i>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse4" class="panel-collapse collapse" aria-labelledby="panel-four" data-parent="#accordion">
                                                        <div class="panel-body">
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                                justo ut
                                                                sceleris que the mattis, leo quam aliquet congue placerat mi
                                                                id nisi
                                                                interdum mollis. Aliquip placeat salvia cillum iphone.
                                                                Seitan
                                                                aliquip
                                                                quis cardigan american apparel, butcher. Nunc placerat mi id
                                                                nisi
                                                                interdum mollis. Praesent pharetra, justo ut sceleris que
                                                                the
                                                                mattis,
                                                                leo quam aliquet congue placerat mi id nisi interdum mollis.
                                                                Aliquip
                                                                placeat salvia cillum iphone. Seitan aliquip quis cardigan
                                                                american
                                                                apparel, butcher .</p>
                                                        </div>
                                                    </div>
                                                </div><!-- end .accordion__single -->
                                                <div class="panel accordion__single" id="panel-five">
                                                    <div class="single_acco_title">
                                                        <h4>
                                                            <a data-toggle="collapse" href="#collapse5" class="collapsed" aria-expanded="false" data-target="#collapse5" aria-controls="collapse5">
                                                                <span>Do you recommend using a download manager
                                                                    software?</span>
                                                                <i class="lnr icon-arrow-right-circle indicator"></i>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse5" class="panel-collapse collapse" aria-labelledby="panel-five" data-parent="#accordion">
                                                        <div class="panel-body">
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                                justo ut
                                                                sceleris que the mattis, leo quam aliquet congue placerat mi
                                                                id nisi
                                                                interdum mollis. Aliquip placeat salvia cillum iphone.
                                                                Seitan
                                                                aliquip
                                                                quis cardigan american apparel, butcher. Nunc placerat mi id
                                                                nisi
                                                                interdum mollis. Praesent pharetra, justo ut sceleris que
                                                                the
                                                                mattis,
                                                                leo quam aliquet congue placerat mi id nisi interdum mollis.
                                                                Aliquip
                                                                placeat salvia cillum iphone. Seitan aliquip quis cardigan
                                                                american
                                                                apparel, butcher .</p>
                                                        </div>
                                                    </div>
                                                </div><!-- end .accordion__single -->
                                                <div class="panel accordion__single" id="panel-six">
                                                    <div class="single_acco_title">
                                                        <h4>
                                                            <a data-toggle="collapse" href="#collapse6" class="collapsed" aria-expanded="false" data-target="#collapse6" aria-controls="collapse6">
                                                                <span>How to purchase an item on TemplateRo?</span>
                                                                <i class="lnr icon-arrow-right-circle indicator"></i>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse6" class="panel-collapse collapse" aria-labelledby="panel-six" data-parent="#accordion">
                                                        <div class="panel-body">
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                                justo ut
                                                                sceleris que the mattis, leo quam aliquet congue placerat mi
                                                                id nisi
                                                                interdum mollis. Aliquip placeat salvia cillum iphone.
                                                                Seitan
                                                                aliquip
                                                                quis cardigan american apparel, butcher. Nunc placerat mi id
                                                                nisi
                                                                interdum mollis. Praesent pharetra, justo ut sceleris que
                                                                the
                                                                mattis,
                                                                leo quam aliquet congue placerat mi id nisi interdum mollis.
                                                                Aliquip
                                                                placeat salvia cillum iphone. Seitan aliquip quis cardigan
                                                                american
                                                                apparel, butcher .</p>
                                                        </div>
                                                    </div>
                                                </div><!-- end .accordion__single -->
                                            </div><!-- end .accordion -->
                                        </div><!-- ends: .faq-accordion -->
                                    </div>
                                </div><!-- ends: .product-faq -->
                            </div><!-- ends: .tab-content -->
                        </div><!-- ends: .item-info -->
                    </div><!-- ends: .col-md-8 -->
                    <div class="col-lg-4 col-md-12">
                        <aside class="sidebar sidebar--single-product">
                            <div class="sidebar-card card-pricing card--pricing2">
                                <div class="price border-none">
                                    <h1>
                                        <span><?php echo $rw['row']['Product Price'] . "&euro;"; ?></span>
                                    </h1>
                                </div><!-- ends: .price -->
                                <ul class="pricing-options pricing-options2">
                                    <?php if ($rw['row']['Product Price'] >= 1) { ?>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="opt12" class="" name="filter_opt" checked>
                                                <label for="opt12" data-price="<?php echo $rw['row']['Product Price'] + $regular_license . "&euro;"; ?>">
                                                    <span class="circle"></span>Single Site License </label>
                                            </div>
                                            <p>Nunc placerat mi id nisi interdum is mollis. Praesent pharetra, justo ut sceleris
                                                que
                                                the mattis, leo quam.</p>
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="opt2" class="" name="filter_opt">
                                                <label for="opt2" data-price="<?php echo $rw['row']['Product Price'] + $extend_license . "&euro;"; ?>">
                                                    <span class="circle"></span>2 Sites License</label>
                                            </div>
                                            <p>Nunc placerat mi id nisi interdum is mollis. Praesent pharetra, justo ut sceleris
                                                que
                                                the mattis, leo quam.</p>
                                        </li>
                                    <?php } else { ?>
                                        <!--text-->
                                    <?php } ?>
                                </ul><!-- end .pricing-options -->
                                <div class="purchase-button">
                                    <?php if ($rw['row']['Product Price'] >= 1) {
                                    ?>

                                        <?php
                                        if ($TemplatePlus == true && $creator != $username) {
                                        ?>
                                            <form action="" method="POST">
                                                <input class="btn btn--lg cart-btn btn-secondary" name="GetProductFree" type="submit" value="Place Order">
                                            </form>
                                        <?php
                                        } elseif ($TemplatePlus == false && $creator != $username) {
                                        ?>
                                            <a href="<?php echo $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']; ?>&cart=<?php echo $rw['row']['id']; ?>" class="btn btn--lg cart-btn btn-secondary">
                                                <span class="lnr icon-basket"></span> Add To Cart
                                            </a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="/dashboard-manage-item.php" class="btn btn--lg cart-btn btn-secondary">
                                                <span class="lnr icon-note"></span> Manage Items
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    } else {
                                        echo '<a href="#" class="btn btn--lg btn-primary">Download Now</a>';
                                    } ?>
                                </div><!-- end .purchase-button -->
                            </div><!-- end .sidebar--card -->
                            <div class="sidebar-card card--product-infos">
                                <div class="card-title">
                                    <h4>Product Information</h4>
                                </div>
                                <ul class="infos">
                                <?php if (!empty($rw['row']['createdtime'])) { ?>
                                        <li>
                                            <p class="data-label">createdtime</p>
                                            <p><?php echo $rw['row']['createdtime']; ?></p>
                                        </li>
                                    <?php } ?>
                                    <?php if (!empty($rw['row']['Support'])) { ?>
                                        <li>
                                            <p class="data-label">Support extra</p>
                                            <p><?php if($rw['row']['Support'] == 1){echo 'yes';}else{echo 'no';} ?></p>
                                        </li>
                                    <?php } ?>
                                    <?php if (!empty($rw['row']['Bootstrap Version'])) { ?>
                                        <li>
                                            <p class="data-label">Bootstrap Version</p>
                                            <p><?php if($rw['row']['Bootstrap Version'] == 1){echo 'yes';}else{echo 'no';} ?></p>
                                        </li>
                                    <?php } ?>
                                <?php if (!empty($rw['row']['category'])) { ?>
                                        <li>
                                            <p class="data-label">category</p>
                                            <p><?php echo $rw['row']['category']; ?></p>
                                        </li>
                                    <?php } ?>
                                    <li>
                                        <p class="data-label">Tags</p>
                                        <p class="info" id="listtags">

                                        </p>
                                    </li>
                                </ul><!-- ends: .infos -->
                            </div><!-- ends: .card--product-infos -->
                            <div class="sidebar-card social-share-card">
                                <p>Social Share:</p>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="<?php echo $row['fackebook']; ?>">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $row['fackebook']; ?>">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- Ends: .social-share-card -->
                            <div class="author-card sidebar-card">
                                <div class="card-title">
                                    <h4>Product Information</h4>
                                </div>
                                <div class="author-infos">
                                    <div class="author-top">
                                        <div class="author_avatar">
                                            <img src="https://www.cdn.templatero.rf.gd/view-image.php?image_id=62168920e179d" alt="Presenting the broken author avatar :D" width="90" height="100">
                                        </div>
                                        <div class="author">
                                            <h5><?php echo $rw['row']['creator']; ?></h5>
                                            <p>Joined: 08 April 2016</p>
                                        </div>
                                    </div><!-- ends: .author-top -->
                                    <div class="social social--color--filled">
                                        <ul>
                                            <?php if (!empty($rowsss['row']['fackebook'])) { ?>

                                                <li>
                                                    <a href="<?php echo $rowsss['row']['fackebook']; ?>">
                                                        <span class="fa fa-facebook"></span>
                                                    </a>
                                                </li>
                                            <?Php } ?>
                                            <?php if (!empty($rowsss['row']['twitter'])) { ?>

                                                <li>
                                                    <a href="<?php echo $rowsss['row']['twitter']; ?>">
                                                        <span class="fa fa-twitter"></span>
                                                    </a>
                                                </li>
                                            <?Php } ?>
                                            <?php if (!empty($rowsss['row']['dribbble'])) { ?>

                                                <li>
                                                    <a href="<?php echo $rowsss['row']['dribbble']; ?>">
                                                        <span class="fa fa-dribbble"></span>
                                                    </a>
                                                </li>
                                            <?Php } ?>
                                            <?php if (!empty($rowsss['row']['linkedin'])) { ?>

                                                <li>
                                                    <a href="<?php echo $rowsss['row']['linkedin']; ?>">
                                                        <span class="fa fa-linkedin"></span>
                                                    </a>
                                                </li>
                                            <?Php } ?>
                                            <?php if (!empty($rowsss['row']['google-plus'])) { ?>
                                                <li>
                                                    <a href="<?php echo $rowsss['row']['google-plus']; ?>">
                                                        <span class="fa fa-google-plus"></span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div><!-- ends: .social -->
                                    <div class="author-btn">
                                        <a href="author?creator=<?Php echo $rw['row']['creator']; ?>" class="btn btn--sm btn-primary">View Profile</a>
                                        <a href="#" class="btn btn--sm btn-secondary">Send Message</a>
                                    </div><!-- ends: .author-btn -->
                                </div><!-- ends: .author-infos -->
                            </div><!-- ends: .author-card -->
                        </aside><!-- ends: .sidebar -->
                    </div><!-- ends: .col-md-4 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </section><!-- ends: .single-product-desc -->
        <section class="more_product_area p-top-105 p-bottom-75">
            <div class="container">
                <div class="row">
                    <!-- start col-md-12 -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>More Items by <a href="author?creator=<?php echo $rw['row']['creator']; ?>"><span>
                                        <?Php echo $rw['row']['creator']; ?>
                                    </span></a>
                            </h2>
                        </div>
                    </div><!-- ends: .col-md-12 -->
                    <?php
                    $creator = $rw['row']['creator'];
                    $fetch_product = "SELECT * FROM products WHERE creator='$creator' AND `Product Price` >= 1 LIMIT 3";

                    //execute the query

                    $result = $conn->query($fetch_product);

                    if ($result->num_rows > 0) {
                        //output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $avatar_sql = "SELECT * FROM users WHERE username='" . $row['creator'] . "'";
                            $avatar_Query = mysqli_query($conn, $avatar_sql);
                            $ava_row = mysqli_fetch_array($avatar_Query);
                    ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="product-single latest-single">
                                    <div class="product-thumb">
                                        <figure>
                                            <img src="view-image.php?image_id=<?php echo $row['Main Image']; ?>" alt="" class="img-fluid">
                                            <figcaption>
                                                <ul class="list-unstyled">
                                                    <?php if ($username != $row['creator']) {
                                                        echo '<li><a href=""><span class="icon-basket"></span></a></li>';
                                                    } ?>
                                                    <li><a href="">Live Demo</a></li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <!-- Ends: .product-thumb -->
                                    <div class="product-excerpt">
                                        <h5>
                                            <a href=""><?php echo $row['Product Name']; ?></a>
                                        </h5>
                                        <ul class="titlebtm">
                                            <li>
                                                <img class="auth-img" src="<?Php echo $ava_row['avatar']; ?>" alt="author image">
                                                <p><a href="author?creator=<?Php echo $row['creator']; ?>"><?php echo $row['creator']; ?></a>
                                                </p>
                                            </li>
                                        </ul>
                                        <ul class="product-facts clearfix">
                                            <li class="price"><?php if (!empty($row['Product Price'])) {
                                                                    echo $row['Product Price'] . "&euro;";
                                                                } else {
                                                                    echo "FREE";
                                                                } ?></li>
                                            <li class="sells">
                                                <?php
                                                $sqls = "SELECT * FROM library WHERE `Product id`='" . $row['id'] . "'";
                                                $res = mysqli_query($conn, $sqls);
                                                $num = mysqli_num_rows($res);
                                                ?>
                                                <span class="icon-basket"></span><?php echo $num; ?>
                                            </li>
                                            <li class="product-fav">
                                                <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
                                            </li>
                                            <li class="product-rating">
                                                <ul class="list-unstyled">
                                                    <li><span class="rate_active"></span></li>
                                                    <li><span class="rate_active"></span></li>
                                                    <li><span class="rate_active"></span></li>
                                                    <li><span class="rate_active"></span></li>
                                                    <li><span class="rate_disabled"></span></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Ends: .product-excerpt -->
                                </div><!-- Ends: .product-single -->
                            </div><!-- Ends: .col-md-4 -->
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section><!-- ends: .more_product_area -->
        <?php $main->footer(); ?>
    <?php } ?>
</body>
<?php $main->script_src(); ?>
<script>
    const ul = document.querySelector("#listtags"),
        gettags = document.querySelector('#tags');
    let tags = [<?php
                $tags = $rw['row']['Tags'];
                $GetTags = explode(',', $tags);

                foreach ($GetTags as $showTags) {
                    echo "'" . $showTags . "',";
                } ?>];

    createTag();

    function createTag() {
        ul.querySelectorAll("li").forEach(li => li.remove());
        tags.slice().reverse().forEach(tag => {
            let liTag = `
            <a href="search?query=${tag}">${tag}</a>,`;
            ul.insertAdjacentHTML("afterbegin", liTag);
        });
    }
</script>

</html>