<?php

namespace fauxcompany\EscreveNumero;

class Centena
{

    public $valor;
    public $decimal;
    public $unidade;
    public $dicimalSemUnidade;
    public $centenaSemDecimal;

    public function __construct($value = 0)
    {
        if ($value > 999) throw new Exception("Valor deve ser menor que 1000;");
        $this->valor = $value;
        $this->centenaSemDecimal = intval($value / 100) * 100;;
        $this->decimal = intval($value - $this->centenaSemDecimal);
        $this->dicimalSemUnidade = intval($this->decimal / 10) * 10;
        $this->unidade = intval($value - $this->centenaSemDecimal - $this->dicimalSemUnidade);
    }

    public static function partes($value)
    {
        $partes = explode(".", $value);
        for ($i = 0; $i < count($partes); $i++)
            for ($_ = mb_strlen($partes[$i]); $_ < 3; $_++)
                $partes[$i] = "0" . $partes[$i];
        return array_map(function ($item) {
            return $item * 1;
        }, $partes);
    }
}