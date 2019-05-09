# Escreva número por extenso
Este projeto tem como objetivo proporcinar escrever um número por extenso com opção de moeda e de nome ser de gênero feminino.

![https://api.travis-ci.org/fauxcompany/escreve_numero.svg?branch=master](https://api.travis-ci.org/fauxcompany/escreve_numero.svg?branch=master)

## Exemplos:

```php
include "vendor/autoload.php";

use \fauxcompany\EscreveNumero\Numero;

echo Numero::extenso("999.99")."\n"; //novecentos e noventa e nove com noventa e nove
$extensoNumero = new Numero(999.99);
$extensoTexto = new Numero("999.99");
echo $extensoNumero."\n"; //novecentos e noventa e nove com noventa e nove
echo $extensoTexto ."\n"; //novecentos e noventa e nove reais com noventa e nove centavos
echo $extensoNumero->extensoComo(Numero::MOEDA)."\n"; //novecentos e noventa e nove reais com noventa e nove centavos
echo $extensoTexto->extensoComo(Numero::MOEDA)."\n"; //novecentas e noventa e nove com noventa e nove
echo $extensoNumero->extensoComo(Numero::FEMININO)."\n"; //novecentas e noventa e nove com noventa e nove
echo $extensoTexto->extensoComo(Numero::FEMININO)."\n"; //novecentas e noventa e nove com noventa e nove
echo Numero::extenso("999999999999999999.99")."\n"; //novecentos e noventa e nove quatrilhões e novecentos e noventa e nove trilhões e novecentos e noventa e nove bilhões e novecentos e noventa e nove milhões e novecentos e noventa e nove mil e novecentos e noventa e nove com noventa e nove
```

## Limitações:

- Número não pode exceder `999999999999999999.99` (novecentos e noventa e nove quatrilhões e novecentos e noventa e nove trilhões e novecentos e noventa e nove bilhões e novecentos e noventa e nove milhões e novecentos e noventa e nove mil e novecentos e noventa e nove com noventa e nove);
