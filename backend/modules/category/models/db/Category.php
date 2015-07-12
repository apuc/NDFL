<?php

    namespace backend\modules\category\models\db;


    use backend\modules\category\models\query\MenuQuery;
    use creocoder\nestedsets\NestedSetsBehavior;
    use yii\base\Exception;

    class Category extends \common\models\db\Category
    {
        public function behaviors()
        {
            return [
                'tree' => [
                    'class'          => NestedSetsBehavior::className(),
                    'treeAttribute'  => 'tree',
                    'leftAttribute'  => 'lft',
                    'rightAttribute' => 'rgt',
                    'depthAttribute' => 'lvl',
                ],
            ];
        }

        public function rules()
        {
            return [
                [['name'], 'required'],
                [['name'], 'string', 'max' => 250],
                ['parent_id', 'integer'],
            ];
        }

        public function transactions()
        {
            return [
                self::SCENARIO_DEFAULT => self::OP_ALL,
            ];
        }

        public static function find()
        {
            return new MenuQuery(get_called_class());
        }


        public function saveNode()
        {
            if ($this->validate()) {
                try {
                    if ($this->parent_id == 0)
                        $this->makeRoot();
                    else
                        $this->prependTo(Category::findOne(['id' => $this->parent_id]));
                } catch (Exception $e) {
                    return false;
                }

                return true;
            }
            return false;
        }

        public function deleteNode() {
            $this->deleteWithChildren();
        }
    }