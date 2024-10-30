<?php

namespace App\Grid\Admin;

use BalajiDharma\LaravelCrud\CrudBuilder;
use App\Models\Article;

class ArticleGrid extends CrudBuilder
{
    public $title = 'Articles';
    public $description = 'Manage Articles';
    public $model = Article::class;
    public $route = 'admin.article';

    public function __construct($request = null)
    {
       parent::__construct();
       $this->request = $request;
       var_dump($this->request->get('article_search'));
    }

    public function columns()
    {
        return [
            [
                'attribute' => 'id',
                'label' => __('ID'),
                'sortable' => true,
                'searchable' => true,
                // 'list' => [
                //     'class' => 'BalajiDharma\LaravelCrud\Column\LinkColumn',
                //     'route' => 'admin.user.show',
                //     'route_params' => ['user' => 'id'],
                //     'attr' => ['class' => 'link link-primary']
                // ]
            ],
            [
                'attribute' => 'title',
                'label' => __('Title'),
                'sortable' => true,
                'filter' => 'like',
                'searchable' => true,
                // 'list' => [
                //     'class' => 'BalajiDharma\LaravelCrud\Column\LinkColumn',
                //     'route' => 'admin.user.show',
                //     'route_params' => ['user' => 'id'],
                //     'attr' => ['class' => 'link link-primary']
                // ]
            ],
            [
                'attribute' => 'content',
                'searchable' => true,
                'value' => function ($model) {
                    $content = $this->request->input('article_search', null);
                    $contentHtml = $content ? "<b>{$content}</br>" : null;
                    return $contentHtml;
                },
            ],
            [
                'attribute' => 'article_created_at',
                'sortable' => true,
            ],
            [
                'attribute' => 'created_at',
                'sortable' => true,
            ],
            [
                'attribute' => 'updated_at',
                'sortable' => true,
            ]
        ];
    }
}