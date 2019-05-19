<?php
/**
 * Created by PhpStorm.
 * User: sergii
 * Date: 19.05.19
 * Time: 14:53
 */

namespace SergiiZazymko\Paginator;

/**
 * Class Paginator
 *
 * @package SergiiZazymko\Paginator
 */
abstract class Paginator
{
    /**
     * @var View $view 
     */
    protected $view;

    /**
     * @var string $parameters 
     */
    protected $parameters;

    /**
     * @var string $counterParam 
     */
    protected $counterParam;

    /**
     * @var int $visibleLinksCount 
     */
    protected $visibleLinksCount;

    /**
     * @var int $itemsPerPage 
     */
    protected $itemsPerPage;

    /**
     * Paginator constructor.
     *
     * @param View   $view
     * @param int    $itemsPerPage
     * @param int    $visibleLinksCount
     * @param null   $parameters
     * @param string $counterParam
     */
    public function __construct(
        View $view,
        $itemsPerPage = 10,
        $visibleLinksCount = 3,
        $parameters = null,
        $counterParam = 'page'
    ) {
        $this->view = $view;
        $this->parameters = $parameters;
        $this->itemsPerPage = $itemsPerPage;
        $this->visibleLinksCount = $visibleLinksCount;
        $this->counterParam = $counterParam;
    }

    /**
     * @abstract
     * @return   int
     */
    abstract public function getTotalItemsCount();

    /**
     * @abstract
     * @return   array
     */
    abstract public function getCurrentItems();

    /**
     * @return string
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return string
     */
    public function getCounterParam()
    {
        return $this->counterParam;
    }

    /**
     * @return int
     */
    public function getVisibleLinksCount()
    {
        return $this->visibleLinksCount;
    }

    /**
     * @return int
     */
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @return string
     */
    public function getCurrentPagePath()
    {
        return $_SERVER['PHP_SELF'];
    }

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return isset($_GET[$this->getCounterParam()]) ? (int) $_GET[$this->getCounterParam()] : 1;
    }

    /**
     * @return int
     */
    public function getTotalPageCount()
    {
        /**
        * @var int $totalPageCount
        */
        $totalPageCount = $this->getTotalItemsCount();

        /**
        * @var int $result
        */
        $result = intval($totalPageCount / $this->getItemsPerPage());

        if ($result - $totalPageCount / $this->getItemsPerPage() !== 0) {
            $result++;
        }

        return $result;
    }

    /**
     * @return string
     */
    public function render()
    {
        return $this->view->render($this);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }
}
