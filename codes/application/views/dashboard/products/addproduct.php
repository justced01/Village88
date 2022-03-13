
    <div id="addProduct" class="container w-full my-4 p-2">
        <h2 class="my-2 text-2xl font-semibold text-center text-gray-900 uppercase">Add a new Product</h2>
        <div id="errors" class="text-red-500"></div>
        <form action="dashboard/new" method="post" enctype="multipart/form-data" id="addProductForm">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" id="csrf_token">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name: </label>
                <input type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description: </label>
                <textarea name="description" id="" cols="10" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div class="mb-4 flex">
                <div>
                    <label for="price" class="text-gray-700 text-sm font-bold mb-2">Product Price: </label>
                    <input type="number" name="price" min="0" maxlength="6" class="shadow appearance-none border rounded w-1/3 py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <label for="stock" class="text-gray-700 text-sm font-bold mb-2">Inventory Stock: </label>
                    <input type="number" name="inventory_stock" min="0" maxlength="6" class="shadow appearance-none border rounded w-1/3 py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>
            <div class="mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Categories: </label>
                <select name="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value=""></option>
<?php foreach($categories as $category){ ?>
                        <option value="<?= $category['id']; ?>"><?= $category['category']; ?></option>
<?php } ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="new_category" class="block text-gray-700 text-sm font-bold mb-2">or add new category</label>
                <input type="text" name="new_category"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Main image of Product: </label>
                <input type="file" name="main_img" class="text-sm text-slate-500 file:mr-4 file:py-1 file:px-4w file:rounded-md file:border file:border-slate-300 file:text-sm file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Thumbnails of Product: </label>
                <input type="file" name="thumbnails[]" class="text-sm text-slate-500 file:mr-4 file:py-1 file:px-4w file:rounded-md file:border file:border-slate-300 file:text-sm file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer" multiple>
            </div>
            <div class="mb-4">
                <input type="submit" value="Submit" class="shadow appearance-none border rounded w-full py-2 px-3 text-white rounded bg-gray-700 hover:bg-gray-900 leading-tight focus:outline-none focus:shadow-outline cursor-pointer">
            </div>
        </form>
    </div>
