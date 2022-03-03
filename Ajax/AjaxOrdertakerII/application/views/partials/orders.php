<div id="order">
<?php foreach($orders as $order){ ?>
    <div class="order-card">
        <form action="delete" method="post" class="delete-form">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
            <input type="submit" value="X">
        </form>
        <h2><?= $order['id'] ?></h2>
        <form action="update" method="post" class="update-form">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
            <p><?= $order['order_info'] ?></p>
        </form>
    </div>
<?php } ?>
</div>
