<?php
    /**
     * Created by PhpStorm.
     * User: admin
     * Date: 10.07.2015
     * Time: 23:07
     */

    namespace backend\modules\category\models\form;

    use backend\modules\category\models\db\Category;
    use creocoder\nestedsets\NestedSetsBehavior;
    use yii\data\ActiveDataProvider;
    use yii\data\Sort;

    class CategorySearch extends Category
    {
        public function rules()
        {
            return [
                ['name', 'string', 'max' => 250]
            ];
        }

        public function search($params)
        {
            $query = Category::find();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'sort'  => ['defaultOrder' => ['tree' => SORT_ASC, 'lft' => SORT_ASC,]],
            ]);

            $this->load($params);

            if (!$this->validate()) {
                // uncomment the following line if you do not want to return any records when validation fails
                // $query->where('0=1');
                return $dataProvider;
            }

            $query->andFilterWhere(['like', 'name', $this->name]);

            return $dataProvider;
        }
    }