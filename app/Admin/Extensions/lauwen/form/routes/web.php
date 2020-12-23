<?php

use Lauwen\Form\Http\Controllers\FormController;

Route::get('form', FormController::class.'@index');