<?php

use Core\App;
use Core\Database;
use Core\Authenticator;
use Http\Forms\RegistrationForm;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

$form = RegistrationForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$authenticator = new Authenticator;

$registered = ($authenticator)->register(
    $attributes['email'],
    $attributes['password']
);

if (!$registered) {
    $form->error(
        'email',
        'This username cannot be used, please select different one.'
    )->throw();
}

$signedIn = ($authenticator)->attempt(
    $attributes['email'],
    $attributes['password']
);

if (!$signedIn) {
    $form->error(
        'password',
        'No matching account found for that email address and password'
    )->throw();
}

// User is logged-in
redirect('/');
