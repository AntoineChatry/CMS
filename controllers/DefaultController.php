<?php
namespace Controllers;
class DefaultController {
    public static function blog() {
        require_once("views/blog.php");
    }
    public static function register() {
        require_once("views/register.php");
    }
}


