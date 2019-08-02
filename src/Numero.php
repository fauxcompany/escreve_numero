<?php

namespace fauxcompany\EscreveNumero;

use Exception;

class Numero
{
    private $fracao;
    private $fracoes;
    private $centenas;

    private $decimal = false;
    private $feminino = false;
    private $tipoChave = "numero";

    private $valor;

    const NORMAL = "normal";
    const MOEDA = "moeda";
    const DECIMAL = "decimal";
    const FEMININO = "feminino";

    public function __construct($valor = "0")
    {
        $valores = explode('.', $valor);
        $limiteDecimais = count(Tradutor::$dicionario["decimal"]["singular"]);
        if (!empty($valores[1]) && strlen($valores[1])>$limiteDecimais){
            trigger_error('Limite de casas decimais é de '.$limiteDecimais.'.');
            $valores[1] = substr($valores[1], 0, $limiteDecimais); 
        }
        $this->valor = $valores[0].'.'.$valores[1];
    }

    public static function extenso($valor, $tipo = self::NORMAL, $zero = false){
        $objeto = new self($valor);
        return $objeto->extensoComo($tipo, $zero);
    }

    public function extensoComo($tipo = self::NORMAL, $zero = false)
    {
        $this->tipo($tipo);
        $this->valor($this->valor);
        $inteiro = $this->inteiro($zero);
        $fracao = $this->fracao($zero);
        if ($tipo == self::DECIMAL) $fracao .= Tradutor::decimal($this->fracao);
        if (!empty($inteiro)) return Tradutor::colar("fracao", [$inteiro, $fracao]);
        return $fracao;
    }

    public function __toString()
    {
        return $this->extensoComo();
    }

    private function tipo($tipo)
    {
        if (!in_array($tipo, array(self::NORMAL, self::MOEDA, self::FEMININO, self::DECIMAL)))
            throw new Exception("Tipo não permitido");
        if ($tipo == self::FEMININO) {
            $this->feminino = true;
        } else if ($tipo == self::DECIMAL) {
            $this->decimal = true;
        } else if ($tipo == self::MOEDA) {
            $this->tipoChave = "moeda";
        }
    }

    private function centenas($valor = "0")
    {
        $partes = explode(".", $valor);
        foreach ($partes as $indice => $parte) {
            $partes[$indice] = sprintf('%03d', $parte);
        }
        $valor = implode("", $partes);
        $valor = chunk_split($valor, 3, ".");
        $valor = substr($valor, 0, strlen($valor) - 1);
        return Centena::partes($valor);
    }

    private function valor($valor)
    {
        if (strpos($valor . "", ".") === false)
            $valor .= ".000";
        $exploded = explode(".", $valor);
        $inteiro = $exploded[0];
        $fracao = $exploded[1];
        $this->centenas = $this->centenas($inteiro);
        $this->fracao = $fracao;
        $this->fracoes = $this->centenas($fracao);
    }

    private function inteiro($zero = false)
    {
        $tipoChave = $this->tipoChave;
        $qtdCentenas = count($this->centenas);
        return Tradutor::colar("centena", array_filter(array_map(function ($centena, $indice) use ($zero, $tipoChave, $qtdCentenas) {
            if (!$zero && $centena->zero) return NULL;
            return $centena->extenso($this->feminino, $zero) . Tradutor::inteiro($tipoChave, $centena, $qtdCentenas - $indice);
        }, $this->centenas, array_keys($this->centenas)), function ($item) {
            return $item != NULL;
        }));
    }

    private function fracao($zero = false)
    {
        $tipoChave = $this->tipoChave;
        $qtdCentenas = count($this->fracoes);
        return Tradutor::colar("fracao", array_filter(array_map(function ( $fracao, $indice) use ( $zero, $tipoChave, $qtdCentenas) {
            if (!$zero && $fracao->zero) return NULL;
            return $fracao->extenso($this->feminino, $zero) . Tradutor::inteiro($tipoChave, $fracao, $qtdCentenas - $indice - 1);
        }, $this->fracoes, array_keys($this->fracoes)), function ($item) {
            return $item != NULL;
        }));
    }
}