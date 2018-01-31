<?php

namespace console\controllers;

use components\Config;
use components\console\Controller;
use console\models\Migration;
use helpers\FilesHelper;

/**
 * Class MigrateController
 * @package console\controllers
 */
class MigrateController extends Controller
{
    /**
     * @var string
     */
    protected $migrationsDir;

    /**
     * @var string
     */
    protected $migrationsNamespace;

    /**
     * @var Migration
     */
    private $migrationModel;

    /**
     * MigrateController constructor.
     */
    public function __construct()
    {
        $this->migrationsDir = Config::get('migrations.dir');
        $this->migrationsNamespace = ltrim(Config::get('migrations.namespace'), '\\');
        $this->migrationModel = new Migration();

        $this->migrationModel->init();
    }

    /**
     * @param string $migrationName
     * @return string
     */
    public function actionCreate($migrationName)
    {
        $className = 'M' . time() . '_' . $migrationName;
        $content = <<<PHP
<?php

namespace {$this->migrationsNamespace};

use components\db\Migration;
        
/**
 * Class {$className}
 * @package {$this->migrationsNamespace}
 */
class {$className} extends Migration
{
    public function up()
    {
    }
    
    public function down()
    {
    }
}
PHP;

        file_put_contents("{$this->migrationsDir}/{$className}.php", $content);

        return $this->writeLine("Migration {$className} created successfully");
    }

    /**
     * @return string
     */
    public function actionUp()
    {
        $executedMigrations = $this->migrationModel->getLastExecutedMigrations();
        $newMigrations = FilesHelper::scanDir($this->migrationsDir, $executedMigrations);

        if (empty($newMigrations)) {
            return $this->writeLine('Database is up to date');
        }

        foreach ($newMigrations as $migration) {
            $migrationClass = $this->getMigrationClassName($migration);
            if (!class_exists($migrationClass)) {
                echo $this->writeLine("Migration '{$migration}' is not exists");
                continue;
            }

            call_user_func([new $migrationClass(), 'up']);
            $this->migrationModel->saveMigration($migration);

            echo $this->writeLine("Migration '{$migration}' executed");
        }

        return $this->writeLine('Database is up to date');
    }

    /**
     * @param int $limit
     * @return string
     */
    public function actionDown($limit = 1)
    {
        $deprecatedMigrations = $this->migrationModel->getLastExecutedMigrations($limit);
        if (empty($deprecatedMigrations)) {
            return $this->writeLine('Nothing to revert');
        }

        $reverted = 0;
        foreach ($deprecatedMigrations as $migration) {
            $migrationClass = $this->getMigrationClassName($migration);
            if (!class_exists($migrationClass)) {
                echo $this->writeLine("Migration '{$migration}' is not exists");
                continue;
            }

            call_user_func([new $migrationClass(), 'down']);
            $this->migrationModel->revertMigration($migration);
            $reverted++;

            echo $this->writeLine("Migration '{$migration}' reverted");
        }

        return $this->writeLine("Reverted {$reverted} migrations");
    }

    /**
     * @param string $migration
     * @return string
     */
    private function getMigrationClassName($migration)
    {
        return vsprintf('\%s\%s', [$this->migrationsNamespace, substr($migration, 0, stripos($migration, '.php'))]);
    }
}
