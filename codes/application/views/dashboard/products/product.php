
    <div class="container w-2/3 mx-auto my-4 p-2">
        <div class="my-3 flex items-center justify-between">
            <form action="" class="">
                <input type="search" name="" id="" placeholder="Search" class="w-full px-2 py-1 border border-slate-500 rounded outline-0 focus:border-slate-900">
            </form>
            <div>
                <!-- Modal HTML embedded directly into document -->
                <div id="addProduct" class="modal">
<?php 
    $data['categories'] = $this->product->fetch_categories();
    $this->load->view('dashboard/products/addproduct', $data); 
?>
                </div>
                <!-- Link to open the modal -->
                <a href="#addProduct" id="addProductModal" rel="modal:open" class="p-2 text-white rounded bg-gray-700 hover:bg-gray-900">Add more product</a>
            </div>
        </div>
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
                <td class="px-4 py-2 w-1/12"><img src="<?= $product['filepath']; ?>" alt="Main image of product" class="rounded"></td>
                <td class="px-4 py-2"><?= $product['id']; ?></td>
                <td class="px-4 py-2 w-2/5"><?= $product['name']; ?></td>
                <td class="px-4 py-2"><?= $product['inventory_stock']; ?></td>
                <td class="px-4 py-2"><?= $product['stock_sold']; ?></td>
                <td class="px-4 py-2">
                    <a href="<?= base_url(); ?>products/show/<?= $product['id']; ?>" rel="modal:open" class="edit-product p-2 border rounded border-slate-500 hover:bg-slate-200">edit</a>
                    <a href="" class="p-2 text-red-500 border rounded border-red-500  hover:bg-red-100">delete</a>
                </td>
            </tr>
<?php } ?>
        </table>
        <footer class="product-pagination">
            <a href="">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a href="">4</a>
            <a href="">5</a>
            <a href="">6</a>
            <a href="">7</a>
            <a href="">8</a>
            <a href="">9</a>
            <a href="">10</a>
            <a href="">-></a>
        </footer>
    </div>
</body>
</html>