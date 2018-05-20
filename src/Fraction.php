<?php
/**
 * @author: Michael Kumar <michael.kumar@abv.bg>
 */

namespace xxc\fractionmath;


class Fraction
{
    private $integer;
    private $numerator;
    private $denominator;
    private $greatestCommonDivisor;

    public function __construct($numerator, $denominator, $integer = 0)
    {
        $this->checkInput($numerator, $denominator, $integer);
        $this->setFractionParams($numerator, $denominator, $integer);
    }

    /**
     * @return int
     */
    public function numerator()
    {
        return $this->numerator;
    }

    /**
     * @return int
     */
    public function denominator()
    {
        return $this->denominator;
    }

    /**
     * @return int
     */
    public function integer()
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
     * @return array
     */
    public function getFractionAsObject()
    {
        $result = new \stdClass();
        $result->numerator = $this->numerator;
        $result->denominator = $this->denominator;
        $result->integer = $this->integer;
        return $result;
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

    /**
     * a static method for parsing fractions the quick way
     * @param $wannabeFraction - a string in the format int-space-int-slash-int
     * @return Fraction
     * @throws \Exception
     */
    public static function parse($wannabeFraction)
    {
        $pregMatchStatus = preg_match('{^(?P<integer>\d\s)*(?P<numerator>\d)\/(?P<denominator>\d)$}', $wannabeFraction, $match);
        if(empty($match) || $pregMatchStatus == false)
        {
            throw new \Exception('The passed param should at least be in the format 1/1 (int-slash-int) or int-space-int-slash-int');
        }
        return new self((int)$match['numerator'], (int)$match['denominator'], isset($match['integer'])? (int)$match['integer'] : null);
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

//        if ($numerator <= 0 && $integer <= 0) {
//            throw new \Exception('Numerator cannot be 0 or negative');
//        }
//        if ($denominator <= 0 && $integer <= 0) {
//            throw new \Exception('Denominator cannot be 0');
//        }
    }

    /**
     * @param $numerator
     * @param $denominator
     * @param $integer
     */
    private function setFractionParams($numerator, $denominator, $integer)
    {
        $this->integer = $integer;

        $this->simplifyFraction($numerator, $denominator);

        if ($this->numerator > $this->denominator) {
            $this->integer = ($integer + $this->getWholeNumber($this->numerator, $this->denominator));
        }

        if ($this->numerator == $this->denominator) {
            $this->numerator   = 0;
            $this->denominator = 0;
            $this->integer++;
        }
    }


}