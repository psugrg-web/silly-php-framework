<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>

<div>
    <h1>Send email</h1>
    <form method="POST" action="/mail">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" value="<?= old('name') ?>" required>

        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="<?= old('email_addr') ?>" placeholder="Email address" required>

        <label for="subject">Subject</label>
        <input id="subject" name="subject" type="text" value="<?= old('subject') ?>" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" required><?= old('message') ?></textarea>
        <?php if (isset($errors['email'])) : ?>
            <b><?= $errors['email'] ?></b>
        <?php endif; ?>
        <nav>
            <button type="submit">Send</button>
        </nav>
    </form>
</div>


<?php require 'partials/foot.php' ?>