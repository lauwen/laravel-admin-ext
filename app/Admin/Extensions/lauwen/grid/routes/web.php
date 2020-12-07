<?php

use Lauwen\Grid\Http\Controllers\GridController;

Route::get('grid', GridController::class.'@index');