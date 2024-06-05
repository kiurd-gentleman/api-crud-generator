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

        $folderAndFile = $this->findFolderPathAndFileName($name);

        $this->generateModel($folderAndFile['name'], $folderAndFile['folder']);
//        $this->generateMigration($folderAndFile['name']);
//        $this->generateController($folderAndFile['name'], $folderAndFile['folder']);
//        $this->generateRequest($folderAndFile['name'], $folderAndFile['folder']);
//        $this->generateRoutes($folderAndFile['name'], $folderAndFile['folder']);
    }
    protected function generateModel($name, $folder)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}' , '{{folderName}}'],
            [$name, Str::replace('/','\\', $folder)],
            $this->getStub('Model')
        );

        if (!file_exists(app_path("/Models/{$folder}"))) {
            mkdir(app_path("/Models/{$folder}"), 0777, true);
        }

        file_put_contents(app_path("/Models/{$folder}/{$name}.php"), $modelTemplate);

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

    protected function generateController($name, $folder)
    {
        $controllerTemplate = str_replace(
            ['{{modelName}}', '{{modelNamePluralLowerCase}}'],
            [$name, strtolower(Str::plural($name))],
            $this->getStub('Controller')
        );

        if (!file_exists(app_path("/Http/Controllers/{$folder}"))) {
            mkdir(app_path("/Http/Controllers/{$folder}"), 0777, true);
        }

        file_put_contents(app_path("/Http/Controllers/{$folder}/{$name}Controller.php"), $controllerTemplate);
    }

    protected function generateRequest($name, $folder)
    {
        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Request')
        );

        if (!file_exists(app_path("/Http/Requests/{$folder}"))) {
            mkdir(app_path("/Http/Requests/{$folder}"), 0777, true);
        }

        file_put_contents(app_path("/Http/Requests/{$folder}/{$name}Request.php"), $requestTemplate);
    }

    protected function generateRoutes($name, $folder)
    {
        $routesTemplate = str_replace(
            ['{{modelNamePluralLowerCase}}', '{{modelName}}'],
            [strtolower(Str::plural($name)), Str::replace('/','\\',$folder.'\\'.$name)],
            $this->getStub('Routes')
        );

        file_put_contents(base_path("routes/api.php"), $routesTemplate, FILE_APPEND);
    }

    protected function getStub($type)
    {
        return file_get_contents(__DIR__ . "/../stubs/$type.stub");
    }

    protected function findFolderPathAndFileName($name)
    {

        $folder = explode('/', $name);
        if (count($folder) > 1) {
            $name = end($folder);
            $folder = array_slice($folder, 0, -1);
            $folder = implode('/', $folder);

            return [
                'name' => $name,
                'folder' => '/'.$folder
            ];
        }
        return [
            'name' => $name,
            'folder' => ''

        ];
    }

}
