<?php

namespace app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public $classes = ['class' => 'well', 'mark' => ''];

    public static function tableName()
    {
        return 'post';
    }

    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title', 'content'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'content' => 'Сообщение',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getClasses()
    {
        if ($this->incorrect == 1) {
            return $this->classes = ['class' => 'alert alert-danger', 'mark' => 'Некорректное сообщение'];
        } else {
            return $this->classes;
        }
    }
}