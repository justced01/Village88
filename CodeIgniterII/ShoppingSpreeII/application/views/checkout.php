<body>
	<header>
		<h1>Newbie's Clothing</h1>
		<div class="cart">
		    <p><a href="<?= base_url('/carts/catalog'); ?>">Catalog</a></p>
		</div>
	</header>
	<div class="wrapper">
        <h2>Check Out</h2>
        <h3>Total: $<?= !empty($index['total_price']) ? $index['total_price'] : '0' ?></h3>
        <table>
            <p class="remove"><?= $this->session->flashdata('remove') ?></p>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
<?php foreach($index['items'] as $items){ ?>
            <tr>
                <td><?= $items['title']; ?></td>
                <td><?= $items['quantity']; ?></td>
                <td><?= $items['price']; ?></td>
                <td><a href="<?= base_url('/carts/remove/' . $items['item_id']) ?>">X</a></td>
            </tr>
<?php } ?>
        </table>
        <h2>Billing Info</h2>
        <p>dont mind this uwu</p>
        <p class="success"><?= $this->session->flashdata('success') ?></p>
        <form action="<?= base_url('/carts/stripe_post') ?>" method="post">
            <label for="name">Name: </label>
            <input type="text" name="name">
            <label for="address">Address: </label>
            <input type="text" name="address">
            <label for="card_num">Card number: </label>
            <input type="text" name="card_num">
            <input type="hidden" name="total_price" value="<?= $index['total_price'] ?>">
            <input type="submit" value="Submit Order">
        </form>
	</div>
