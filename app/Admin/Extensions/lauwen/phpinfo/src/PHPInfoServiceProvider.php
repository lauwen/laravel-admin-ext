<?php

namespace Lauwen\PHPInfo;

use Encore\Admin\Admin;
use Illuminate\Support\ServiceProvider;

class PHPInfoServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(PHPInfo $extension)
    {
        if (! PHPInfo::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'phpinfo');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/lauwen/phpinfo')],
                'phpinfo'
            );
        }

        $this->app->booted(function () {
            PHPInfo::routes(__DIR__.'/../routes/web.php');
        });
        Admin::booting(function () {
            Admin::js("vendor/lauwen/phpinfo/test.js");
        });
    }
}
