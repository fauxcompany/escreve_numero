<?php

namespace fauxcompany\EscreveNumero;

class Tradutor
{
	public static $dicionario = array(
		"moeda" => array(
			"singular" => array(
				" centavo",
				" real",
				" mil",
				" milhão",
				" bilhão",
				" trilhão",
				" quatrilhão",
				" quintilhão",
				" sextilhão",
				" septilhão",
				" octilhão",
				" nonilhão",
				" decilhão",
				" undecilhão",
				" duodecilhão",
				" tredecilhão"
			),
			"plural" => array(
				" centavos",
				" reais",
				" mil",
				" milhões",
				" bilhões",
				" trilhões",
				" quatrilhões",
				" quintilhões",
				" sextilhões",
				" septilhões",
				" octilhões",
				" nonilhões",
				" decilhões",
				" undecilhões",
				" duodecilhões",
				" tredecilhões"
			)
		),
		"numero" => array(
			"singular" => array(
				"",
				"",
				" mil",
				" milhão",
				" bilhão",
				" trilhão",
				" quatrilhão",
				" quintilhão",
				" sextilhão",
				" septilhão",
				" octilhão",
				" nonilhão",
				" decilhão",
				" undecilhão",
				" duodecilhão",
				" tredecilhão"
			),
			"plural" => array(
				"",
				"",
				" mil",
				" milhões",
				" bilhões",
				" trilhões",
				" quatrilhões",
				" quintilhões",
				" sextilhões",
				" septilhões",
				" octilhões",
				" nonilhões",
				" decilhões",
				" undecilhões",
				" duodecilhões",
				" tredecilhões"
			)
		),
		"decimal" => array(
			"singular" => array(
				" décimo",
				" centésimo",
				" milésimo",
				" décimo de milésimo",
				" centésimo de milésimo",
				" milionésimo",
				" décimo de milionésimo",
				" centésimo de milionésimo",
				" bilionésimo",
				" décimo de bilionésimo",
				" centésimo de bilionésimo",
				" trilionésimo",
				" décimo de trilionésimo",
				" centésimo de trilionésimo",
				" quatrilhonésimo",
				" décimo de quatrilhonésimo",
				" centésimo de quatrilhonésimo",
				" quintilhonésimo",
				" décimo de quintilhonésimo",
				" centésimo de quintilhonésimo",
			),
			"plural" => array(
				" décimos",
				" centésimos",
				" milésimos",
				" décimos de milésimo",
				" centésimos de milésimo",
				" milionésimos",
				" décimos de milionésimo",
				" centésimos de milionésimo",
				" bilionésimos",
				" décimos de bilionésimo",
				" centésimos de bilionésimo",
				" trilionésimos",
				" décimos de trilionésimo",
				" centésimos de trilionésimo",
				" quatrilhonésimos",
				" décimos de quatrilhonésimo",
				" centésimos de quatrilhonésimo",
				" quintilhonésimos",
				" décimos de quintilhonésimo",
				" centésimos de quintilhonésimo",
			)
		),
		"basico" => array(
			0 => array("zero"),
			1 => array("um", "uma"),
			2 => array("dois", "duas"),
			3 => array("três"),
			4 => array("quatro"),
			5 => array("cinco"),
			6 => array("seis"),
			7 => array("sete"),
			8 => array("oito"),
			9 => array("nove"),
			10 => array("dez"),
			11 => array("onze"),
			12 => array("doze"),
			13 => array("treze"),
			14 => array("quatorze"),
			15 => array("quinze"),
			16 => array("dezesseis"),
			17 => array("dezessete"),
			18 => array("dezoito"),
			19 => array("dezenove"),
			20 => array("vinte"),
			30 => array("trinta"),
			40 => array("quarenta"),
			50 => array("cinquenta"),
			60 => array("sessenta"),
			70 => array("setenta"),
			80 => array("oitenta"),
			90 => array("noventa"),
			100 => array(array("cento", "cem")),
			200 => array("duzentos", "duzentas"),
			300 => array("trezentos", "trezentas"),
			400 => array("quatrocentos", "quatrocentas"),
			500 => array("quinhentos", "quinhentas"),
			600 => array("seiscentos", "seiscentas"),
			700 => array("setecentos", "setecentas"),
			800 => array("oitocentos", "oitocentas"),
			900 => array("novecentos", "novecentas")
		),
		"colas" => array(
			"decimal" => " e ",
			"centena" => " e ",
			"fracao" => " com ",
		)
	);

	public static function existe($parte)
	{
		return array_key_exists($parte, self::$dicionario["basico"]);
	}

	public static function escreva($parte, $feminino, $die = false, $indice = 0)
	{
		if (!self::existe($parte) && $die) die($parte . " não encontrada");
		$chave = $feminino && array_key_exists(1, self::$dicionario["basico"][$parte]) ? 1 : 0;
		if (is_array(self::$dicionario["basico"][$parte][$chave])) {
			return self::$dicionario["basico"][$parte][$chave][$indice];
		} else {
			return self::$dicionario["basico"][$parte][$chave];
		}
	}

	public static function colar($cola, $array)
	{
		return implode(self::$dicionario["colas"][$cola], $array);
	}

	public static function decimal($valor)
	{
		$pluralidade = floatval($valor) > 1.0 ? "plural" : "singular";
		return self::$dicionario["decimal"][$pluralidade][strlen($valor . "") - 1];
	}

	public static function inteiro($chave, $centena, $indice)
	{
		$pluralidade = floatval($centena->valor) > 1.0 ? "plural" : "singular";
		return self::$dicionario[$chave][$pluralidade][$indice];
	}
}