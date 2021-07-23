<?php

namespace Aoeng\Laravel\Admin\Version\Admin\Controllers;

use Aoeng\Laravel\Admin\Version\Models\Version;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class VersionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '版本';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Version());

        $grid->model()->orderByDesc('published_at');
        $grid->column('id', __('Id'));
        $grid->column('name', '版本名称');
        $grid->column('version', '版本号');
        $grid->column('type', '类型')->using(Version::$typeMap)->label();
        $grid->column('update_link', '更新地址');
        $grid->column('download_link', '下载地址');
        $grid->column('published_at', '发布时间')->editable();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Version::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('version', __('Version'));
        $show->field('content', __('Content'));
        $show->field('update_link', __('Update link'));
        $show->field('download_link', __('Download link'));
        $show->field('published_at', __('Published at'));
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
        $form = new Form(new Version());

        $form->text('name', '版本名称')->required();
        $form->text('version', '版本名号')->required();
        $form->select('type', '更新类型')->options(Version::$typeMap)->default(1);
        $form->file('update_link', '更新地址')->required();
        $form->apk('download_link', '下载地址')->required();
        $form->textarea('content', '更新内容')->required();
        $form->datetime('published_at', '发布时间')->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
