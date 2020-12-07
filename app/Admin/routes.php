<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->get('table', function () {
        $id = request()->get('la_id');
        $res = \App\Models\CgSummaryDetail::where('summary_id', $id)->get();
        if (empty($res)) {
            echo json_encode($res);;
        }
        echo json_encode($res->toArray());
    });
    $router->resource('cg-summaries', CgSummaryController::class);

});
