<?php

use Lauwen\GoodsSelection\Http\Controllers\GoodsSelectionController;

Route::get('goods-selection', GoodsSelectionController::class.'@index');