<?php session_start(); 
    require('conn.php');
    date_default_timezone_set("Asia/Singapore");
    $messages_query = "SELECT messages.* , users.firstname, users.lastname 
                    FROM messages 
                    LEFT JOIN users ON messages.user_id = users.id
                    ORDER BY messages.created_at DESC";
    $messages = fetch_all($messages_query);

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

<h2>Welcome <?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ; ?>!</h2>
<a href="./process.php">Sign out</a>

<style>
    textarea {
        width: 300px;
        height: 100px;
    }
    form input[type="submit"]{
        display: block;
        margin-top: 10px;
        padding: 5px;
        background-color: blue;
        color: white;
    }
    p, h3 {
        margin-left: 10px;
    }
    .comment-form {
        margin-left: 20px;
    }
</style>


<h1>The Wall</h1>
<?= print_message(); ?>
<h2>Post a message:</h2>
<form action="process.php" method="post">
    <textarea name="messages"></textarea>
    <input type="hidden" name="action" value="message">
    <input type="submit" value="Create message">
</form>

<?php foreach($messages as $message){     
        $date = date_create($message['created_at']);     
?>
    <h2>Message of <?= $message['firstname'] ?> <?= $message['lastname'] ?> (<?= date_format($date, "F dS Y h:iA") ?>)</h2>
    <p><?= $message['message'] ?></p>

<?php 
    $comments_query = "SELECT comments.*, users.firstname, users.lastname 
    FROM comments 
    LEFT JOIN users ON comments.user_id = users.id 
    WHERE comments.message_id = '{$message['id']}' ";

    $comments = fetch_all($comments_query);
?>
<?php foreach($comments as $comment){     
        $date = date_create($comment['created_at']);     
?>
    <h3>Comment of <?= $comment['firstname'] ?> <?= $comment['lastname'] ?> (<?= date_format($date, "F dS Y h:iA") ?>)</h3>
    <p><?= $comment['comment'] ?></p>

<?php } ?>
    <form action="process.php" method="post" class="comment-form">
        <textarea name="comments"></textarea>
        <input type="hidden" name="action" value="comment">
        <input type="hidden" name="message_id" value="<?= $message['id'] ?>">
        <input type="submit" value="Create comment">
    </form>
<?php } ?>