<header>
    <img class="logo" src="/list-white.svg" alt="logo">
    <nav>
        <ul class="nav_links">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <?php if ($_SESSION['user'] ?? false) : ?>
                <li><a href="/list">Shopping List</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="session">
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
    </div>
</header>
<div class="content">