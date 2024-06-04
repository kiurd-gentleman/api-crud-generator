<?php

namespace Krimt\ApiFirstCrudPackage\Commands;

use Illuminate\Console\Command;

class ApiCrudGeneratorCommand extends Command
{
    protected $signature = 'crud:generate {name}';
    protected $description = 'Generate CRUD operations';

    public function handle()
    {
        $name = $this->argument('name');
        $this->generateModel($name);

        dd($name);
        $this->info('Generating CRUD for ' . $name);
    }

    protected function generateModel($name)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Model')
        );

        file_put_contents(app_path("/Models/{$name}.php"), $modelTemplate);
    }
    protected function getStub($type): bool|string
    {
        return file_get_contents(__DIR__ . "/../stubs/$type.text");
    }

}
