# Escreva número por extenso
Este projeto tem como objetivo proporcinar escrever um número por extenso com opção de moeda e de nome ser de gênero feminino.

## Exemplos:

```php
include 'Extenso.php';

echo (new Extenso('999.99'))."\n"; //novecentos e noventa e nove com noventa e nove
echo (new Extenso(999.99))."\n"; //novecentos e noventa e nove com noventa e nove
echo (new Extenso('999.99', true))."\n"; //novecentos e noventa e nove reais com noventa e nove centavos
echo (new Extenso(999.99, true))."\n"; //novecentos e noventa e nove reais com noventa e nove centavos
echo (new Extenso('999.99', false, true))."\n"; //novecentas e noventa e nove com noventa e nove
echo (new Extenso(999.99, false, true))."\n"; //novecentas e noventa e nove com noventa e nove
echo (new Extenso('999999999999999999.99'))."\n"; //novecentos e noventa e nove quatrilhões e novecentos e noventa e nove trilhões e novecentos e noventa e nove bilhões e novecentos e noventa e nove milhões e novecentos e noventa e nove mil e novecentos e noventa e nove com noventa e nove
```

## Limitações:

- Número não pode exceder `999999999999999999.99` (novecentos e noventa e nove quatrilhões e novecentos e noventa e nove trilhões e novecentos e noventa e nove bilhões e novecentos e noventa e nove milhões e novecentos e noventa e nove mil e novecentos e noventa e nove com noventa e nove);
- Preferível usar numero escrito como `string`;
