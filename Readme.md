# Composer package for math operations with fractions #

Auto simplifies the fractions on initialisation.

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
</ul>
<br>
Works with irregular fractions aswell

```php
$fraction = new Fraction(9,3);
$fraction->getFractionAsArray(); 
/*
returns ...
  array(
    'numerator' => 3,
    'denominator' => 1,
    'integer' => 3
    );
    */
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

$mathOperation->add($fractionOne, $fractiontwo);
$mathOperation->subtract($fractionOne, $fractiontwo);
$mathOperation->multiply($fractionOne, $fractiontwo);
$mathOperation->divide($fractionOne, $fractiontwo);
```