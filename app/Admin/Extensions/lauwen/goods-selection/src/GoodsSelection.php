<?php

namespace Lauwen\GoodsSelection;

use Encore\Admin\Form\Field;

class GoodsSelection extends Field {
    protected $view = 'goods-selection';

    protected static $css = [
        '/vendor/lauwen/goods-selection/css/goods-selection.css',
    ];

    protected static $js = [
        '/vendor/lauwen/goods-selection/js/goods-selection.js',
    ];

    public function render()
    {
        $name = $this->formatName($this->column);

        $this->script = <<<EOT

var E = window.wangEditor
var editor = new E('#{$this->id}');
editor.customConfig.zIndex = 0
editor.customConfig.uploadImgShowBase64 = true
editor.customConfig.onchange = function (html) {
    $('input[name=\'$name\']').val(html);
}
editor.create()

EOT;
        return parent::render();
    }

}
