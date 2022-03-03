
    <div class="wrapper">
        <main class="add-product-wrapper">
            <header>
                <h2>Add Product</h2>
                <a href="<?= base_url(); ?>dashboard" class="contentBtn">Return to Dashboard</a>
            </header>
            <form action="products/validate" method="post" class="add-product-form">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"/>
                    <div class="input-fields">
                        <label for="title">Name: </label>
                        <input type="text" name="title" id="title">
                    </div>
                    <div class="input-fields">
                        <label for="description">Description: </label>
                        <textarea name="description" id="description"></textarea>
                    </div>
                    <div class="input-fields">
                        <label for="price">Price: </label>
                        <input type="text" name="price" id="price">
                    </div>
                    <div class="input-fields">
                        <label for="inventory_count">Inventory Count: </label>
                        <input type="number" name="inventory_count" id="inventory_count" min="0">
                    </div>
                    <input class="loginBtn" type="submit" value="Create">
                </form>
        </main>
    </div>