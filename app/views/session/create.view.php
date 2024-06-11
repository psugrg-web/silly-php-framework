<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<h1>Log In</h1>

<form action="/session" method="post">
    <input id="email" name="email" type="email" autocomplete="email" required placeholder="Email address" value="<?= old('email') ?>">
    <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="Password">
    <button type="submit">Submit</button>

    <?php if (isset($errors['email'])) : ?>
        <p><?= $errors['email'] ?></p>
    <?php endif; ?>
    <?php if (isset($errors['password'])) : ?>
        <p><?= $errors['password'] ?></p>
    <?php endif; ?>
</form>

<?php require base_path('views/partials/foot.php') ?>