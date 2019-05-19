<?php
/**
 * Created by PhpStorm.
 * User: sergii
 * Date: 19.05.19
 * Time: 15:33
 */

require_once '../vendor/autoload.php';

$dirPager = new \SergiiZazymko\Paginator\DirPaginator(
    new \SergiiZazymko\Paginator\View(),
    '/',
    5
);

var_dump($dirPager->getCurrentItems());die;