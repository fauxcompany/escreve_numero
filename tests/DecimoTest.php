<?php
namespace fauxcompany\EscreveNumero\Test;

use PHPUnit\Framework\TestCase;
use fauxcompany\EscreveNumero\Numero;

final class DecimoTest extends TestCase
{
	public function testDecimo()
	{
		$this->assertEquals(
			"um décimo",
			Numero::extenso("0.1", Numero::DECIMAL)
		);
	}

	public function testCentesimo()
	{
		$this->assertEquals(
			"um centésimo",
			Numero::extenso("0.01", Numero::DECIMAL)
		);
	}

	public function testMilesimo()
	{
		$this->assertEquals(
			"um milésimo",
			Numero::extenso("0.001", Numero::DECIMAL)
		);
	}

	public function testDecimoMilesimo()
	{
		$this->assertEquals(
			"um décimo de milésimo",
			Numero::extenso("0.0001", Numero::DECIMAL)
		);
	}

	public function testCentesimoMilesimo()
	{
		$this->assertEquals(
			"um centésimo de milésimo",
			Numero::extenso("0.00001", Numero::DECIMAL)
		);
	}

	public function testMilionesimo()
	{
		$this->assertEquals(
			"um milionésimo",
			Numero::extenso("0.000001", Numero::DECIMAL)
		);
	}

	public function testDecimoMilionesimo()
	{
		$this->assertEquals(
			"um décimo de milionésimo",
			Numero::extenso("0.0000001", Numero::DECIMAL)
		);
	}

	public function testCentesimoMilionesimo()
	{
		$this->assertEquals(
			"um centésimo de milionésimo",
			Numero::extenso("0.00000001", Numero::DECIMAL)
		);
	}

	public function testBilionesimo()
	{
		$this->assertEquals(
			"um bilionésimo",
			Numero::extenso("0.000000001", Numero::DECIMAL)
		);
	}

	public function testDeciomoBilionesimo()
	{
		$this->assertEquals(
			"um décimo de bilionésimo",
			Numero::extenso("0.0000000001", Numero::DECIMAL)
		);
	}

	public function testCentesimoBilionesimo()
	{
		$this->assertEquals(
			"um centésimo de bilionésimo",
			Numero::extenso("0." . str_repeat("0", 10) . "1", Numero::DECIMAL)
		);
	}

	public function testTrilionesimo()
	{
		$this->assertEquals(
			"um trilionésimo",
			Numero::extenso("0." . str_repeat("0", 11) . "1", Numero::DECIMAL)
		);
	}

	public function testDecimoTrilionesimo()
	{
		$this->assertEquals(
			"um décimo de trilionésimo",
			Numero::extenso("0." . str_repeat("0", 12) . "1", Numero::DECIMAL)
		);
	}

	public function testCentesimoTrilionesimo()
	{
		$this->assertEquals(
			"um centésimo de trilionésimo",
			Numero::extenso("0." . str_repeat("0", 13) . "1", Numero::DECIMAL)
		);
	}

	public function testQuatrilhonesimo()
	{
		$this->assertEquals(
			"um quatrilhonésimo",
			Numero::extenso("0." . str_repeat("0", 14) . "1", Numero::DECIMAL)
		);
	}

	public function testDecimoQuatrilhonesimo()
	{
		$this->assertEquals(
			"um décimo de quatrilhonésimo",
			Numero::extenso("0." . str_repeat("0", 15) . "1", Numero::DECIMAL)
		);
	}

	public function testCentesimoQuatrilhonesimo()
	{
		$this->assertEquals(
			"um centésimo de quatrilhonésimo",
			Numero::extenso("0." . str_repeat("0", 16) . "1", Numero::DECIMAL)
		);
	}

	public function testQuinquilhonesimo()
	{
		$this->assertEquals(
			"um quintilhonésimo",
			Numero::extenso("0." . str_repeat("0", 17) . "1", Numero::DECIMAL)
		);
	}

	public function testDecimoQuinquilhonesimo()
	{
		$this->assertEquals(
			"um décimo de quintilhonésimo",
			Numero::extenso("0." . str_repeat("0", 18) . "1", Numero::DECIMAL)
		);
	}

	public function testCentesimoQuinquilhonesimo()
	{
		$this->assertEquals(
			"um centésimo de quintilhonésimo",
			Numero::extenso("0." . str_repeat("0", 19) . "1", Numero::DECIMAL)
		);
	}

	public function testPluralDecimo()
	{
		$this->assertEquals(
			"dois décimos",
			Numero::extenso("0.2", Numero::DECIMAL)
		);
	}

	public function testPluralCentesimo()
	{
		$this->assertEquals(
			"dois centésimos",
			Numero::extenso("0.02", Numero::DECIMAL)
		);
	}

	public function testPluralMilesimo()
	{
		$this->assertEquals(
			"dois milésimos",
			Numero::extenso("0.002", Numero::DECIMAL)
		);
	}

	public function testPluralDecimoMilesimo()
	{
		$this->assertEquals(
			"dois décimos de milésimo",
			Numero::extenso("0.0002", Numero::DECIMAL)
		);
	}

	public function testPluralCentesimoMilesimo()
	{
		$this->assertEquals(
			"dois centésimos de milésimo",
			Numero::extenso("0.00002", Numero::DECIMAL)
		);
	}

	public function testPluralMilionesimo()
	{
		$this->assertEquals(
			"dois milionésimos",
			Numero::extenso("0.000002", Numero::DECIMAL)
		);
	}

	public function testPluralDecimoMilionesimo()
	{
		$this->assertEquals(
			"dois décimos de milionésimo",
			Numero::extenso("0.0000002", Numero::DECIMAL)
		);
	}

	public function testPluralCentesimoMilionesimo()
	{
		$this->assertEquals(
			"dois centésimos de milionésimo",
			Numero::extenso("0.00000002", Numero::DECIMAL)
		);
	}

	public function testPluralBilionesimo()
	{
		$this->assertEquals(
			"dois bilionésimos",
			Numero::extenso("0.000000002", Numero::DECIMAL)
		);
	}

	public function testPluralDeciomoBilionesimo()
	{
		$this->assertEquals(
			"dois décimos de bilionésimo",
			Numero::extenso("0.0000000002", Numero::DECIMAL)
		);
	}

	public function testPluralCentesimoBilionesimo()
	{
		$this->assertEquals(
			"dois centésimos de bilionésimo",
			Numero::extenso("0." . str_repeat("0", 10) . "2", Numero::DECIMAL)
		);
	}

	public function testPluralTrilionesimo()
	{
		$this->assertEquals(
			"dois trilionésimos",
			Numero::extenso("0." . str_repeat("0", 11) . "2", Numero::DECIMAL)
		);
	}

	public function testPluralDecimoTrilionesimo()
	{
		$this->assertEquals(
			"dois décimos de trilionésimo",
			Numero::extenso("0." . str_repeat("0", 12) . "2", Numero::DECIMAL)
		);
	}

	public function testPluralCentesimoTrilionesimo()
	{
		$this->assertEquals(
			"dois centésimos de trilionésimo",
			Numero::extenso("0." . str_repeat("0", 13) . "2", Numero::DECIMAL)
		);
	}

	public function testPluralQuatrilhonesimo()
	{
		$this->assertEquals(
			"dois quatrilhonésimos",
			Numero::extenso("0." . str_repeat("0", 14) . "2", Numero::DECIMAL)
		);
	}

	public function testPluralDecimoQuatrilhonesimo()
	{
		$this->assertEquals(
			"dois décimos de quatrilhonésimo",
			Numero::extenso("0." . str_repeat("0", 15) . "2", Numero::DECIMAL)
		);
	}

	public function testPluralCentesimoQuatrilhonesimo()
	{
		$this->assertEquals(
			"dois centésimos de quatrilhonésimo",
			Numero::extenso("0." . str_repeat("0", 16) . "2", Numero::DECIMAL)
		);
	}

	public function testPluralQuinquilhonesimo()
	{
		$this->assertEquals(
			"dois quintilhonésimos",
			Numero::extenso("0." . str_repeat("0", 17) . "2", Numero::DECIMAL)
		);
	}

	public function testPluralDecimoQuinquilhonesimo()
	{
		$this->assertEquals(
			"dois décimos de quintilhonésimo",
			Numero::extenso("0." . str_repeat("0", 18) . "2", Numero::DECIMAL)
		);
	}

	public function testPluralCentesimoQuinquilhonesimo()
	{
		$this->assertEquals(
			"dois centésimos de quintilhonésimo",
			Numero::extenso("0." . str_repeat("0", 19) . "2", Numero::DECIMAL)
		);
	}

	
}
