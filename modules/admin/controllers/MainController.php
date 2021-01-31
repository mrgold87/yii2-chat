<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Post;
use app\modules\admin\models\User;
use Yii;
use yii\data\Pagination;

class MainController extends AppAdminController
{
    public function actionIndex()
    {
        $userList = User::find()->limit('5')->orderby(['id' => SORT_DESC])->all();
        $postList = Post::find()->limit('5')->orderby(['id' => SORT_DESC])->all();

        return $this->render('index', compact('userList', 'postList'));
    }

    public function actionUsers()
    {
        $query = User::find();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10]);
        $userList = $query->offset($pages->offset)->limit($pages->limit)->orderby(['is_admin' => SORT_DESC])->all();

        return $this->render('users', compact('userList', 'pages'));
    }

    public function actionIncorrectPosts()
    {
        $query = Post::find()->where(['incorrect' => 1])->orderby(['id' => SORT_DESC]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10]);
        $postList = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('incorrectposts', compact('postList', 'pages'));
    }

    public function actionPosts()
    {
        $query = Post::find()->where(['incorrect' => 0])->orderby(['id' => SORT_DESC]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10]);
        $postList = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('posts', compact('postList', 'pages'));
    }

    public function actionChangeRole($id)
    {
        $model = User::findOne($id);
        if ($model->is_admin == 1) {
            $items = [$model->is_admin => 'Администратор', 0 => 'Пользователь'];
        } else {
            $items = [$model->is_admin => 'Пользователь', 1 => 'Администратор'];
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/admin/main/users']);
        }

        return $this->render('role', compact('model', 'items'));
    }

    public function actionChangeStatus($id)
    {
        $post = Post::findOne($id);
        if ($post->incorrect == 1) {
            $redirectPath = '/admin/main/incorrect-posts';
            $items = [$post->incorrect => 'Некорректное', 0 => 'Коректное'];
        } else {
            $redirectPath = '/admin/main/posts';
            $items = [$post->incorrect => 'Коректное', 1 => 'Некорректное'];
        }

        if ($post->load(Yii::$app->request->post()) && $post->save()) {
            return $this->redirect([$redirectPath]);
        }
        return $this->render('status', compact('post', 'items'));
    }
}