<?php

class ChildProperties extends Properties
{
    public function iterate()
    {
        foreach ($this as $name => $value) {
            echo $name, ' >>> ', $value, '<br>';
        }
    }
}