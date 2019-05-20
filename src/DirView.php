<?php
/**
 * Created by PhpStorm.
 * User: sergii
 * Date: 20.05.19
 * Time: 19:25
 */

namespace SergiiZazymko\Paginator;

/**
 * Class FilesView
 * @package SergiiZazymko\Paginator
 */
class DirView extends View
{
    /**
     * @param Paginator $paginator
     * @return mixed|string
     */
    public function render(Paginator $paginator)
    {
        $this->paginator = $paginator;

        /** @var string $paginatorString */
        $paginatorString = '';

        /** @var int $curentPage */
        $curentPage = $this->paginator->getCurrentPage();

        /** @var int $visibleLinksCount */
        $visibleLinksCount = $this->paginator->getVisibleLinksCount();

        /** @var int $totalPageCount */
        $totalPageCount = $this->paginator->getTotalPageCount();

        $paginatorString .= $this->link('&lt;&lt;', 1) . '...';

        if ($curentPage !== 1) {
            $paginatorString .= $this->link('&lt;', 1) . ' ';
        }

        if ($curentPage > $visibleLinksCount + 1) {
            /** @var int $init */
            $init = $curentPage - $visibleLinksCount;

            /** @var int $i */
            for ($i = $init; $i < $curentPage; $i++) {
                $paginatorString .= $this->link($i, $i) . ' ';
            }
        } else {
            for ($i = 1; $i < $curentPage; $i++) {
                $paginatorString .= $this->link($i, $i) . ' ';
            }
        }

        $paginatorString .= "$i ";

        if ($curentPage + $visibleLinksCount < $totalPageCount) {
            /** @var int $cond */
            $cond = $curentPage + $visibleLinksCount;

            /** @var int $i */
            for ($i = $curentPage + 1; $i <= $cond; $i++) {
                $paginatorString .= $this->link($i, $i) . ' ';
            }
        } else {
            for ($i = $curentPage + 1; $i <= $totalPageCount; $i++) {
                $paginatorString .= $this->link($i, $i) . ' ';
            }
        }

        if ($curentPage !== $totalPageCount) {
            $paginatorString .= $this->link('&gt;', $curentPage + 1) . '...';
        }

        $paginatorString .= $this->link('&gt;&gt;', $totalPageCount);

        return $paginatorString;
    }
}
