<?php
namespace fauxcompany\EscreveNumero\Test;

use PHPUnit\Framework\TestCase;
use fauxcompany\EscreveNumero\Numero;

final class NumeroTest extends TestCase
{
    public function testNumeroExtenso()
    {
        $this->assertEquals(
            "novecentos e noventa e nove com noventa e nove",
            Numero::extenso("999.99")
        );
    }

    public function testNumeroInteiroZero()
    {
        $this->assertEquals(
            "noventa e nove",
            Numero::extenso("0.99")
        );
    }

    public function testNumeroInteiroZeroEscrever()
    {
        $this->assertEquals(
            "zero com noventa e nove",
            Numero::extenso("0.99", Numero::NORMAL, true)
        );
    }

    public function testNumeroFracaoZeroEscrever()
    {
        $this->assertEquals(
            "zero com nove",
            Numero::extenso("0.09", Numero::NORMAL, true)
        );
    }
}