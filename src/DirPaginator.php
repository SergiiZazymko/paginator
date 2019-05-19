<?php
/**
 * Created by PhpStorm.
 * User: sergii
 * Date: 19.05.19
 * Time: 15:39
 */

namespace SergiiZazymko\Paginator;

/**
 * Class DirPaginator
 *
 * @package SergiiZazymko\Paginator
 */
class DirPaginator extends Paginator
{
    /**
     * @var string $dirName;
     */
    protected $dirName;

    /**
     * DirPaginator constructor.
     *
     * @param View   $view
     * @param string $dirName
     * @param int    $itemsPerPage
     * @param int    $visibleLinksCount
     * @param null   $parameters
     * @param string $counterParam
     */
    public function __construct(
        View $view,
        $dirName = '.',
        $itemsPerPage = 10,
        $visibleLinksCount = 3,
        $parameters = null,
        $counterParam = 'page'
    ) {
        $this->dirName = $dirName;
        parent::__construct($view, $itemsPerPage, $visibleLinksCount, $parameters, $counterParam);
    }

    /**
     * @inheritdoc
     */
    public function getTotalItemsCount()
    {
        /**
        * @var int $fileCounter
        */
        $fileCounter = 0;

        /**
        * @var \DirectoryIterator $directoryIterator
        */
        $directoryIterator = new \DirectoryIterator($this->dirName);

        /**
         * @var \DirectoryIterator $file
        */
        foreach ($directoryIterator as $file) {
            if ($file->isFile()) {
                $fileCounter++;
            }
        }

        return $fileCounter;
    }

    /**
     * @inheritdoc
     */
    public function getCurrentItems()
    {
        /**
        * @var int $currentPage
        */
        $currentPage = $this->getCurrentPage();

        if ($currentPage <= 0 || $currentPage > $this->getTotalPageCount()) {
            return 0;
        }

        /**
        * @var array $currentItems
        */
        $currentItems = [];

        /**
        * @var \DirectoryIterator $directoryIterator
        */
        $directoryIterator = new \DirectoryIterator($this->dirName);

        /**
        * @var int $counter
        */
        $counter = -1;

        /**
        * @var int $firstItem
        */
        $firstItem = $this->getItemsPerPage() * ($this->getCurrentPage() - 1);

        /**
        * @var \DirectoryIterator $file
        */
        foreach ($directoryIterator as $file) {
            if ($file->isFile()) {

                $counter++;

                if ($counter < $firstItem) {
                    continue;
                }

                if ($counter > $firstItem + $this->getItemsPerPage() - 1) {
                    break;
                }

                $currentItems[] = $file->getPathname();
            }
        }

        return $currentItems;
    }
}
