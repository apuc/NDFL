<?php
    /**
     * Created by PhpStorm.
     * User: admin
     * Date: 10.07.2015
     * Time: 23:47
     */

    namespace backend\modules\category\models\query;


    use creocoder\nestedsets\NestedSetsQueryBehavior;
    use yii\db\ActiveQuery;

    class MenuQuery extends ActiveQuery
    {
        public function behaviors()
        {
            return [
                NestedSetsQueryBehavior::className(),
            ];
        }
    }