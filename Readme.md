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
