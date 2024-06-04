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
        $this->generateModel($name);
    }

    protected function generateModel($name)
    {


        //if there is any / in the name, create the folder with that name

        $folder = explode('/', $name);
        if (count($folder) > 1) {
            $name = end($folder);
            $folder = array_slice($folder, 0, -1);

            $folder = implode('/', $folder);
            dump($folder, $name);

            if (!file_exists(app_path("/Models/{$folder}"))) {
                mkdir(app_path("/Models/{$folder}"), 0777, true);
            }
            $modelTemplate = str_replace(
                ['{{modelName}}'],
                [$name],
                $this->getStub('Model')
            );
            file_put_contents(app_path("/Models/{$folder}/{$name}.php"), $modelTemplate);
        } else {
            $modelTemplate = str_replace(
                ['{{modelName}}'],
                [$name],
                $this->getStub('Model')
            );
            file_put_contents(app_path("/Models/{$name}.php"), $modelTemplate);
        }

    }

    protected function getStub($type)
    {
//        dd(app_path("packages/api-first-crud-package/src/stubs/$type.stub"));
        return file_get_contents(base_path("packages/api-first-crud-package/src/stubs/$type.stub"));
    }

}
