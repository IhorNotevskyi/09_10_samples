<?php

class Sandwich
{
    /**
     * @var int
     */
    private static $counter = 0;

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
     * @var int
     */
    private $id;

    /**
     * Sandwich constructor.
     * @param Bread $bread
     * @param Butter $butter
     * @param Cheese $cheese
     */
    public function __construct(Bread $bread, Butter $butter, Cheese $cheese)
    {
        self::$counter++;
        $this->id = self::$counter;

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

    /**
     * @return int
     */
    public static function getCounter()
    {
        return self::$counter;
    }

    public function __destruct()
    {
        echo $this->id, ': Kitchen is closed<br>';
    }
}
