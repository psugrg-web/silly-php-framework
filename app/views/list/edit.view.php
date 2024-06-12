<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<h1>Edit product</h1>

<form method="POST" action="/list">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <!-- Name is important here since it's used to automatically generate a POST request -->
    <label for="product">Product</label>
    <div>
        <textarea id="product" name="product" required><?= $product['product'] ?></textarea>
        <?php if (isset($errors['product'])) : ?>
            <p><?= $errors['product'] ?></p>
        <?php endif; ?>
    </div>
    <nav>
        <button type="submit">Update</button>
        <a href="/list">Cancel</a>
    </nav>
</form>

<?php require base_path('views/partials/foot.php') ?>