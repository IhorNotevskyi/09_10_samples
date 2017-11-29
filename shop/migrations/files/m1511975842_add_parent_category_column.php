<?php

function m1511975842_up()
{
    $sql = <<<SQL
ALTER TABLE categories 
  ADD COLUMN parent_category_id int(11) AFTER id,
  ADD CONSTRAINT `fk-categories-parent_category_id-categories-id` FOREIGN KEY (parent_category_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE
SQL;
    return mysqli_query(getDbConnection(), $sql);
}

function m1511975842_down()
{
}