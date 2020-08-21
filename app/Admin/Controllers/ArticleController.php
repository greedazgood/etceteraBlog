<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->column('id', __('Id'));
        $grid->column('category_id', __('所属分类'))->display(function ($id){
            $category = Category::findOrfail($id);
            return $category->name;
        });
        $grid->column('title', __('标题'));
        $states = [
            'on'  => ['value' => 1, 'text' => '通过', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => '未通过', 'color' => 'danger'],
        ];
        $grid->column('published',__('是否通过'))->switch($states);
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));

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
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'));
        $show->field('title', __('Title'));
        $show->field('content', __('Content'));
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
        $form = new Form(new Article());

        $options = Category::query()->pluck('name','id');
        $form->select('category_id', __('所属分类'))->options($options);
        $form->text('title', __('标题'));
        $form->markdown('content', __('正文'));
        $states = [
            'on'  => ['value' => 1, 'text' => '通过', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => '未通过', 'color' => 'danger'],
        ];
        $form->switch('published',__('是否通过'))->states($states);

        return $form;
    }
}
