<?php
require_once('inc/boilerplate.php');


$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/views/index.php';
        break;
    case '' :
        require __DIR__ . '/views/index.php';
        break;
    case '/register' :
        require __DIR__ . '/views/register.php';
        break;
    case '/blog' :
        require __DIR__ . '/views/accueil.php';
        break;
    case '/blog/post' :
        require __DIR__ . '/views/blog.php';
        break;
    case '/admin' :
        require __DIR__ . '/views/admin.php';
        break;
    case '/logout' :
        require __DIR__ . '/views/logout.php';
    break;
    case '/delete' :
        require __DIR__ . '/views/delete.php';
    break;
}
 ?>