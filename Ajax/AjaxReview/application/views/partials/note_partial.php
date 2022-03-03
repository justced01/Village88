<?php foreach ($notes as $note){ ?>
    <div class="form-notes">
        <h2><?= $note['title'] ?></h2>
        <form action="update/<?= $note['id'] ?>" method="post" class="update-form">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <textarea name="content"><?= $note['content'] ?></textarea>
            <input type="submit" class="update-btn" value="Update">
        </form>
        <form action="remove/<?= $note['id'] ?>" method="post" class="delete-form">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="submit" class="remove-btn" value="Remove">
        </form>
	</div>
<?php } ?>