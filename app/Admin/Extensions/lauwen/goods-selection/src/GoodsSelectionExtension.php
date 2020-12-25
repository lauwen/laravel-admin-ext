<?php


namespace Lauwen\GoodsSelection;


use Encore\Admin\Extension;

class GoodsSelectionExtension extends Extension
{
    public $name = 'goods-selection';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';

    public $menu = [
        'title' => 'Goodsselection',
        'path'  => 'goods-selection',
        'icon'  => 'fa-gears',
    ];
}
