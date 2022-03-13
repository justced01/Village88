
    <div class="w-11/12 mx-auto my-7 flex flex-row">
        <aside class="basis-2/12 h-fit py-4 px-7 border-2 border-silver-500">
            <form action="<?= base_url(); ?>products/search_catalog" method="post" class="flex flex-row" id="searchCatalogForm">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" class="csrf_token">
                <input type="search" name="filter" placeholder="Search" class="text-sm p-2 border border-gray-200 rounded-xl bg-[#F5F5F5] hover:bg-gray-200 focus:outline-none focus:border-gray-500 focus:ring-1 focus:ring-gray-500">
                <button type="submit"><img src="https://img.icons8.com/ios-glyphs/30/000000/search--v1.png" class="ml-2"/></button>
            </form>
            <div class="my-5">
                <h3 class="font-normal">Category</h3>
                <!-- This should be a form  -->
                <nav class="flex flex-col ml-4">
<?php foreach($categories as $category => $value){ ?>
                    <a href="<?= base_url(); ?>products/category/<?= $value['product_category_id']; ?>"><?= $category; ?> (<?= $value['total_category']; ?>)</a>
<?php } ?>
                    <a href="<?= base_url(); ?>products">Show all</a>
                </nav>
            </div>
        </aside>
        <main class="basis-10/12 ml-4 px-5 border-2 border-silver-500">
            <header class="mt-5 flex justify-between">
                <h3 class="font-normal text-3xl"><?= isset($title) ? $title : 'All Products' ?></h3>
                <nav class="product-main-header">
                    <a href="">first</a>
                    <a href="">prev</a>
                    <a href="">2</a>
                    <a href="">next</a>
                </nav>
            </header>
            <form action="<?= base_url(); ?>products/sort" method="post" class="my-4 text-right" id="sortForm">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" class="csrf_token">
                <label>Sorted by: </label>
                <select name="sort" class="text-md p-2 rounded-lg border border-gray-400 focus:outline-none focus:border-gray-500 focus:ring-1 focus:ring-gray-500">
                    <option value="desc">High Price</option>
                    <option value="asc">Low Price</option>
                </select>
            </form>
            <div id="catalogProducts">
                <section class="grid gap-4 grid-cols-5" >
<?php foreach($products as $item){ ?>
                    <div class="w-full bg-white rounded overflow-hidden bg-[#fafafa] shadow-md relative">
                        <a href="<?= base_url(); ?>products/show/<?= $item['id'] ?>">
                            <img src="<?= base_url(); ?><?= $item['filepath'] ?>" alt="Product image" class="w-full">
                            <div class="w-full p-1 absolute bottom-0 text-right backdrop-blur-lg bg-white/30">
                                <span class="text-sm text-gray-900 font-semibold"><?= $item['name'] ?></span>
                                <span class="block text-md font-semibold text-gray-900">$<?= $item['price'] ?></span>
                            </div>
                        </a>
                    </div>
<?php } ?>
                </section>
            </div>
            <footer class="product-pagination">
<?php for($paginations['page'] = 1; $paginations['page'] <= $paginations['number_of_page']; $paginations['page']++){ ?>
            <a href="<?= base_url(); ?>products/?page=<?= $paginations['page'] ?>"><?= $paginations['page'] ?></a>
<?php } ?>
            </footer>
        </main>
    </div>
</body>
</html>