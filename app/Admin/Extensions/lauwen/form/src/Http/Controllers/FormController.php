<?php

namespace Lauwen\Form\Http\Controllers;

use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;

class FormController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Title')
            ->description('Description')
            ->body(view('form::index'));
    }
}