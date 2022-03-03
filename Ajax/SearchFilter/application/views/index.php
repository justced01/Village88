
	<div class="wrapper">
		<h1>Search Filter</h1> 
		<form action="/products/search" method="post">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
			<input type="text" name="title" id="" placeholder="Search by name">
			<input type="text" name="min_price" id="" size="5" placeholder="$min"> - 
			<input type="text" name="max_price" id="" size="5" placeholder="$max">
			<select name="sort" id="sort">
				<option value="ascending">Low to High Price</option>
				<option value="descending">High to Low Price</option>
			</select>
		</form>
		<div id="row">
			<table>
				<tr>
					<th>Item name</th>
					<th>Number of stock</th>
					<th>Price</th>
					<th>Date Added</th>
				</tr>
<?php foreach($products as $item){ ?>
				<tr>
					<td><?= $item['title']; ?></td>
					<td><?= $item['inventory_count']; ?></td>
					<td>$<?= $item['price']; ?></td>
					<td><?= $item['created_at']; ?></td>
				</tr>
<?php } ?>
			</table>
		</div>
	</div>
</body>
</html>