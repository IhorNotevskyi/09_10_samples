<?php

namespace console\migrations;

use components\db\Migration;
        
/**
 * Class M1517520242_create_product_to_category_table
 * @package console\migrations
 */
class M1517520242_create_product_to_category_table extends Migration
{
    public function up()
    {
        $this->createTable('product_to_category', [
            $this->integer('product_id', 11),
            $this->integer('category_id', 11)
        ]);
        $this->addForeignKey(
            'fk-product_to_category-product_id-products-id',
            'product_to_category',
            'product_id',
            'products',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-product_to_category-category_id-categories-id',
            'product_to_category',
            'category_id',
            'categories',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }
    
    public function down()
    {
        $this->dropForeignKey('fk-product_to_category-product_id-products-id', 'product_to_category');
        $this->dropForeignKey('fk-product_to_category-category_id-categories-id', 'product_to_category');
        $this->dropTable('product_to_category');
    }
}