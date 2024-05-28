<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

// Check if you're allowed
$product = $db->query('select * from products where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($product['user_id'] === Session::get('user')['id']);

// Delete the requested note
$db->query('delete from products where id = :id', [
    'id' => $_POST['id']
]);

header('location: /list');
exit();
