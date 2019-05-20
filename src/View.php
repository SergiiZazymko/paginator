<?php
/**
 * Created by PhpStorm.
 * User: sergii
 * Date: 19.05.19
 * Time: 15:57
 */

namespace SergiiZazymko\Paginator;

/**
 * Class View
 *
 * @abstract
 * @package SergiiZazymko\Paginator
 */
abstract class View
{
    /**
     * @var Paginator $paginator
     */
    protected $paginator;

    /**
     * @param $title
     * @param int $currentPage
     * @return string
     */
    public function link($title, $currentPage = 1)
    {
        return "<a href='{$this->paginator->getCurrentPagePath()}?{$this->paginator->getCounterParam()}={$currentPage}'"
            . "{$this->paginator->getParameters()}'>{$title}</a>";
    }

    /**
     * @abstract
     * @param Paginator $paginator
     * @return mixed
     */
    abstract public function render(Paginator $paginator);
}
