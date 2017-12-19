<?php

namespace console\controllers;

/**
 * Class MigrateController
 * @package console\controllers
 */
class MigrateController
{
    public function actionUp()
    {
        # php ./run.php migrate/up
        # run all new migrations from console/migrations folder
        # mark completed migrations as done
    }

    public function actionDown($quantity)
    {
        # php ./run.php migrate/down {n}
        # down {n} completed migrations
        # unmark down migrations as completed
    }

    public function actionCreate($migrationName)
    {
        # php ./run.php migrate/create create_users_table
        # creating new class like "{time}_create_users_table" in console/migrations folder
    }
}
