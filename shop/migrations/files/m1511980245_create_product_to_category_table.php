<?php

function m1511980245_up()
{
    $sql = <<<SQL
CREATE TABLE product_to_category (
  product_id int(11),
  category_id int(11),
  CONSTRAINT `fk-product_to_category-product_id-products-id` FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-product_to_category-category_id-categories-id` FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE
)
SQL;
    return mysqli_query(getDbConnection(), $sql);
}

function m1511980245_down()
{
}