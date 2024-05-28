<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<h1> Register here! </h1>

<form action="/register" method="post">
    <div>
        <label for="email">Email address</label>
        <input id="email" name="email" type="email" autocomplete="email" required placeholder="Email address">

        <?php if (isset($errors['email'])) : ?>
            <p><?= $errors['email'] ?></p>
        <?php endif; ?>
    </div>
    <div>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="Password">

        <?php if (isset($errors['password'])) : ?>
            <p><?= $errors['password'] ?></p>
        <?php endif; ?>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>

<?php require base_path('views/partials/foot.php') ?>