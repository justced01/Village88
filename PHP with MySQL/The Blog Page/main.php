<?php session_start(); 
    require('new-connection.php');
    date_default_timezone_set("Asia/Singapore");
    $review_query = "SELECT reviews.* , users.firstname, users.lastname 
                    FROM reviews 
                    LEFT JOIN users ON reviews.user_id = users.id
                    ORDER BY reviews.created_at DESC";
    $reviews = fetch_all($review_query);

    function print_message(){
        if(isset($_SESSION['errors'])){
            foreach($_SESSION['errors'] as $error){
                echo '<p class="error">' . $error . "</p>";
            } 
            unset($_SESSION['errors']); 
        }
        else if(isset($_SESSION['success'])){
            echo '<p class="success">' . $_SESSION['success'] . "</p>";
            unset($_SESSION['success']); 
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
</head>
<body>
    <div class="wrapper">
        <header>
            <h2 class="h-title">Blog</h2>
            <div class="user-nav">
<?php if (isset($_SESSION['logged_in'])) { ?>
                <h2>Welcome <?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ; ?>!</h2>
                <a href="./process.php">Sign out</a>
<?php } else { ?>
                <a href="./index.php">Sign in</a>
<?php } ?>
            </div>
        </header>
        <main>
            <section class="blog-section">
                <h1 class="title">Title</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the type standard dummy text ever since the 1500s, when an unknown printer took a galley of typeetting sheets and typesetting sheets. Lorem Ipsum has led to one of the typesetting engines that have never been seen before. Lorem Ipsum has led to one of the typesetting engines that have never been seen before and is simply</p>
            </section>    
<?php if (isset($_SESSION['logged_in'])) { ?>
            <section class="review-section">
                <h2>Leave a Review</h2>
                <?= print_message(); ?>
                <form action="process.php" method="post">
                    <textarea name="review"></textarea>
                    <input type="hidden" name="action" value="review">
                    <div class="align-right">
                        <input type="submit" value="Post a review">
                    </div>
                </form>
            </section>
<?php } else { ?>
            <section class="review-section">
                <h2>Reviews</h2>
            </section>
<?php } ?>
<?php foreach($reviews as $review){     
        $date = date_create($review['created_at']);     
?>
            <section class="comment-section">
                <h3><?= $review['firstname'] ?> <?= $review['lastname'] ?> (<?= date_format($date, "F dS Y h:iA") ?>)</h3>
                <p><?= $review['content'] ?></p>
                <section class="reply-section">
<?php 
    $reply_query = "SELECT replies.*, users.firstname, users.lastname 
    FROM replies 
    LEFT JOIN users ON replies.user_id = users.id 
    WHERE replies.review_id = '{$review['id']}' ";

    $replies = fetch_all($reply_query);
?>
    <?php foreach($replies as $reply){     
            $date = date_create($reply['created_at']);     
    ?>
                    <h3><?= $reply['firstname'] ?> <?= $reply['lastname'] ?> (<?= date_format($date, "F dS Y h:iA") ?>)</h3>
                    <p><?= $reply['content'] ?></p>
        <?php } ?>
        <?php if (isset($_SESSION['logged_in'])) { ?>
                        <form action="process.php" method="post" class="reply-form">
                            <textarea name="reply"></textarea>
                            <input type="hidden" name="action" value="reply">
                            <input type="hidden" name="review_id" value="<?= $review['id'] ?>">
                            <div class="align-right">
                                <input type="submit" value="Reply">
                            </div>
                        </form>
        <?php } ?>
                </section>
            </section>
<?php } ?>
        </main>
    </div>
</body>
</html>