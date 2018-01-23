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
        $builder = (new Query())->getBuilder(Query::SELECT);

        $builder
            ->select(['*'])
            ->from('categories')
            ->where(['>=', 'id', 3]);

        var_dump($builder->all());
    }

    public function actionInsert()
    {
        $builder = (new Query())->getBuilder(Query::INSERT);
        $builder
            ->insert([
                'title' => "'DELETE FROM categories;"
            ])
            ->into('categories')
            ->execute();
    }

    public function actionDelete()
    {
        $builder = (new Query())->getBuilder(Query::DELETE);
        $builder
            ->delete()
            ->from('categories')
            ->where(['=', 'id', 7])
            ->limit(1)
            ->execute();
    }

    public function actionUpdate()
    {
        $builder = (new Query())->getBuilder(Query::UPDATE);
        $builder
            ->update('categories')
            ->set(['title'=> "test2"])
            ->where(['=', 'id', 1])
            ->execute();
    }
}
