<?php

class AdditionTest extends \PHPUnit\Framework\TestCase
{

    /** @test */
    public function adds_up_given_operands()
    {

        $addition = new \App\Calculator\Addition;
        $addition->setOperands([5, 10]);


        $this->assertEquals(15, $addition->calculate());
    }


    /** @test */
    public  function no_opernads_given_throes_exception_when_calculating()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $addition = new \App\Calculator\Addition();
        $addition->calculate();
    }
}