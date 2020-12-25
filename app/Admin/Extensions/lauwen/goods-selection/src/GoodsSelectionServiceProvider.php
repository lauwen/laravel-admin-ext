<?php

namespace Lauwen\GoodsSelection;

use Illuminate\Support\ServiceProvider;

class GoodsSelectionServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(GoodsSelectionExtension $extension)
    {
        if (! GoodsSelectionExtension::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'goods-selection');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/lauwen/goods-selection')],
                'goods-selection'
            );
        }

        $this->app->booted(function () {
            GoodsSelectionExtension::routes(__DIR__.'/../routes/web.php');
        });
    }
}
