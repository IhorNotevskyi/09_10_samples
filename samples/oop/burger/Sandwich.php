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

    /**
     * Sandwich constructor.
     * @param Bread $bread
     * @param Butter $butter
     * @param Cheese $cheese
     */
    public function __construct(Bread $bread, Butter $butter, Cheese $cheese)
    {
        $this->bread = $bread;
        $this->butter = $butter;
        $this->cheese = $cheese;
    }

    public function create()
    {
        $bread = $this->bread->getAPart();
        $butter = $this->butter->getALittle();
        $cheese = $this->cheese->getAPart();

        return "Sandwich with {$bread},<br>{$butter} and<br>{$cheese}<br><br>";
    }

    public function __destruct()
    {
        echo spl_object_hash($this), ': Kitchen is closed<br>';
    }
}
