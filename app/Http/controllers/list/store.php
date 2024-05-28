<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['product'], 1, 255)) {
    $errors['product'] = 'The product name of no more than 255 characters is required';
}

// TODO: This should be handled using 'throw', ideally in a dedicated class 'AddProductForm' (refer to LoginForm)
if (!empty($errors)) {
    return view('/list/create.view.php', [
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO products(product, user_id) VALUES(:product, :user_id)', [
    'product' => $_POST['product'],
    'user_id' => Session::get('user')['id']
]);

header('location: /list');
die();
