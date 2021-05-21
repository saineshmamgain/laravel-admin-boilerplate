<?php

namespace SaineshMamgain\Boilerplate;

use Illuminate\Support\ServiceProvider;
use SaineshMamgain\Boilerplate\Console\Commands\SetupCommand;

/**
 * File: LaravelAdminBoilerplateServiceProvider.php
 * Author: Sainesh Mamgain
 * Email: saineshmamgain@gmail.com
 * Date: 21/05/21
 * Time: 9:26 AM
 */

class LaravelAdminBoilerplateServiceProvider extends ServiceProvider {

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->app->bind('command.boilerplate.create', SetupCommand::class);
            $commands = [
                'command.boilerplate.create'
            ];
            $this->commands($commands);

            $this->publishes(
                [
                    __DIR__ . '/../resources/views' => resource_path('views'),
                    __DIR__ . '/../resources/css' => resource_path('css')
                ],
                'boilerplate-views'
            );
        }
    }

}
