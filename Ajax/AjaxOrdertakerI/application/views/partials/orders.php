<div id="orders">
<?php foreach($orders as $order){ ?>
    <div class="order-card">
        <h2><?= $order['id'] ?></h2>
        <p><?= $order['order_info'] ?></p>
    </div>
<?php } ?>
</div>
