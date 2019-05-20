<?php
/**
 * Created by PhpStorm.
 * User: sergii
 * Date: 19.05.19
 * Time: 15:33
 */

require_once '../vendor/autoload.php';

$paginator = new \SergiiZazymko\Paginator\DirPaginator(
    new \SergiiZazymko\Paginator\DirView(),
    '/home/sergii/.config',
    5,
    3
);

foreach ($paginator->getCurrentItems() as $item) {
    echo "<p>$item</p>";
}

echo "<p>$paginator</p>";