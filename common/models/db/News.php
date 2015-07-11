<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $tags
 * @property string $text
 * @property integer $dt_add
 * @property integer $status
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'tags', 'text', 'status'], 'required'],
            [['text'], 'string'],
            [['status'], 'integer'],
            [['title', 'tags'], 'string', 'max' => 255],
            ['dt_add' , 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'tags' => 'Теги',
            'text' => 'Текст',
            'dt_add' => 'Дата создания',
            'status' => 'Статус',
        ];
    }
}
