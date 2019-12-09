<?php

namespace Tests;

use Carbon\Carbon;
use Igrejanet\Support\Datas;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    public function testToBr()
    {
        $this->assertEquals('25/04/1900', Datas::toBr('1900-04-25'));
        $this->assertNull(Datas::toBr());
    }

    public function testToSql()
    {
        $this->assertEquals('2018-04-25', Datas::toSql('25/04/2018'));
        $this->assertNull(Datas::toSql());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Month number invalid
     */
    public function testMonths()
    {
        $months     = Datas::meses();
        $month      = Datas::meses(4);
        $invalid    = Datas::meses(13);

        $this->assertInternalType('array', $months);
        $this->assertEquals('Outubro', $months[10]);
        $this->assertEquals('Abril', $month);
    }

    public function testToday()
    {
        $this->assertEquals(Carbon::today('America/Sao_Paulo')->format('d/m/Y'), Datas::today());
    }
}
