<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<h1> Shopping List </h1>

<table>
    <?php foreach ($products as $product) : ?>
        <tr>
            <td>
                <a href="/list/edit?id=<?= $product["id"] ?>">
                    <?= htmlspecialchars($product["product"]) ?>
                </a>
            </td>
            <td>
                <form method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $product["id"] ?>">
                    <button>Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br><br>
<a href="/list/create">Add product</a>

<?php require base_path('views/partials/foot.php') ?>