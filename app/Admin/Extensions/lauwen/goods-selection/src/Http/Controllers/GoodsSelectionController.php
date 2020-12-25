<?php

namespace Lauwen\GoodsSelection\Http\Controllers;

use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;

class GoodsSelectionController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Title')
            ->description('Description')
            ->body(view('goods-selection::index'));
    }
}