<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

// find corresponding note
$product = $db->query('select * from products where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// Check if you're allowed
authorize($product['user_id'] === Session::get('user')['id']);

// validate form
$errors = [];

if (!Validator::string($_POST['product'], 1, 255)) {
    $errors['product'] = 'The product name of no more than 255 characters is required';
}

// TODO: This should be handled using 'throw', ideally in a dedicated class 'EditProductForm' (refer to LoginForm)
if (!empty($errors)) {
    return view('/list/edit.view.php', [
        'errors' => $errors,
        'product' => $product
    ]);
}

// if no validation errors, update record ind DB
$db->query('update products set product = :product where id = :id', [
    'id' => $_POST['id'],
    'product' => $_POST['product']
]);

// redirect the user
header('location: /list');
die();
