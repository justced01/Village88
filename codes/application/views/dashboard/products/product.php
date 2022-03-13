
    <div class="container w-2/3 mx-auto my-4 p-2">
        <div class="my-3 flex items-center justify-between">
            <form action="<?= base_url(); ?>dashboard/search" method="post" id="searchForm">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" id="csrf_token">
                <input type="search" name="filter" placeholder="Search" class="w-full px-2 py-1 border border-slate-500 rounded outline-0 focus:border-slate-900">
            </form>
            <div>
                <div id="addProduct" class="modal">
<?php 
    $data['categories'] = $this->product->fetch_categories();
    $this->load->view('dashboard/products/addproduct', $data); 
?>
                </div>
                <a href="#addProduct" id="addProductModal" rel="modal:open" class="p-2 text-white rounded bg-gray-700 hover:bg-gray-900">Add more product</a>
            </div>
        </div>
        <div id="product-row">
            <table class="table-auto w-full border-collapse border">
                <tr class="rounded-lg text-md font-medium text-gray-700 text-left">
                    <th class="px-4 py-2 bg-[#f8f8f8]">Image</th>
                    <th class="px-4 py-2 bg-[#f8f8f8]">ID</th>
                    <th class="px-4 py-2 bg-[#f8f8f8]">Name</th>
                    <th class="px-4 py-2 bg-[#f8f8f8]">Inventory Count</th>
                    <th class="px-4 py-2 bg-[#f8f8f8]">Quantity Sold</th>
                    <th class="px-4 py-2 bg-[#f8f8f8]">Action</th>
                </tr>
<?php foreach($products as $product){ ?>
                <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                    <td class="px-4 py-2 w-1/12"><img src="<?= base_url(); ?><?= $product['filepath']; ?>" alt="Main image of product" class="rounded"></td>
                    <td class="px-4 py-2"><?= $product['id']; ?></td>
                    <td class="px-4 py-2 w-2/5"><?= $product['name']; ?></td>
                    <td class="px-4 py-2"><?= $product['inventory_stock']; ?></td>
                    <td class="px-4 py-2"><?= $product['stock_sold']; ?></td>
                    <td class="px-4 py-2">
                        <a href="<?= base_url(); ?>dashboard/show/<?= $product['id']; ?>" rel="modal:open" class="edit-product p-2 border rounded border-slate-500 hover:bg-slate-200">Edit</a>
                        <a onClick="return confirm('Are you sure you want to delete this product?');" href="<?= base_url(); ?>dashboard/remove/<?= $product['id']; ?>" class="p-2 text-red-500 border rounded border-red-500 hover:bg-red-100">Delete</a>
                    </td>
                </tr>
<?php } ?>
            </table>
        </div>
        <footer class="product-pagination">
<?php for($paginations['page'] = 1; $paginations['page'] <= $paginations['number_of_page']; $paginations['page']++){ ?>
            <a href="<?= base_url(); ?>dashboard/products?page=<?= $paginations['page'] ?>"><?= $paginations['page'] ?></a>
<?php } ?>
        </footer>
    </div>
</body>
</html>