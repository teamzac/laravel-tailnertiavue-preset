<?php

namespace TeamZac\LaravelTailnertiavuePreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class TailnertiavuePresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        PresetCommand::macro('tailnertiavue', function ($command) {
            TailnertiaVuePreset::install();
            $command->info('`Tailnertiavue` scaffolding installed successfully.');
            $command->info('Please add "App\Providers\InertiaServiceProvider::class" to config/app.php');
            $command->info('Please run "npm install && npm run watch" to compile your fresh scaffolding.');
        });
    }
}
