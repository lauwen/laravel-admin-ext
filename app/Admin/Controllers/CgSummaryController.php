<?php

namespace App\Admin\Controllers;

use App\Models\CgSummary;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CgSummaryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '采购申请单';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
//        $grid = new Grid(new CgSummary());
        $grid = new \Lauwen\Grid\Grid(new CgSummary());

        $grid->column('id', __('Id'));
        $grid->column('summary_sn', __('Summary sn'))->expand(function ($model){
            $goods = $model->detail()->get()->map(function ($good) {
                $res = $good->only(["goods_id", "name", "supplier_id", "price", "quantity", "specs"]);
                $res = [
                    "goods_id"=>$res['goods_id'],
                    "name"=>$res['name'],
                    'supplier' => $res['supplier_id'],
                    "price"=>$res['price'],
                    "quantity"=>$res['quantity'],
                    "specs"=>$res['specs']
                ];
                return $res;
            });
            return new \Encore\Admin\Widgets\Table(['ID', '名称', '供应商', '价格', '数量', '规格'], $goods->toArray());
        })->filter('like');
        $grid->column('user_id', __('User id'));
        $grid->column('store_id', __('Store id'));
        $grid->column('remarks', __('Remarks'));
        $grid->column('check_user_id', __('Check user id'));
        $grid->column('status', __('Status'));
        $grid->column('amount', __('Amount'));
        $grid->column('supplier_id', __('Supplier id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->paginate(10);
//        $grid->fixColumns(3, -2);

        $grid->setSubGridTitle("采购申请单明细");
        $grid->setSubGridUrl("/admin/table");    // la_id::get
        $grid->setSubGridColumns(["ID", "名称", "价格", "数量", "单位"]);
        $grid->setSubGridFields(['detail_id', 'name', 'price', 'quantity', 'specs']);

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(CgSummary::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('summary_sn', __('Summary sn'));
        $show->field('user_id', __('User id'));
        $show->field('store_id', __('Store id'));
        $show->field('remarks', __('Remarks'));
        $show->field('check_user_id', __('Check user id'));
        $show->field('status', __('Status'));
        $show->field('amount', __('Amount'));
        $show->field('supplier_id', __('Supplier id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CgSummary());

        $form->text('summary_sn', __('Summary sn'));
        $form->number('user_id', __('User id'));
        $form->number('store_id', __('Store id'));
        $form->text('remarks', __('Remarks'));
        $form->number('check_user_id', __('Check user id'));
        $form->number('status', __('Status'));
        $form->decimal('amount', __('Amount'))->default(0.00);
        $form->number('supplier_id', __('Supplier id'));

        return $form;
    }
}
