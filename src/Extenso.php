<?php

namespace escreve_numero\EscreveNumero;

class Extenso
{
    private $fracao;
    private $centenas;
    private $feminino;
    private $dicionario;
    private $tipoDeChave;
    private $quantidadeCentenas;

    const NORMAL = "normal";
    const MOEDA = "moeda";
    const FEMININO = "feminino";

    public function __construct($valor = "0")
    {
        $this->dicionario = include "dicionario.php";
        $this->centenas = $this->separarCentenas($valor);
        $this->fracao = array_pop($this->centenas);
        $this->quantidadeCentenas = count($this->centenas);
    }

    public static function escreva($valor, $tipo = self::NORMAL){
        return (new self($valor))->escrevaComo($tipo);
    }

    public function escrevaComo($tipo = self::NORMAL)
    {
        if (!in_array($tipo, array(self::NORMAL, self::MOEDA, self::FEMININO)))
            throw new Exception("Tipo não permitido");
        $this->feminino = $tipo == self::FEMININO;
        $this->tipoDeChave = $tipo == self::MOEDA ? "dinheiro" : "numero";
        if (!isset($this->dicionario)) return false;
        return $this->parteInteira() . $this->parteFracionada();
    }

    public function __toString()
    {
        return $this->escrevaComo(self::NORMAL);
    }

    private function separarCentenas($valor = "0")
    {
        if (strpos($valor . "", ".") === false)
            $valor .= ".000";
        $partes = explode(".", $valor);
        foreach ($partes as $indice => $parte)
            $partes[$indice] = sprintf('%03d', $parte);
        $valor = implode("", $partes);
        $valor = chunk_split($valor, 3, ".");
        $valor = substr($valor, 0, strlen($valor) - 1);
        return Centena::partes($valor);
    }

    private function parteInteira()
    {
        return implode($this->dicionario["colas"]["centena"], array_filter(array_map(function ($part, $index) {
            if ($part == 0) return NULL;
            $text = $this->centenaPorExtenso($part);
            $singular = $part == 1 ? "singular" : "plural";
            return $text . $this->dicionario[$this->tipoDeChave][$singular][$this->quantidadeCentenas - $index];
        }, $this->centenas, array_keys($this->centenas)), function ($item) {
            return $item != NULL;
        }));
    }

    private function centenaPorExtenso($centena)
    {
        if ($this->traducaoExiste($centena)) return $this->traduzir($centena, false, 1);
        return implode($this->dicionario["colas"]["centena"], $this->traducaoCentenaArray(new Centena($centena)));
    }

    private function traducaoExiste($parte)
    {
        return array_key_exists($parte, $this->dicionario["basico"]);
    }

    private function traduzir($parte, $die = false, $indice = 0)
    {
        if (!$this->traducaoExiste($parte) && $die) die($parte . " não encontrada");
        $chaveFeminino = $this->feminino && array_key_exists(1, $this->dicionario["basico"][$parte]) ? 1 : 0;
        if (is_array($this->dicionario["basico"][$parte][$chaveFeminino])) {
            return $this->dicionario["basico"][$parte][$chaveFeminino][$indice];
        } else {
            return $this->dicionario["basico"][$parte][$chaveFeminino];
        }
    }

    private function traducaoCentenaArray(Centena $centena)
    {
        $partes = [];
        if ($centena->centenaSemDecimal > 0) $partes[] = $this->traduzir($centena->centenaSemDecimal, true, 0);
        if ($centena->decimal > 0)
            if ($this->traducaoExiste($centena->decimal))
                $partes[] = $this->traduzir($centena->decimal);
            else
                $partes[] = $this->traduzir($centena->dicimalSemUnidade, true, 0);
        if ($centena->unidade > 0) $partes[] = $this->traduzir($centena->unidade, true, 0);
        return $partes;
    }

    private function parteFracionada()
    {
        $key = ($this->fracao == 1) ? "singular" : "plural";
        if ($this->fracao > 0)
            return $this->dicionario["colas"]["fracao"] . $this->centenaPorExtenso($this->fracao) . $this->dicionario[$this->tipoDeChave][$key][0];
        return "";
    }
}