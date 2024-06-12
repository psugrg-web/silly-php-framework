<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<h1>Add product to list</h1>

<form method="POST" action="/list">
    <!-- Name is important here since it's used to automatically generate a POST request -->
    <label for="product">Product</label>
    <textarea id="product" name="product" required><?= $_POST['product'] ?? '' ?></textarea>
    <?php if (isset($errors['product'])) : ?>
        <p><?= $errors['product'] ?></p>
    <?php endif; ?>
    <nav>
        <button type="submit">Add</button>
    </nav>
</form>

<?php require base_path('views/partials/foot.php') ?>