<?php

    namespace backend\modules\manager\models\db;

    use common\constants\UserType;
    use Yii;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    use backend\modules\manager\models\db\User;

    /**
     * UserSearch represents the model behind the search form about `backend\modules\manager\models\db\User`.
     */
    class UserSearch extends User
    {
        /**
         * @inheritdoc
         */
        public function rules()
        {
            return [
                [['id', 'created_at', 'updated_at', 'user_type'], 'integer'],
                [['email', 'password', 'name', 'surname', 'patronymic', 'salt', 'status', 'image'], 'safe'],
            ];
        }

        /**
         * @inheritdoc
         */
        public function scenarios()
        {
            // bypass scenarios() implementation in the parent class
            return Model::scenarios();
        }

        /**
         * Creates data provider instance with search query applied
         *
         * @param array $params
         *
         * @return ActiveDataProvider
         */
        public function search($params)
        {
            $query = User::find()->where(['user_type' => UserType::ADMINISTRATOR,])
                ->orWhere(['user_type' => UserType::MODERATOR,]);

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $this->load($params);

            if (!$this->validate()) {
                // uncomment the following line if you do not want to return any records when validation fails
                // $query->where('0=1');
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id'          => $this->id,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'user_type'   => $this->user_type,
            ]);

            $query->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'password', $this->password])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'surname', $this->surname])
                ->andFilterWhere(['like', 'patronymic', $this->patronymic])
                ->andFilterWhere(['like', 'salt', $this->salt])
                ->andFilterWhere(['like', 'status', $this->status])
                ->andFilterWhere(['like', 'image', $this->image]);

            return $dataProvider;
        }
    }
