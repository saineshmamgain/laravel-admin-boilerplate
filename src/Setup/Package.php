<?php

namespace SaineshMamgain\Boilerplate\Setup;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

/**
 * File: Package.php
 * Author: Sainesh Mamgain
 * Email: saineshmamgain@gmail.com
 * Date: 21/05/21
 * Time: 9:32 AM
 */

class Package {

    public static function init()
    {
        return new static();
    }


    public function copyFiles()
    {
        $this->copyPackageJson();
        $this->copyWebPackMix();
    }

    protected function copyWebPackMix()
    {
        $file = base_path() . '/webpack.mix.js';

        if (!File::exists($file)){
            File::put($file, "const mix = require('laravel-mix');");
        }

        $content = File::get($file);

        $position = strpos($content, "/* Boilerplate */");

        if ($position > 0) {
            $content = substr($content, 0, $position);
        }

        File::put($file, $content . "\r" . File::get(__DIR__ . '/../../webpack.mix.js'));
    }

    protected function copyPackageJson()
    {
        $file = base_path() . '/package.json';

        if (!File::exists($file)){
            File::put($file, '{}');
        }

        $packages = $this->packages();

        $json = File::get(base_path() . '/package.json');

        if (!empty($json)){

            $json = json_decode($json, true);

            if ($json === null && json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception("make sure package.json contains valid json");
            }

            $packages = array_merge($packages, $json);
        }

        File::put($file, json_encode($packages, JSON_PRETTY_PRINT));
    }

    protected function packages()
    {
        return [
            "private" => true,
            "scripts" => [
                "dev" => "npm run development",
                "development" => "mix",
                "watch" => "mix watch",
                "watch-poll" => "mix watch -- --watch-options-poll=1000",
                "hot" => "mix watch --hot",
                "prod" => "npm run production",
                "production" => "mix --production"
            ],
            "devDependencies" => [
                "laravel-mix" => "^6.0.6"
            ],
            "dependencies" => [
                "admin-lte" => "^3.0"
            ]
        ];
    }
}
