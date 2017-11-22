<?php

namespace spec\xXc\FractionMath;

use Fraction;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FractionSpec extends ObjectBehavior
{

    function it_throws_exception_on_initalisation_without_params()
    {
        $this->shouldThrow('\Exception')->during('__construct', []);
    }

    function it_throws_exception_on_non_integer_params_initialisation()
    {
        $this->shouldThrow('\Exception')->during('__construct', ['asdasd']);
    }

    function it_can_get_numerator()
    {
        $this->beConstructedWith(1, 2);
        $this->numerator()->shouldReturn(1);
    }

    function it_can_get_denominator()
    {
        $this->beConstructedWith(1, 2);
        $this->denominator()->shouldReturn(2);
    }

    function it_can_get_integer()
    {
        $this->beConstructedWith(1, 2, 3);
        $this->integer()->shouldReturn(3);
    }


    function it_can_get_the_fraction_as_array()
    {
        $this->beConstructedWith(1, 2, 3);
        $this->getFractionAsArray()->shouldReturn([
            'numerator' => 1,
            'denominator' => 2,
            'integer' => 3,
        ]);
    }

    function it_autosimplifies_fraction()
    {
        $this->beConstructedWith(2, 4);
        $this->getFractionAsArray()->shouldReturn([
            'numerator' => 1,
            'denominator' => 2,
            'integer' => 0,
        ]);
    }

    function it_gets_the_gcd()
    {
        $this->beConstructedWith(4, 8);
        $this->getGreatestCommonDivisor()->shouldReturn(4);
    }

    function it_simplifies_same_numerator_and_denominator()
    {
        $this->beConstructedWith(2, 2);
        $this->getFractionAsArray()->shouldReturn([
            'numerator' => 1,
            'denominator' => 1,
            'integer' => 1,
        ]);
    }

    function it_gets_the_integer_for_a_fraction()
    {
        $this->beConstructedWith(5, 2);
        $this->getFractionAsArray()->shouldReturn([
            'numerator' => 1,
            'denominator' => 2,
            'integer' => 2,
        ]);
    }

    function it_displays_the_fraction_as_html()
    {
        $this->beConstructedWith(1,2,3);
        $this->display()->shouldReturn('3<sup>1</sup>&frasl;<sub>2</sub>');
    }


}
