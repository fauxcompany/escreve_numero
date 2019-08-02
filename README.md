# Escreva número por extenso
Este projeto objetiva a escrita de um número por extenso.
São opções desde:
- Número normativo;
- Número em Moeda (reais);
- Número em gênero feminino;
- Número com suas casas decimais;

## Badges
### Github
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

### Contribuidores
- [guifabrin](https://github.com/guifabrin) - ![followers](https://img.shields.io/github/followers/guifabrin.svg?style=social)
- [leomoty](https://github.com/leomoty)  ![followers](https://img.shields.io/github/followers/leomoty.svg?style=social)

### Outros
[![BCH compliance](https://bettercodehub.com/edge/badge/fauxcompany/escreve_numero?branch=master)](https://bettercodehub.com/)
![https://api.travis-ci.org/fauxcompany/escreve_numero.svg?branch=master](https://api.travis-ci.org/fauxcompany/escreve_numero.svg?branch=master)

## Instalação:

- Execute: `composer require fauxcompany/escreve_numero`
- Inclua o `autoload.php` do vendor no seu arquivo e chame o utilizador da classe `Numero`.

## Limitações
- Quantidade de decimos podem chegar a 18;
- Quantidade de casas decimais podem chegar até 20 e caso sejam maiores que isto são truncadas;

## Uso
```php
<?php 
    include "vendor/autoload.php";
    use \fauxcompany\EscreveNumero\Numero;
```

- Instancie um número, preferencialmente como `string` dado as limitações de ponto flutuante do PHP:

```php
<?php 
    $numero = new Numero("1.99");
```

- Escreva:
```php
<?php
    echo $numero->extensoComo(Numero::NORMAL);
    // um com noventa e nove
    echo $numero->extensoComo(Numero::MOEDA);
    // um real com noventa e nove centavos
    echo $numero->extensoComo(Numero::FEMININO);
    // uma com noventa e nove
    echo $numero->extensoComo(Numero::FEMININO);
    // um com noventa e nove centésimos
```

- Ou chame estaticamente

```php
<?php
    echo Numero::extenso("1.99");
    // um com noventa e nove
    echo Numero::extenso("1.99", Numero::MOEDA);
    // um real com noventa e nove centavos
    echo Numero::extenso("1.99", Numero::FEMININO);
    // uma com noventa e nove
    echo Numero::extenso("1.99", Numero::FEMININO);
    // um com noventa e nove centésimos
```

- Caso precise da escrita zero:

```php
<?php
    $numero = new Numero("0.99");
    echo $numero->extensoComo(Numero::DECIMAL, true);
    // ou
    echo Numero::extenso("0.99", Numero::NORMAL, true);
    // zero com noventa e nove centésimos
```


## Contribuições

Toda e qualquer contribuição neste projeto é bem vinda. Por favor, siga as seguintes instruções:
- Em caso de dúvida, sugestão ou outra abra uma `issue`;
- Em caso de proposta de mudança, faça um fork do repositório e crie um `pull request`;
- Seja específico em ambos e descreva o máximo possível o porquê da proposta. 