<?php

use yii\helpers\Html;
use \yii\helpers\Url;

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Панель администратора</h1>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Список последних зарегистрированных пользователей</div>
                <table class="table">
                    <tr>
                        <th>Username</th>
                        <th>Роль</th>
                        <th>Редактировать</th>
                    </tr>
                    <?php foreach ($userList as $user): ?>
                        <tr>
                            <td><?= $user->username ?></td>
                            <td><? echo ($user->is_admin == 1) ? 'Администратор' : 'Пользователь'; ?></td>
                            <td><a href="<?= Url::to(['/admin/main/change-role', 'id' => $user->id]) ?>">Изменить
                                    роль</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="panel-heading">
                    <a class="btn btn-primary" href="<?= Url::to('/admin/main/users') ?>">Все пользователи</a>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Последние сообщения</div>
                <table class="table">
                    <tr>
                        <th>Заголовок</th>
                        <th>Сообщение</th>
                        <th>Статус</th>
                        <th>Редактировать</th>
                    </tr>
                    <?php foreach ($postList as $post): ?>
                        <tr>
                            <td><?= Html::encode($post->title) ?></td>
                            <td><?= Html::encode($post->content) ?></td>
                            <td><? echo ($post->incorrect == 1) ? 'Некорректное' : 'Корректное'; ?></td>
                            <td><a href="<?= Url::to(['/admin/main/change-status', 'id' => $post->id]) ?>">Изменить
                                    статус</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="panel-heading">
                    <a class="btn btn-primary" href="<?= Url::to('/admin/main/posts') ?>">Корректные сообщения</a>
                    <a class="btn btn-primary" href="<?= Url::to('/admin/main/incorrect-posts') ?>">Некорректные
                        сообщения</a>
                </div>
            </div>
        </div>
    </div>
</div>