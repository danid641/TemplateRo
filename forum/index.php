<?php
include 'inc/connect.php';

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

    <link rel="stylesheet" href="assets/css/plugin.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <!-- endinject -->

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>/assets/img/logo/icon.png">
</head>
<body class="preload">
    <?php include 'inc/menu.php'; ?>
    <section class="support_threads_area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="dwqa-container">
                        <div class="dwqa-questions-archive">
                            <form id="dwqa-search" class="dwqa-search">
                                <input data-nonce="8c3dbe4be6" type="text" placeholder="What do you want to know?"
                                       name="qs"
                                       value="" class="ui-autocomplete-input"
                                       autocomplete="off">
                            </form>
                            <!-- Ends: .dwqa-search -->
                            <div class="dwqa-question-filter">
                                <span>Filter:</span>
                                <a href="" class="active">All</a>
                                <a href="dsad" class="">Open</a>
                                <a href="" class="">Resolved</a>
                                <a href="" class="">Closed</a>
                                <a href="" class="">Unanswered</a>
                                <select id="dwqa-sort-by" class="dwqa-sort-by">
                                    <option selected="" disabled="">Sort by</option>
                                    <option value="">Views</option>
                                    <option value="">Answers</option>
                                    <option value="">Votes</option>
                                </select>
                            </div>
                            <!-- Ends: .dwqa-question-filter -->
                            <div class="dwqa-questions-list">
                                <?php
                              $fetch_product = "SELECT * FROM question";

                                                            //execute the query
                                
                                $result = $connect->query($fetch_product);
                                
                               if ($result->num_rows > 0) {
                                                                //output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    $fetch_image = $row['creator'];
                                    $sqls = "SELECT * FROM users WHERE username='$fetch_image'";
                                    $query = mysqli_query($conn, $sqls);
                                    $rows = mysqli_fetch_array($query);

                                    $avatar = $rows['avatar'];

                                ?>
                                <div class="dwqa-question-item">
                                    <div class="dwqa-question-title">
                                        <a href="view-question.php?question=<?Php echo $row['id']; ?>"><?php echo $row['Title']; ?></a>
                                    </div>
                                    <div class="dwqa-question-meta">
                                        <?php 
                                        if($row['type'] == "open"){                                        
                                        ?>
                                        <span title="Open" class="dwqa-status dwqa-status-open">Open</span>
                                        <?php
                                        }else if($row['type'] == "closed"){
                                        ?>
                                        <span title="Open" class="dwqa-status dwqa-status-closed">Closed</span>
                                        <?php
                                        }else if($row['type'] == "resolved"){
                                        ?>
                                        <span title="Open" class="dwqa-status dwqa-status-resolved">Resolved</span>
                                        <?php 
                                        }else if($row['type'] == "Answered"){
                                        ?>
                                        <span title="Open" class="dwqa-status dwqa-status-answered">Answered</span>
                                        <?php 
                                        }
                                        ?>
                                        <span>
                                            <a href=""><img alt="" width="40" height="30" style="border-radius: 50%;" src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>view-image.php?image_id=<?php echo $avatar; ?>" class="avatar avatar-48 photo avatar-default"><?php echo $row['creator']; ?>
                                            </a> <?php echo $row['posted_on']; ?>
                                        </span>
                                        <span class="dwqa-question-category">&nbsp;•&nbsp;
                                            <a href="" rel="tag"><?php echo $row['category']; ?></a>
                                        </span>
                                    </div>
                                    <div class="dwqa-question-stats">
                                        <span class="dwqa-views-count"><strong><?php echo $row['views']; ?></strong> views</span>
                                        <span class="dwqa-answers-count"><strong><?php echo $row['replies']; ?></strong> replies</span>
                                        <span class="dwqa-votes-count"><strong><?php echo $row['votes']; ?></strong> votes</span>
                                    </div>
                                </div><!-- Ends: .dwqa-question-item -->
                                <?php
                                                                }}
                                ?>
                            </div><!-- Ends: .dwqa-questions-list -->
                            <div class="dwqa-questions-footer">
                                <div class="dwqa-pagination">
                                    <span class="dwqa-page-numbers dwqa-current">1</span>
                                    <a class="dwqa-page-numbers" href="">2</a>
                                    <a class="dwqa-page-numbers" href="">3</a>
                                    <span class="dwqa-page-numbers dwqa-dots">…</span>
                                    <a class="dwqa-page-numbers" href="">5</a>
                                    <a class="dwqa-next dwqa-page-numbers" href="">Next »</a>
                                </div>
                            </div><!-- Ends: .dwqa-questions-footer -->
                        </div><!-- Ends: .dwqa-questions-archive -->
                    </div><!-- Ends: .dwqa-container -->
                </div><!-- end .col-lg-9 -->

                <div class="col-lg-3">
                    <aside class="sidebar support--sidebar">
                        <?php
                         if(!isset( $_SESSION['account']['userData']['username'])){
                        ?>
                        <a href="https://templatero.rf.gd/login" class="login_promot">Login to Ask a Question</a>
                        <?php
                         }
                          ?>
                        
    <div class="sidebar-card card--forum_categories p-0">
        <div class="card-title">
            <h4>Categories</h4>
        </div>
        <div class="collapsible-content">
            <ul class="card-content">
               <?php
               $category = "SELECT * FROM category";
               $result_category = $connect->query($category);
               
               if ($result_category->num_rows > 0) {
                   //output data of each row
               while ($category_row = $result_category->fetch_assoc()) {
               ?>
               <li>
                    <a href="#">
                        <?php echo $category_row['name']; ?>
                        <span class="item-count"><?php echo $category_row['total_post']; ?></span>
                    </a>
                </li>
               <?php 
               }}
               ?>
            </ul>
        </div><!-- ends: .collapsible_content -->
    </div><!-- ends: .card--forum_categories -->

                        
    <div class="sidebar-card card--top_discussion p-0">
        <div class="card-title">
            <h4>Popular Questions</h4>
        </div>
        <div class="collapsible-content">
            <ul class="card-content">
<?php
$popular_question = "SELECT * FROM question WHERE `votes` >= 50 LIMIT 3";
$result_popularQuestion = $connect->query($popular_question);

if ($result_popularQuestion->num_rows > 0) {
    //output data of each row
while ($popular_question_row = $result_popularQuestion->fetch_assoc()) {
?>
                <li>
                    <a href="view-question.php?question=<?php echo $popular_question_row['id']; ?>"><?php echo $popular_question_row['Title']; ?>
                        <span><?php echo $popular_question_row['posted_on']; ?></span>
                    </a>
                </li>
<?php
}}
?>
            </ul>
        </div><!-- ends: .collapsible_content -->
    </div><!-- ends: .card--forum_categories -->

                    </aside><!-- end .sidebar -->
                </div><!-- end .col-md-4 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .support_threads_area -->
    <?php include 'inc/footer.php'; ?>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
    <!-- inject:js-->

     <script src="assets/js/plugins.min.js"></script>

     <script src="assets/js/script.min.js"></script>

     <!-- endinject-->
</body>
</html>