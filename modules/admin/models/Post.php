<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord
{

    public static function tableName()
    {
        return 'post';
    }

    public function rules()
    {
        return [
            ['incorrect', 'safe']
        ];
    }

}