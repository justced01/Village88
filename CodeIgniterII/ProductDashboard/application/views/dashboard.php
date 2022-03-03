
    <div class="wrapper">
        <div class="dashboard-content">
            <h2 class="content-header"><?= $user_level === 'admin' ? 'Manage' : 'All' ?> Products</h2>
<?php if($user_level === 'admin'){ ?>
            <a href="products/new" class="contentBtn">Add new</a>
<?php } ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Inventory Count</th>
                    <th>Quantity Sold</th>
<?php if($user_level === 'admin'){ ?>
                    <th>Action</th>
<?php } ?>
                </tr>
<?php foreach($header['products'] as $product){ ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><a href="products/show/<?= $product['id'] ?>"><?= $product['title'] ?></a></td>
                    <td><?= $product['inventory_count'] ?></td>
                    <td><?= $product['quantity_sold'] ?></td>
<?php if($user_level === 'admin'){ ?>
                    <td class="actionBtn"><a href="products/edit/<?= $product['id'] ?>">Edit</a> <a href="products/remove/<?= $product['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');">Remove</a></td>
                </tr>
<?php }} ?>
            </table>
        </div>
    </div>