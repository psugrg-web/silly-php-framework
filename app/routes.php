<?php

$router->get('/', 'index.php');
$router->get('/contact', 'contact.php');

$router->post('/mail', 'email/send.php');

$router->get('/list', 'list/index.php')->only('auth');
$router->post('/list', 'list/store.php')->only('auth');
$router->delete('/list', 'list/destroy.php')->only('auth');
$router->get('/list/create', 'list/create.php')->only('auth');
$router->get('/list/edit', 'list/edit.php')->only('auth');
$router->patch('/list', 'list/update.php')->only('auth');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');
