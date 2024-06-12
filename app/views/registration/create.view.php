<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<h1> Register here! </h1>

<form action="/register" method="post">
    <label for="email">Email</label>
    <input id="email" name="email" type="email" autocomplete="email" required placeholder="Email address" value="<?= old('email') ?>">
    <?php if (isset($errors['email'])) : ?>
        <b><?= $errors['email'] ?></b>
    <?php endif; ?>

    <label for="password">Password</label>
    <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="Password">
    <?php if (isset($errors['password'])) : ?>
        <b><?= $errors['password'] ?></b>
    <?php endif; ?>

    <nav>
        <button type="submit">Submit</button>
    </nav>
</form>

<?php require base_path('views/partials/foot.php') ?>