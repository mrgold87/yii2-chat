<?php

use \yii\helpers\Url;
use \yii\widgets\LinkPager;

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Список пользователей</div>
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
            </div>
            <div>
                <?= LinkPager::widget(['pagination' => $pages]) ?>
            </div>
        </div>
    </div>
</div>