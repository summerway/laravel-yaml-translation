<?php

namespace MapleSnow\Yaml;

use \Illuminate\Translation\TranslationServiceProvider as IlluminateTranslationServiceProvider;
use MapleSnow\Yaml\Helper\YamlFileLoader;
use Config;

class TranslationServiceProvider extends IlluminateTranslationServiceProvider
{
    public function boot() {
        $path = realpath(__DIR__.'/../../resources/lang');
        $this->publishes([$path => resource_path("lang")]);
    }


    /**
     * Register the translation line loader.
     * Add support for YAML files.
     *
     * @return void
     */
    protected function registerLoader()
    {
        $this->app->singleton('translation.loader', function ($app) {
            return new YamlFileLoader($app['files'], $app['path.lang']);
        });
    }
}