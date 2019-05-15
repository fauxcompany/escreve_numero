# Escreva número por extenso
> Este projeto tem como objetivo proporcinar escrever um número por extenso com opção de moeda e de nome ser de gênero feminino.

## Github
![tag](https://img.shields.io/github/tag/fauxcompany/escreve_numero.svg)
![issues](https://img.shields.io/github/issues/fauxcompany/escreve_numero.svg)
![contributors](https://img.shields.io/github/contributors/fauxcompany/escreve_numero.svg)
![license](https://img.shields.io/github/license/fauxcompany/escreve_numero.svg)
![code-size](https://img.shields.io/github/languages/code-size/fauxcompany/escreve_numero.svg)
![top-languages](https://img.shields.io/github/languages/top/fauxcompany/escreve_numero.svg)
![languages](https://img.shields.io/github/languages/count/fauxcompany/escreve_numero.svg)

### Social
![forks](https://img.shields.io/github/forks/fauxcompany/escreve_numero.svg?style=social)
![stars](https://img.shields.io/github/stars/fauxcompany/escreve_numero.svg?style=social)
![watchers](https://img.shields.io/github/watchers/fauxcompany/escreve_numero.svg?style=social)

- [guifabrin](https://github.com/guifabrin) - ![followers](https://img.shields.io/github/followers/guifabrin.svg?style=social)
- [leomoty](https://github.com/leomoty)  ![followers](https://img.shields.io/github/followers/leomoty.svg?style=social)

## Outros
[![BCH compliance](https://bettercodehub.com/edge/badge/fauxcompany/escreve_numero?branch=master)](https://bettercodehub.com/)
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
