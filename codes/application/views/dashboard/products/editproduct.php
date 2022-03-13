    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script> 
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
    <script src="<?= base_url(); ?>assets/js/ajax.js"></script>

    <div class="container w-full my-4 p-2">
        <h2 class="my-2 text-2xl font-semibold text-center text-gray-900 uppercase">Edit Product - ID <?= $product['id']; ?></h2>
        <div id="response"></div>
        <form action="dashboard/update/<?= $product['id'] ?>" method="post" enctype="multipart/form-data" id="editProductForm">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" id="edit_csrf_token">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Name: </label>
                <input type="text" name="name" value="<?= $product['name']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Description: </label>
                <textarea name="description" cols="10" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?= $product['description']; ?></textarea>
            </div>

            <div class="flex">
                <div x-data="{ dropdownOpen: false }" class="w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Categories</label>
                    <button @click="dropdownOpen = !dropdownOpen" class="relative w-full h-10 rounded bg-white p-2 border shadow text-left focus:outline-none" type="button">
<?php foreach($categories as $category){ 
    if($product['product_category_id'] === $category['id']){ ?>
                        <input type="hidden" name="category" class="displayCategory" value="<?= $category['category'] ?>">
                        <label class="displayCategory"><?= $category['category']; ?></label>
<?php }} ?>             
                    </button>
                    <div x-show="dropdownOpen" class="absolute p-2 w-5/6 bg-white rounded-md shadow-xl border border-gray-200 z-20">
                        <ul id="selectCategory">
<?php foreach($categories as $category){ ?>
                            <li class="flex relative p-1 hover:bg-gray-200 hover:rounded category">                            
                                <p class="mr-5 category" data-id="<?= $category['id']; ?>"><?= $category['category']; ?></p>
                            </li>
<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">or add new category</label>
                <input type="text" name="new_category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="">
                <label class="block text-gray-700 text-sm font-bold mb-2">Add new image of product: </label>
                <input type="file" name="thumbnails[]" class="text-sm text-slate-500 file:mr-4 file:py-1 file:px-4w file:rounded-md file:border file:border-slate-300 file:text-sm file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer" multiple>
                <ul id="sortable" class="ml-5 my-2 divide-y divide-solid">
<?php foreach($img_product as $image){ ?> 
                    <li class="flex gap-x-4 items-center my-2">
                        <img src="https://img.icons8.com/material-outlined/24/000000/menu--v1.png"/>
                        <img src="<?= base_url(); ?><?= $image['filepath']; ?>" alt="" class="w-16 rounded">
                        <a href="<?= base_url(); ?>dashboard/remove_image/<?= $image['id']; ?>" class="text-red-500 image-product"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAhElEQVRIiWNgGOqAkRhFz31sGhgYGOrRdHZKbj5SQbIFz31s/hPrOmxAcssRFDOZKDGMbPDcx+Y/KT7Bp57mPiDKAnQXkuLDweGDUQtGLRi1gDLAQowi9CIYnY8PDIwPGBkYnv5nYJAmpchmZGB4ik0cuw/+/8/CpQGn4f//ZxGrfmgBAJb0K63m3ULbAAAAAElFTkSuQmCC"></a> 
                        <label><input type="checkbox" name="main_img" value="<?= $image['id']; ?>" <?= strpos($image['filepath'], 'main') ? 'checked' : '' ?> > main</label>
                    </li>
<?php } ?>
                </ul>
            </div>
            <div class="flex justify-evenly mt-4">
                <a href="<?= base_url(); ?>dashboard/products" class="mx-1 py-2 px-3 text-gray border rounded border-slate-500 hover:bg-slate-100">Cancel</a>
                <a href="<?= base_url(); ?>products/show/<?= $product['id'] ?>" target="_blank" class="mx-1 py-2 px-3 text-gray border rounded border-slate-500 hover:bg-slate-100">Preview</a>
                <input type="submit" value="Submit" class="shadow appearance-none border rounded w-full py-2 px-3 text-white rounded bg-gray-700 hover:bg-gray-900 leading-tight focus:outline-none focus:shadow-outline cursor-pointer">
            </div>
        </form>
    </div>
