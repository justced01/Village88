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

