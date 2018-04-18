# Composer package for math operations with fractions #
[![Latest Version](https://img.shields.io/github/release/xxaxxo/FractionMath.svg?style=flat-square)](https://github.com/xxaxxo/FractionMath/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/xxaxxo/FractionMath/master.svg?style=flat-square)](https://travis-ci.org/xxaxxo/FractionMath)

Auto simplifies the fractions on initialisation.
Installation:
```php
 composer require xxc/fractionmath:1.*
```


Usage:

```php
$fraction = new Fraction(1,2);
$fraction->display();
```
Available methods for a Fraction:
<ul>
<li>numerator() - gets the numerator</li>
<li>denominator() - gets the denominator</li>
<li>integer() - gets the integer</li>
<li>getGreatestCommonDivisor() - gets the GCD of the numetor and the denominator</li>
<li>getFractionAsArray() - returns the fraction as array with keys numerator, denominator, integer</li>
<li>getFractionAsObject() - returns the fraction as object</li>
<li>display() - returns the html for a fraction</li>
<li>parse() - static method for quick parsing strings to fractions</li>
</ul>
<br>
Works with irregular fractions aswell

```php
$fraction = new Fraction(9,3);
$fraction->getFractionAsArray(); 
/*
returns ...
  array(
    'numerator' => 9,
    'denominator' => 3,
    'integer' => 0
    );
    */
```
If you need you can parse strings to fractions with the static parse method
```php
xxc\fractionmath\Fraction::parse('1/2'); \\returns a fraction
\\you can chain methods like this
xxc\fractionmath\Fraction::parse('2/4')->display(); \\returns html for a fraction 2/4
```

The Math class handles all the math operations - requires Fraction as inputs and returns a Fraction
<br>
Math operations:
<ul>
<li>add()</li>
<li>subtract()</li>
<li>multiply()</li>
<li>divide()</li>
</ul>

```php
$fractionOne = new Fraction(1,3);
$fractionTwo = new Fraction(1,3);

$mathOperation = new Math();

$mathOperation->add($fractionOne, $fractionTwo);
$mathOperation->subtract($fractionOne, $fractionTwo);
$mathOperation->multiply($fractionOne, $fractionTwo);
$mathOperation->divide($fractionOne, $fractionTwo);
```

