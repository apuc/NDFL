<?php

    namespace common\models\db;

    use backend\modules\category\models\query\MenuQuery;
    use creocoder\nestedsets\NestedSetsBehavior;
    use Yii;
    use yii\data\Sort;
    use yii\helpers\Html;

    /**
     * This is the model class for table "category".
     *
     * @property integer $id
     * @property string $name
     * @property integer $lft
     * @property integer $rgt
     * @property integer $lvl
     * @property integer $tree
     * @property integer $parent_id
     *
     * @property Theme[] $themes
     */
    class Category extends \yii\db\ActiveRecord
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

        /**
         * @inheritdoc
         */
        public static function tableName()
        {
            return 'category';
        }

        /**
         * @inheritdoc
         */
        public function rules()
        {
            return [
                [['name'], 'required'],
                [['lft', 'rgt', 'lvl', 'tree', 'parent_id'], 'integer'],
                [['name'], 'string', 'max' => 250]
            ];
        }

        public static function getTree($id = 0)
        {
            $exceptionId = [];

            if ($id != 0){
                $exceptionNode = \backend\modules\category\models\db\Category::findOne(['id' => $id]);
                $exceptionId[] = $id;

                $exceptionNodes = $exceptionNode->children()->all();

                foreach ($exceptionNodes as $node) {
                    $exceptionId[] = $node->id;
                }
            }

            $models = Category::find()
                ->orderBy(['tree' => SORT_ASC, 'lft' => SORT_ASC])
                ->where(['not in', 'id', $exceptionId])
                ->all();

            $arr = [0 => 'Корневая'];
            foreach ($models as $model) {
                $arr[$model->id] = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $model->lvl) . $model->name;
            }

            return $arr;
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels()
        {
            return [
                'id'        => 'ID',
                'name'      => 'Название',
                'lft'       => 'Left',
                'rgt'       => 'Right',
                'lvl'       => 'Вложенность',
                'parent_id' => 'Категория родителя',
                'tree'      => 'tree',
            ];
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getThemes()
        {
            return $this->hasMany(Theme::className(), ['category_id' => 'id']);
        }
    }
