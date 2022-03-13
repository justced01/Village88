    <div id="csrf" data-csrf="<?= $token; ?>"></div>
    <section class="grid gap-4 grid-cols-5">
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