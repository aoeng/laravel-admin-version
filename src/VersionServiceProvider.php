<?php


namespace Aoeng\Laravel\Admin\Version;


use Illuminate\Support\ServiceProvider;

class VersionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!Version::boot()) {
            return;
        }

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
    }

}
