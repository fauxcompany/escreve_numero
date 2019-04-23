<?php
namespace fauxcompany\EscreveNumero\Test;

use PHPUnit\Framework\TestCase;
use fauxcompany\EscreveNumero\Numero;

final class NumeroTest extends TestCase
{
    public function testNumeroPorExtenso()
    {
        $this->assertEquals(
            "novecentos e noventa e nove com noventa e nove",
            Numero::porExtenso("999.99")
        );
    }
}