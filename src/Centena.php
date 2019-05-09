<?php

namespace fauxcompany\EscreveNumero;

class Centena
{

    public $valor;
    public $decimal;
    public $unidade;
    public $decimalSemUnidade;
    public $centenaSemDecimal;
    public $zero;
    public $um;

    public function __construct($value = 0)
    {
        if ($value > 999) throw new Exception("Valor deve ser menor que 1000;");
        $this->zero = floatval($value) == 0.0;
        $this->um = floatval($value) == 1.0;
        $this->valor = $value;
        $this->centenaSemDecimal = intval($value / 100) * 100;;
        $this->decimal = intval($value - $this->centenaSemDecimal);
        if ($this->decimal < 10) $this->decimal = 0;
        $this->decimalSemUnidade = intval($this->decimal / 10) * 10;
        $this->unidade = intval($value - $this->centenaSemDecimal - $this->decimalSemUnidade);
    }

    public static function partes($value)
    {
        $partes = explode(".", $value);
        for ($i = 0; $i < count($partes); $i++)
            for ($_ = mb_strlen($partes[$i]); $_ < 3; $_++)
                $partes[$i] = "0" . $partes[$i];
        return array_map(function ($item) {
            return new Centena(intval($item));
        }, $partes);
    }

    public function extenso($feminino = false, $zero = false){
        $partes = array();
        if ($this->zero && $zero) return Tradutor::escreva(0, $feminino, true, 0);
        if ($this->centenaSemDecimal > 0)
            $partes[] = Tradutor::escreva($this->centenaSemDecimal, $feminino, true, 0);
        if ($this->decimal > 0){
            if (Tradutor::existe($this->decimal))
                $partes[] = Tradutor::escreva($this->decimal, $feminino, true, 0);
            else
                $partes[] = Tradutor::escreva($this->decimalSemUnidade, $feminino, true, 0);
        }
        if ($this->unidade > 0)
            $partes[] = Tradutor::escreva($this->unidade, $feminino, true, 0);
        return Tradutor::colar("decimal", $partes);
    }
}