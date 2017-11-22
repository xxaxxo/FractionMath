<?php
/**
 * @author: Michael Kumar <michael.kumar@abv.bg>
 */

namespace xXc\FractionMath;


class Fraction
{
    public $integer;
    public $numerator;
    public $denominator;
    public $greatestCommonDivisor;


    public function __construct($numerator, $denominator, $integer = 0)
    {
        $this->checkInput($numerator, $denominator, $integer);

        $this->integer = $integer;

        $this->simplifyFraction($numerator, $denominator);

        if ($this->numerator > $this->denominator) {
            $this->integer = ($integer + $this->getWholeNumber($this->numerator, $this->denominator));
        }

        if ($this->numerator == $this->denominator) {
            $this->numerator   = 1;
            $this->denominator = 1;
            $this->integer++;
        }

    }

    /**
     * @return int
     */
    public function getNumerator()
    {
        return $this->numerator;
    }

    /**
     * @return int
     */
    public function getDenominator()
    {
        return $this->denominator;
    }

    /**
     * @return int
     */
    public function getInteger()
    {
        return $this->integer;
    }

    /**
     * @return array
     */
    public function getFractionAsArray()
    {
        return [
            'numerator'   => $this->numerator,
            'denominator' => $this->denominator,
            'integer'     => $this->integer,
        ];
    }

    /**
     * @return mixed
     */
    public function getGreatestCommonDivisor()
    {
        return $this->greatestCommonDivisor;
    }

    /**
     * @param int $denominator
     */
    public function display()
    {
        $fraction = !empty($this->integer)? $this->integer : '';
        $fraction .= '<sup>'.$this->numerator.'</sup>';
        $fraction .= '&frasl;';
        $fraction .= '<sub>'.$this->denominator.'</sub>';
        return $fraction;
    }


    private function getWholeNumber($numerator, $denominator, $number = 0)
    {
        $number++;
        $newNominator = $numerator - $denominator;
        if ($newNominator < $denominator) {
            $this->numerator = $newNominator;

            return $number;
        } else {
            return $this->getWholeNumber($newNominator, $denominator, $number);
        }
    }

    private function simplifyFraction($numerator, $denominator)
    {
        $this->greatestCommonDivisor = $this->greatestCommonDivisor($numerator, $denominator);
        if ($this->greatestCommonDivisor < $numerator || $this->greatestCommonDivisor < $denominator) {
            $this->numerator   = $numerator / $this->greatestCommonDivisor;
            $this->denominator = $denominator / $this->greatestCommonDivisor;
        } else {
            $this->numerator   = $numerator;
            $this->denominator = $denominator;
        }
    }

    private function greatestCommonDivisor($a, $b)
    {
        $a = abs($a);
        $b = abs($b);
        if ($a < $b) {
            list($b, $a) = Array($a, $b);
        }
        if ($b == 0) {
            return $a;
        }
        $r = $a % $b;
        while ($r > 0) {
            $a = $b;
            $b = $r;
            $r = $a % $b;
        }

        return $b;
    }

    /**
     * @param $numerator
     * @param $denominator
     * @param $integer
     * @throws \Exception
     */
    private function checkInput($numerator, $denominator, $integer)
    {
        if (!is_int($numerator) || !is_int($denominator) || !is_int($integer)) {
            throw new \Exception('Passed parameters should be integers!');
        }

        if ($numerator <= 0 && $integer <= 0) {
            throw new \Exception('Numerator cannot be 0 or negative');
        }
        if ($denominator <= 0 && $integer <= 0) {
            throw new \Exception('Denominator cannot be 0');
        }
    }


}