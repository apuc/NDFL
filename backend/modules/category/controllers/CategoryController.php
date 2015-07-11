<?php

    namespace backend\modules\category\controllers;


    use backend\modules\category\models\db\Category;
    use backend\modules\category\models\form\CategorySearch;
    use Yii;
    use yii\data\Sort;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;

    class CategoryController extends Controller
    {
        public function actionIndex()
        {
            $searchModel = new CategorySearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        public function actionView($id)
        {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }

        public function actionCreate()
        {
            $model = new Category();

            if ($model->load(Yii::$app->request->post()) && $model->saveNode()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

        public function actionUpdate($id)
        {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->saveNode()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

        public function actionDelete($id)
        {
            $model = $this->findModel($id);
            $model->deleteNode();

            return $this->redirect(['index']);
        }

        protected function findModel($id)
        {
            if (($model = Category::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }