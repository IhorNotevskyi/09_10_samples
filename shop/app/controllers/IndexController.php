<?php

namespace app\controllers;

use components\db\Query;

/**
 * Class IndexController
 * @package app\controllers
 */
class IndexController
{
    public function actionIndex()
    {
        /** @var \components\db\Select $builder */
        $builder = (new Query())->getBuilder(Query::SELECT);

        $builder
            ->select(['*'])
            ->from('categories')
            ->where(['>=', 'id', 3]);

        var_dump($builder->all());
    }
}
