<?php

function m1511977060_up()
{
    $sql = <<<SQL
CREATE UNIQUE INDEX `idx-unique-categories-title` ON categories(title)
SQL;
    return mysqli_query(getDbConnection(), $sql);
}

function m1511977060_down()
{
}