<?php

class Sandwich
{
    /**
     * @var Bread
     */
    private $bread;

    /**
     * @var Cheese
     */
    private $cheese;

    /**
     * @var Butter
     */
    private $butter;

    public function setBread(Bread $bread)
    {
        $this->bread = $bread;
    }

    public function setButter(Butter $butter)
    {
        $this->butter = $butter;
    }

    public function setCheese(Cheese $cheese)
    {
        $this->cheese = $cheese;
    }

    public function create()
    {
        $bread = $this->bread->getAPart();
        $butter = $this->butter->getALittle();
        $cheese = $this->cheese->getAPart();

        return "Sandwich with {$bread},<br>{$butter} and<br>{$cheese}";
    }
}
