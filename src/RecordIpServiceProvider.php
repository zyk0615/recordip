<?php

namespace ZYKUtil\RecordIp;

use ZYKUtil\RecordIp\Console\TableCommand;
use Illuminate\Support\ServiceProvider;

class RecordIpServiceProvider extends ServiceProvider
{
    protected array $commands = [
        TableCommand::class
    ];

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/recordip.php' => config_path('recordip.php'),
        ], 'zykutil-recordip');
    }

    public function register()
    {
        $configPath = __DIR__ . '/config/recordip.php';
        $this->mergeConfigFrom($configPath, 'recordip');

        $this->commands($this->commands);

        $this->app->singleton(RecordIpService::class, function () {
            return new RecordIpService;
        });
    }
}
