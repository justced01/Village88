<?php foreach($items as $item){ ?>
        <form action="items/update/<?= $item['id'] ?>" method="post" class="item-form">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <div class="checkbox-field">
                <input type="checkbox" class="item-check" name="item" value="<?= $item['item'] ?>">
                <label><?= $item['item'] ?></label>
            </div>
        </form>
<?php } ?>