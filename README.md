# Escreva número por extenso
Este projeto tem como objetivo proporcinar escrever um número por extenso com opção de moeda e de nome ser de gênero feminino.

## Exemplos:

```php
include "vendor/autoload.php";

use \escreve_numero\EscreveNumero\Extenso;

echo Extenso::escreva("999.99")."\n"; //novecentos e noventa e nove com noventa e nove
$extensoNumero = new Extenso(999.99);
$extensoTexto = new Extenso("999.99");
echo $extensoNumero."\n"; //novecentos e noventa e nove com noventa e nove
echo $extensoTexto ."\n"; //novecentos e noventa e nove reais com noventa e nove centavos
echo $extensoNumero->escrevaComo(Extenso::MOEDA)."\n"; //novecentos e noventa e nove reais com noventa e nove centavos
echo $extensoTexto->escrevaComo(Extenso::MOEDA)."\n"; //novecentas e noventa e nove com noventa e nove
echo $extensoNumero->escrevaComo(Extenso::FEMININO)."\n"; //novecentas e noventa e nove com noventa e nove
echo $extensoTexto->escrevaComo(Extenso::FEMININO)."\n"; //novecentas e noventa e nove com noventa e nove
echo Extenso::escreva("999999999999999999.99")."\n"; //novecentos e noventa e nove quatrilhões e novecentos e noventa e nove trilhões e novecentos e noventa e nove bilhões e novecentos e noventa e nove milhões e novecentos e noventa e nove mil e novecentos e noventa e nove com noventa e nove
```

## Limitações:

- Número não pode exceder `999999999999999999.99` (novecentos e noventa e nove quatrilhões e novecentos e noventa e nove trilhões e novecentos e noventa e nove bilhões e novecentos e noventa e nove milhões e novecentos e noventa e nove mil e novecentos e noventa e nove com noventa e nove);
