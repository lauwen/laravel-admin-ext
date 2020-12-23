<?php

namespace Lauwen\Form;

use Encore\Admin\Admin;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(FormExtension $extension)
    {
        if (! FormExtension::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'form');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/lauwen/form')],
                'form'
            );
        }

        $this->app->booted(function () {
            FormExtension::routes(__DIR__.'/../routes/web.php');
        });
        Admin::booting(function () {
            Admin::js('vendor/lauwen/form/js/lauwen-table.js');
            Admin::js('vendor/lauwen/form/js/bootstrap-table.min.js');
            Admin::js('vendor/lauwen/form/js/bootstrap-table-zh-CN.min.js');

            Admin::css('vendor/lauwen/form/css/lauwen-table.css');
            Admin::css('vendor/lauwen/form/css/bootstrap-table.min.css');
        });
    }
}
