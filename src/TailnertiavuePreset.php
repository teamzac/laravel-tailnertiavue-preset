<?php

namespace TeamZac\LaravelTailnertiavuePreset;

use Illuminate\Support\Arr;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset;

class TailnertiavuePreset extends Preset
{
    public static function install()
    {
        static::updatePackages();
        static::updateBootstrapping();
        static::scaffoldComponents();
        static::removeNodeModules();
    }

    protected static function updatePackageArray(array $packages)
    {
        return array_merge([
            '@babel/plugin-syntax-dynamic-import' => '^7.2.0',
            '@tailwindcss/custom-forms' => '^0.2.0',
            '@inertiajs/inertia' => '^0.1.3',
            '@inertiajs/inertia-vue' => '^0.1.1',
            'moment' => '^2.24.0',
            'portal-vue' => '^2.1.5',
            'postcss-import' => '^12.0.1',
            'postcss-nesting' => '^7.0.0',
            'tailwindcss' => "^1.1.0",
            'vue' => '^2.5.17',
            'vue-template-compiler' => '^2.6.10',
        ], $packages);
    }

    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
        copy(__DIR__.'/stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__.'/stubs/resources/js/app.js', resource_path('js/app.js'));
        copy(__DIR__.'/stubs/resources/js/bootstrap.js', resource_path('js/bootstrap.js'));
        copy(__DIR__.'/stubs/resources/js/vue.js', resource_path('js/vue.js'));
        copy(__DIR__.'/stubs/app/Providers/InertiaServiceProvider.php', app_path('Providers/InertiaServiceProvider.php'));

        tap(new Filesystem, function ($fs) {
            $fs->copyDirectory(__DIR__.'/stubs/resources/views', resource_path('views'));
            $fs->copyDirectory(__DIR__.'/stubs/resources/css', resource_path('css'));
        });
    }

    protected static function scaffoldComponents()
    {
        tap(new Filesystem, function ($fs) {
            $fs->deleteDirectory(resource_path('js/components'));
            $fs->copyDirectory(__DIR__.'/stubs/resources/js/Components', resource_path('js/Components'));
            $fs->copyDirectory(__DIR__.'/stubs/resources/js/Shared', resource_path('js/Shared'));
            $fs->copyDirectory(__DIR__.'/stubs/resources/js/Pages', resource_path('js/Pages'));
        });
    }
}
