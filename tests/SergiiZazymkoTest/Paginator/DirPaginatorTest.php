<?php
/**
 * Created by PhpStorm.
 * User: sergii
 * Date: 25.05.19
 * Time: 11:33
 */

namespace SergiiZazymkoTest\Paginator;

use PHPUnit\Framework\TestCase;
use SergiiZazymko\Paginator\DirPaginator;
use SergiiZazymko\Paginator\DirView;
use SergiiZazymko\Paginator\Paginator;

/**
 * Class DirPaginatorTest
 * @package SergiiZazymkoTest\Paginator
 */
class DirPaginatorTest extends TestCase
{
    /** @var DirPaginator$instance */
    private $instance;

    /**
     *
     */
    protected function setUp(): void
    {
        $this->instance = new DirPaginator(new DirView);
        parent::setUp();
    }

    /**
     *
     */
    public function testInstance()
    {
        $this->assertInstanceOf(Paginator::class, $this->instance);
        $this->assertInstanceOf(DirPaginator::class, $this->instance);
    }
}
