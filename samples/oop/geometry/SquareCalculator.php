<?php

class SquareCalculator
{
    public static function calculate(Figure $figure)
    {
        if ($figure instanceof Rectangular) {
            return self::calculateRectangularSquare($figure);
        } elseif ($figure instanceof Round) {
            return self::calculateRoundSquare($figure);
        }

        return false;
    }

    private static function calculateRectangularSquare(Rectangular $rectangular)
    {
        return $rectangular->getHeight() * $rectangular->getWidth();
    }

    private static function calculateRoundSquare(Round $round)
    {
        return Figure::P * pow($round->getRadius(), 2);
    }
}