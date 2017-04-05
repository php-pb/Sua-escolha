<?php

$router = $di->getRouter();

$router->add('/login', [
    'controller' => 'usuario',
    'action'     => 'login',
]);

$router->add('/logout', [
    'controller' => 'usuario',
    'action'     => 'logout',
]);

$router->handle();
