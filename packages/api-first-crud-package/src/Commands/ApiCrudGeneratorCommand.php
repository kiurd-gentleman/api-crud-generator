<?php

namespace Krimt\ApiFirstCrudPackage\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ApiCrudGeneratorCommand extends Command
{
    protected $signature = 'crud:generate {name}';
    protected $description = 'Generate CRUD operations';

    public function handle()
    {
        $name = $this->argument('name');

        // find file name and folder name
        $folderAndFile = $this->findFolderPathAndFileName($name);

        dd($folderAndFile);

        $this->generateModel($folderAndFile);
//        $this->generateMigration($name);
//        $this->generateController($name);
//        $this->generateRequest($name);
//        $this->generateRoutes($name);
    }

    protected function findFolderPathAndFileName($name){

        $folder = explode('/', $name);
        if (count($folder) > 1) {
            $name = end($folder);
            $folder = array_slice($folder, 0, -1);
            $folder = implode('/', $folder);
            $this->createFolder($folder);

            return [
                'name' => $name,
                'folder' => $folder
            ];
        }

    }

    protected function generateModel($name)
    {
        $info = $this->makeFolder($name);
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$info['name']],
            $this->getStub('Model')
        );

        file_put_contents(app_path("/Models/{$info['folder']}/{$info['name']}.php"), $modelTemplate);

    }

    protected function generateMigration($name)
    {

        $tableName = Str::plural(strtolower($name));
        $migrationName = date('Y_m_d_His') . "_create_{$tableName}_table.php";

        $migrationTemplate = str_replace(
            ['{{tableName}}'],
            [$tableName],
            $this->getStub('Migration')
        );

        file_put_contents(database_path("/migrations/{$migrationName}"), $migrationTemplate);
    }

    protected function generateController($name)
    {
        $controllerTemplate = str_replace(
            ['{{modelName}}', '{{modelNamePluralLowerCase}}'],
            [$name, strtolower(Str::plural($name))],
            $this->getStub('Controller')
        );

        file_put_contents(app_path("/Http/Controllers/{$name}Controller.php"), $controllerTemplate);
    }

    protected function generateRequest($name)
    {
        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Request')
        );

        //if Request folder does not exist, create it
        if (!file_exists(app_path("/Http/Requests"))) {
            mkdir(app_path("/Http/Requests"));
        }

        file_put_contents(app_path("/Http/Requests/{$name}Request.php"), $requestTemplate);
    }

    protected function generateRoutes($name)
    {
        $routesTemplate = str_replace(
            ['{{modelNamePluralLowerCase}}', '{{modelName}}'],
            [strtolower(Str::plural($name)), $name],
            $this->getStub('Routes')
        );

        file_put_contents(base_path("routes/api.php"), $routesTemplate, FILE_APPEND);
    }

    protected function getStub($type)
    {
//        dd(app_path("packages/api-first-crud-package/src/stubs/$type.stub"));
        return file_get_contents(base_path("packages/api-first-crud-package/src/stubs/$type.stub"));
    }

    protected function makeFolder($name)
    {
        $folder = explode('/', $name);
        if (count($folder) > 1) {
            $name = end($folder);
            $folder = array_slice($folder, 0, -1);
            $folder = implode('/', $folder);
            $this->createFolder($folder);

            return [
                'name' => $name,
                'folder' => $folder
            ];
        }
        return [
            'name' => $name,
            'folder' => ''

        ];

    }

    protected function createFolder($folder)
    {
        if (!file_exists(app_path("/Models/{$folder}"))) {
            mkdir(app_path("/Models/{$folder}"), 0777, true);
        }
    }

}
