<?php

namespace Tests;

use Carbon\Carbon;
use Igrejanet\Support\Date;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    protected $date;

    public function setUp()
    {
        $this->date = new Date();
        parent::setUp();
    }

    public function testToBr()
    {
        $date = new Date;

        $converted  = $date->toBr('1900-04-25');
        $nullable   = $date->toBr();

        $this->assertEquals('25/04/1900', $converted);
        $this->assertNull($nullable);
    }

    public function testToSql()
    {
        $date = new Date;

        $converted  = $date->toSql('25/04/2018');
        $nullable   = $date->toSql();

        $this->assertEquals('2018-04-25', $converted);
        $this->assertNull($nullable);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Month number invalid
     */
    public function testMonths()
    {
        $date = new Date;

        $months     = $date->months();
        $month      = $date->months(4);
        $invalid    = $date->months(13);

        $this->assertInternalType('array', $months);
        $this->assertEquals('Outubro', $months[10]);
        $this->assertEquals('Abril', $month);
    }

    public function testToday()
    {
        $date = new Date();

        $today = $date->today();

        $this->assertEquals(Carbon::today('America/Sao_Paulo')->format('d/m/Y'), $today);
    }
}
