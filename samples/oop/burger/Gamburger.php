<?php

class Gamburger extends Sandwich
{
    /**
     * @var Kotleta
     */
    private $kotleta;

    public function __construct(Bread $bread, Butter $butter, Cheese $cheese, Kotleta $kotleta)
    {
        $this->kotleta = $kotleta;

        parent::__construct($bread, $butter, $cheese);
    }

    public function create()
    {
        $sandwich = parent::create();
        return vsprintf('%s and <br>%s<br><br>', [
            substr($sandwich, 0, -8),
            $this->kotleta->getOne()
        ]);
    }
}
