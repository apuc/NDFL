<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property integer $id
 * @property string $text
 * @property integer $user_id
 * @property integer $date
 *
 * @property User $user
 * @property ReviewAnswer[] $reviewAnswers
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'user_id', 'date'], 'required'],
            [['text'], 'string'],
            [['user_id', 'date'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'user_id' => 'User ID',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviewAnswers()
    {
        return $this->hasMany(ReviewAnswer::className(), ['review_id' => 'id']);
    }
}
