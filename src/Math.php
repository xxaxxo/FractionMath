<?php
/**
 * @author: Michael Kumar <michael.kumar@abv.bg>
 */

namespace xXc\FractionMath;


class Math
{

    public function add(Fraction $one, Fraction $two)
    {
        if ($one->denominator() == 1 && $one->integer() > 1) {
            return new Fraction($two->numerator(), $two->denominator(), $one->integer());
        }

        if ($two->denominator() == 1 && $two->integer() > 1) {
            return new Fraction($one->numerator(), $one->denominator(), $two->integer());
        }

        $result              = new \stdClass();
        $result->numerator   = ($one->denominator() * $two->numerator()) + ($two->denominator() * $one->numerator());
        $result->denominator = ($one->denominator() * $two->denominator());

        $result->integer = $one->integer() + $two->integer();

        return new Fraction($result->numerator, $result->denominator, $result->integer);
    }

    public function subtract(Fraction $one, Fraction $two)
    {
        if ($one->denominator() == 0 && $one->integer() > 0) {
            return new Fraction($two->numerator(), $two->denominator(), $one->integer());
        }

        if ($two->denominator() == 0 && $two->integer() > 0) {
            return new Fraction($one->numerator(), $one->denominator(), $two->integer());
        }

        $result              = new \stdClass();
        $result->numerator   = ($one->denominator() * $two->numerator()) - ($two->denominator() * $one->numerator());
        $result->denominator = ($one->denominator() * $two->denominator());

        $result->integer = $one->integer() - $two->integer();

        return new Fraction($result->numerator, $result->denominator, $result->integer);
    }

    public function multiply(Fraction $one, Fraction $two)
    {
        $result              = new \stdClass();
        $result->numerator   = ($one->numerator() * $two->numerator());
        $result->denominator = ($one->denominator() * $two->denominator());

        $result->integer = $one->integer() * $two->integer();

        return new Fraction($result->numerator, $result->denominator, $result->integer);
    }

    public function divide(Fraction $one, Fraction $two)
    {
        $result              = new \stdClass();
        $result->numerator   = ($one->numerator() * $two->denominator());
        $result->denominator = ($one->denominator() * $two->numerator());

        $result->integer = $one->integer() / $two->integer();

        return new Fraction($result->numerator, $result->denominator, $result->integer);
    }
}