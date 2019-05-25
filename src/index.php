<?php
/**
 * Created by PhpStorm.
 * User: sergii
 * Date: 25.05.19
 * Time: 13:35
 */

spl_autoload_register(function ($class) {
    $file = array_pop(explode('\\', $class));
    require_once "$file.php";
});