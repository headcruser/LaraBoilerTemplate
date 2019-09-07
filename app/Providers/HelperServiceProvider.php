<?php

namespace App\Providers;

use App\Console\Commands\HelperMakeCommand;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //register commands
        $this->commands([
            HelperMakeCommand::class,
        ]);


        //load custom helpers with a mapper
        if (count(config('helpers.custom_helpers', []))) 
        {
            foreach (config('helpers.custom_helpers', []) as $customHelper) {
                $file = app_path() . '/' . $this->getHelpersDirectory() . '/' . $customHelper . '.php';
                if (file_exists($file)) {
                    require_once($file);
                }
            }
        }
        //load custom helpers automatically
        else {
            //include the custom helpers
            foreach (glob(app_path() . '/' . $this->getHelpersDirectory() . '/*.php') as $file) {
                require_once($file);
            }
        }
    }

    /**
     * get the directory the helpers are stored in
     *
     * @return mixed
     */
    public function getHelpersDirectory()
    {
        return config('helpers.directory', 'Helpers');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
