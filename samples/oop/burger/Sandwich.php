<?php

class Sandwich
{
    /**
     * @var int
     */
    private static $counter = 0;

    /**
     * @var BurgerComponent[]
     */
    private $components = [];

    /**
     * @var int
     */
    private $id;

    /**
     * Sandwich constructor.
     * @param array ...$components
     */
    public function __construct(...$components)
    {
        self::$counter++;
        $this->id = self::$counter;

        foreach ($components as $component) {
            $this->addComponent($component);
        }
    }

    /**
     * @param BurgerComponent $component
     */
    private function addComponent(BurgerComponent $component)
    {
        $this->components[] = $component;
    }

    /**
     * @return string
     */
    public function create()
    {
        $components = [];
        foreach ($this->components as $component) {
            $components[] = $component->getAPart();
        }
        $components = implode(',<br>', $components);

        return "<b>Sandwich with</b><br>{$components}<br><br>";
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
