<?php

use yii\helpers\Html;
use \yii\helpers\Url;
use \yii\widgets\LinkPager;

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Некоректные сообщения</h1>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Некоректные сообщения</div>
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
            </div>
            <div>
                <?= LinkPager::widget(['pagination' => $pages]) ?>
            </div>
        </div>
    </div>
</div>