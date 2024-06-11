<header>
    <img src="/list-white.svg" alt="logo">
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <?php if ($_SESSION['user'] ?? false) : ?>
                <li><a href="/list">Shopping List</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <nav>
        <?php if ($_SESSION['user'] ?? false) : ?>
            <h3><?= $_SESSION['user']['email'] ?? '' ?></h3>
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
<div class="content">