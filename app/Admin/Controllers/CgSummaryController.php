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
    protected $title = 'CgSummary';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CgSummary());

        $grid->column('id', __('Id'));
        $grid->column('summary_sn', __('Summary sn'));
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

        $grid->setView("test");

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
