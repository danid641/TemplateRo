<?php
include 'inc/connect.php';

session_start();

if(isset($_GET['question'])){

$id = $_GET['question'];

$sql_question = "SELECT * FROM question WHERE id='$id'";
$sql_question_response = mysqli_query($connect, $sql_question);
$row = mysqli_fetch_array($sql_question_response);

$username = $row['creator'];

$user_avatar1 = "SELECT * FROM users WHERE username='$username'";
$user_avatar_response1 = mysqli_query($conn, $user_avatar1);
$row_avatar1 = mysqli_fetch_array($user_avatar_response1);

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
    <section class="support_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="dwqa-container">
                        <div class="dwqa-single-question">
                            <div class="dwqa-breadcrumbs">
                                <a href="index.php">Support Forum</a>
                                <span class="dwqa-sep"> › </span>
                                <a href="index.php?cagegory=<?Php echo $row['category']; ?>">Category: Item Discussion</a>
                                <span class="dwqa-sep"> › </span>
                                <span class="dwqa-current"><?php echo $row['Title']; ?></span>
                            </div><!-- Ends: .dwqa-breadcrumbs -->
                            <div class="dwqa-question-item">
                                <div class="dwqa-question-vote" data-nonce="d7368a240e" data-post="6395">
                                    <span class="dwqa-vote-count"><?php echo $row['votes']; ?></span>
                                    <a class="dwqa-vote dwqa-vote-up" href="#">Vote Up</a>
                                    <a class="dwqa-vote dwqa-vote-down" href="#">Vote Down</a>
                                </div>
                                <div class="dwqa-question-meta">
                                    <span>
                                        <a href="http://localhost/author?creator=<?php echo $row['creator']; ?>">
                                            <img alt="" src="http://localhost/<?php echo $row_avatar1['avatar']; ?>" class="avatar avatar-48 photo" height="48" width="48"><?php echo $row['creator']; ?>
                                        </a> <?php echo $row['posted_on']; ?>
                                    </span>
                                    <span class="dwqa-question-actions"></span>
                                </div>
                                <div class="dwqa-question-content">
                                    <?php echo $row['description']; ?>
                                </div>
                            </div><!-- Ends: .dwqa-question-item -->
                            <?php 
                            $sql_comment_answers = "SELECT * FROM comment WHERE question_id='$id'";
                            $sql_comment_answers_response = mysqli_query($connect, $sql_comment_answers);
                            $all_answers = mysqli_num_rows($sql_comment_answers_response);
                            ?>
                            <div class="dwqa-answers">
                                <div class="dwqa-answers-title"><h5><?php echo $all_answers; ?> Answers</h5></div>
                                <div class="dwqa-answers-list">
                                    <?php
$fetch_comment = "SELECT * FROM comment WHERE question_id='$id'";

//execute the query

$result_comment = $connect->query($fetch_comment);

if ($result_comment->num_rows > 0) {
    //output data of each row
while ($comment_row = $result_comment->fetch_assoc()) {
    $username = $comment_row['username'];

    $user_avatar = "SELECT * FROM users WHERE username='$username'";
    $user_avatar_response = mysqli_query($conn, $user_avatar);
    $row_avatar = mysqli_fetch_array($user_avatar_response);
                                    ?>                           
                                    <div class="dwqa-answer-item">
                                        <div class="dwqa-answer-vote" data-nonce="5d2ccf7ff2" data-post="6399">
                                            <span class="dwqa-vote-count"><?php echo $comment_row['votes'];  ?></span>
                                            <a class="dwqa-vote dwqa-vote-up" href="#">Vote Up</a>
                                            <a class="dwqa-vote dwqa-vote-down" href="#">Vote Down</a>
                                        </div>
                                        <div class="dwqa-answer-meta">
                                            <span>
                                                <a href="">
                                                    <img alt="" src="http://localhost/<?php echo $row_avatar['avatar']; ?>"
                                                         class="avatar avatar-48 photo" height="48" width="48"><?php echo $comment_row['username']; ?>
                                                </a>
                                                <?php if($comment_row['staff'] == true){?><span class="dwqa-label dwqa-staff">Staff</span><?Php }?> answered <?Php echo $comment_row['posted_on']; ?></span>
                                        </div>
                                        <div class="dwqa-answer-content">
                                           <?php echo $comment_row['message']; ?>
                                        </div>
                                    </div><!-- dwqa-answer-item -->
                                    <?php
}}
                                    ?>
                                </div><!-- dwqa-answers-list -->
                            </div><!-- Ends: .dwqa-answers -->
                        </div><!-- Ends: .dwqa-single-question -->
                    </div><!-- Ends: .dwqa-container -->
                </div><!-- end .col-lg-9 -->

                <div class="col-lg-3">
                    <aside class="sidebar support--sidebar">
                        <?php if(!isset( $_SESSION['account']['userData']['username'])){ ?>
                            <a href="../login.php" class="login_promot">Login to Ask a Question</a>
                        <?php } ?>
                        
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
<?php
}
?>