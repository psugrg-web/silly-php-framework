<header>
    <img src="/list-white.svg" alt="logo">
    <button class="primary-nav-toggle"></button>
    <nav class="primary-nav" data-visible="false">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/contact">Contact us</a></li>
            <?php if ($_SESSION['user'] ?? false) : ?>
                <li><a href="/list">Shopping List</a></li>
            <?php endif; ?>
        </ul>
        <?php if ($_SESSION['user'] ?? false) : ?>
            <span><?= $_SESSION['user']['email'] ?? '' ?></span>
            <form action="/session" method="POST">
                <input type="hidden" name="_method" value="DELETE" />
                <button>Log Out</button>
            </form>
        <?php else : ?>
            <a class="button" href="/register">Register</a>
            <a class="button" href="/login">Log In</a>
        <?php endif; ?>
    </nav>
</header>
<div>