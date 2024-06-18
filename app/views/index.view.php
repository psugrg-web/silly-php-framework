<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>

<div>
    <h1>Send email</h1>
    <form method="POST" action="/mail">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" required></input>

        <label for="email">Email</label>
        <input id="email" name="email" type="email" placeholder="Email address" required>

        <label for="subject">Subject</label>
        <input id="subject" name="subject" type="text" required></input>

        <label for="message">Message</label>
        <textarea id="message" name="message" required></textarea>
        <nav>
            <button type="submit">Send</button>
        </nav>
    </form>
</div>


<?php require 'partials/foot.php' ?>