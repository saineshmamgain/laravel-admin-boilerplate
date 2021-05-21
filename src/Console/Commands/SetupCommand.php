<?php

namespace SaineshMamgain\Boilerplate\Console\Commands;

use Illuminate\Console\Command;
use SaineshMamgain\Boilerplate\Setup\Package;

/**
 * File: SetupCommand.php
 * Author: Sainesh Mamgain
 * Email: saineshmamgain@gmail.com
 * Date: 21/05/21
 * Time: 9:56 AM
 */

class SetupCommand extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'boilerplate:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Boilerplate';


    public function handle()
    {
        Package::init()->copyFiles();
    }

}
