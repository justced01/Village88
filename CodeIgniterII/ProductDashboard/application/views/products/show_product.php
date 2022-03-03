
    <div class="wrapper">
        <div class="show-content">
            <section class="product-info">
                <h2 class="content-header"><?= $products['title'] ?></h2>
<?php $date = date_create($products['created_at']); ?>
                <p>Added since: <?= date_format($date, "F jS Y") ?></p>
                <p>Product ID: #<?= $products['id'] ?></p>
                <p>Description: <?= $products['description'] ?></p>
                <p>Total Sold: <?= $products['quantity_sold'] ?></p>
                <p>Number of available stocks: <?= $products['inventory_count'] ?></p>
            </section>
            <section class="reviews">
                <h2>Leave a review</h2>
                <div class="errors">
<?php if($this->session->flashdata('errors')){
        foreach($this->session->flashdata('errors') as $value){ ?>
                <p><?= $value ?></p>
<?php }} ?>
                </div>
                <div class="success">
<?php if($this->session->flashdata('success')){ ?>
                    <p><?= $this->session->flashdata('success') ?></p>
<?php } ?>
                </div>
                <form action="<?= base_url(); ?>products/add_message/<?= $products['id'] ?>" method="post">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>">
                    <textarea name="message"></textarea>
                    <input type="hidden" name="product_id" value="<?= $products['id'] ?>">
                    <input type="submit" value="Post">
                </form>
<?php foreach($inbox as $message){ 
        $date = date_create($message['message_date']);    
?>
                <div class="message">
                    <h3><?= $message['message_sender_name'] ?> wrote: <?= date_format($date, "F jS Y") ?></h3>
                    <p>> <?= $message['message_content'] ?></p>
                </div>
    <?php foreach($message['comments'] as $comment){ 
            $date = date_create($comment['comment_date']);  
    ?>              
                <div class="comment">
                    <h4><?= $comment['comment_sender_name'] ?> wrote: <?= date_format($date, "F jS Y") ?></h4>
                    <p>> <?= $comment['comment_content'] ?></p>
                </div>
    <?php } ?>          
                <form action="<?= base_url(); ?>products/add_comment/<?= $products['id'] ?>" method="post" class="comment_form">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                    <input type="hidden" name="message_id" value="<?= $message['message_id'] ?>">
                    <textarea name="comment"></textarea>               
                    <input type="submit" value="Post a comment"/>
                </form> 
<?php } ?>
            </section>

        </div>
	</div>
</body>
</html> 