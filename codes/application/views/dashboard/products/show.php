    <div class="container w-2/3 mx-auto my-4 p-2">
        <header>
            <a href="<?= base_url(); ?>products" class="my-2 p-2 rounded bg-gray-800 text-white hover:bg-gray-700 cursor-pointer">Go Back</a>
            <h2 class="mt-2 text-3xl font-normal"><?= $product['name']; ?></h2>
        </header>
        <main class="my-5">
            <section class="flex">
                <aside class="container basis-6/12 border border-gray-300 rounded">
                    <div class="w-full block flex justify-center">
<?php foreach($product_imgs as $image){
    if(strpos($image['filepath'], 'main')){ ?>
                        <img src="<?= base_url(); ?><?= $image['filepath']; ?>" alt="Product main image" class="rounded">
<?php }} ?>
                    </div>
                    <div class="grid gap-x-2 grid-cols-5 p-2">
<?php foreach($product_imgs as $image){ ?>
                        <img src="<?= base_url(); ?><?= $image['filepath']; ?>" alt="Product images" class="rounded">
<?php } ?>
                    </div>
                </aside>
                <article class="basis-2/5 px-5">
                    <div class="mb-5">
                        <h3 class="text-2xl font-semibold">Product Details</h3>
                        <p class="text-base leading-6 tracking-wide"><?= $product['description']; ?></p>
                    </div>
                    <div class="mb-5 text-lg">
                        <p><span class="font-semibold">Price:</span> $<?= $product['price']; ?></p>
                        <p><span class="font-semibold">Stocks:</span> <?= $product['inventory_stock']; ?> stocks available</p>
                    </div>
                    <form action="#buy" method="" class="basis-full flex justify-end" id="buyForm">
                        <input type="submit" value="Buy" class="mx-1 px-4 rounded bg-gray-800 text-white hover:bg-gray-700 cursor-pointer">
                        <select name="quantity" id="" class="p-2 cursor-pointer border border-silver rounded-lg hover: focus:outline-none focus:border-gray-500 focus:ring-1 focus:ring-gray-500">
                            <option value="">1 ($19.99)</option>
                            <option value="">2 ($39.98)</option>
                            <option value="">3 ($59.97)</option>
                        </select>
                    </form>
                    <div id="notif" class="hidden w-full mt-5 p-1 bg-green-700 text-white rounded">Success</div>
                </article>
            </section>
        </main>
        <footer>
            <h3 class="mb-4 text-2xl font-normal">Similar items</h3>
            <div class="grid gap-x-2 grid-cols-6">
<?php foreach($similar_products as $similar_product){ ?>
                <div class="bg-white rounded overflow-hidden bg-[#fafafa] shadow-md">
                    <a href="<?= base_url(); ?>products/show/<?= $similar_product['id'] ?>">
                        <img src="<?= base_url(); ?><?= $similar_product['filepath'] ?>" alt="Product image">
                        <div class="m-2">
                            <span class="text-sm text-gray-900 font-semibold"><?= $similar_product['name'] ?></span>
                            <span class="block text-md font-semibold text-gray-900">$<?= $similar_product['price'] ?></span>
                        </div>
                    </a>
                </div>
<?php } ?>
            </div>
        </footer>
    </div>
</body>
</html>