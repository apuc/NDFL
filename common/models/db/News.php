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
            [['title', 'tags', 'text', 'dt_add', 'status'], 'required'],
            [['text'], 'string'],
            [['dt_add', 'status'], 'integer'],
            [['title', 'tags'], 'string', 'max' => 255]
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
            'tags' => 'Tags',
            'text' => 'Text',
            'dt_add' => 'Dt Add',
            'status' => 'Status',
        ];
    }
}
