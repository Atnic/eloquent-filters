<?php

namespace Smartisan\Filters\Console;

use Illuminate\Console\Command;
use Illuminate\Foundation\Application;

class MakeFilterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:filter {name}';

    /**
     * Laravel application instance.
     *
     * @var Application
     */
    protected $app;

    /**
     * MakeTableCommand constructor.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        parent::__construct();

        $this->app = $app;
    }

    /**
     * Execute console command.
     *
     * @return void
     */
    public function handle()
    {
        $name = $this->argument('name');

        $namespace = $this->app['config']->get('filters.namespace');

        $stub = $this->app['files']->get(realpath(__DIR__ . '/stubs/filter.stub'));
        $stub = str_replace('{NAMESPACE}', $namespace, $stub);
        $stub = str_replace('{FILTER_NAME}', $name, $stub);

        $path = $this->app['config']->get('filters.path') . '/' . $name . '.php';

        if ($this->app['files']->exists($path)) {
            $this->info('Filter already exists!');
        } else {
            $this->app['files']->put($path . '/' . $name . '.php', $stub);

            $this->info('Filter is created.');
        }
    }
}
