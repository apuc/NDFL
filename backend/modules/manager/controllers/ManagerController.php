<?php

    namespace backend\modules\manager\controllers;

    use backend\modules\manager\models\db\AuthAssignment;
    use common\constants\UserType;
    use Yii;
    use backend\modules\manager\models\db\User;
    use backend\modules\manager\models\db\UserSearch;
    use yii\base\Exception;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;
    use yii\web\UploadedFile;

    /**
     * ManagerController implements the CRUD actions for User model.
     */
    class ManagerController extends Controller
    {
        public function behaviors()
        {
            return [
                'verbs' => [
                    'class'   => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['post'],
                    ],
                ],
            ];
        }

        /**
         * Lists all User models.
         * @return mixed
         */
        public function actionIndex()
        {
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        /**
         * Displays a single User model.
         * @param integer $id
         * @return mixed
         */
        public function actionView($id)
        {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }

        public function actionCreate()
        {
            $model = new User();

            if ($model->load(Yii::$app->request->post())) {
                $model->generatePassword($model->password);

                $model->status = 1;

                $model->time_create = time();
                $model->time_update = time();

                if ($model->validate()) {
                    $model->save();
                    $image = UploadedFile::getInstance($model, 'image');
                    $model->image = md5(time()) . '.' . $image->extension;
                    $image->saveAs(Yii::getAlias('@frontend') . '/web/image/' . $model->image);

                    $authManager = Yii::$app->authManager;
                    $role = $authManager->getRole(\common\constants\UserType::getUserTypeText($model->user_type));
                    $authManager->assign($role, $model->id);

                    return $this->redirect(['view', 'id' => $model->id]);
                }

                echo '<pre>';
                print_r($model->errors);
                echo '</pre>';

                throw new Exception("Неудачка");
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

        public function actionUpdate($id)
        {
            $model = $this->findModel($id);

            $oldPassword = $model->password;
            $oldUserType = $model->user_type;
            $oldImage = $model->image;

            if ($model->load(Yii::$app->request->post())) {
                $model->time_update = time();

                if ($oldPassword != $model->password)
                    $model->generatePassword($model->password);

                if (!$model->validate())
                    throw new Exception($model->errors);

                $image = UploadedFile::getInstance($model, 'image');

                if ($image) {
                    /**
                     * удаление старой картинки, загрузка новой3
                     */

                    $oldFileUrl = Yii::getAlias('@frontend') . '/web/image/' . $oldImage;

                    if (strlen($oldImage))
                        unlink($oldFileUrl);

                    $model->image = md5(time()) . '.' . $image->extension;
                    $image->saveAs(Yii::getAlias('@frontend') . '/web/image/' . $model->image);
                } else
                    $model->image = $oldImage;

                if ($oldUserType != $model->user_type) {
                    AuthAssignment::findOne([
                        'user_id'   => $model->id,
                        'item_name' => \common\constants\UserType::getUserTypeText($oldUserType),
                    ])->delete();

                    $authManager = Yii::$app->authManager;
                    $role = $authManager->getRole(\common\constants\UserType::getUserTypeText($model->user_type));
                    $authManager->assign($role, $model->id);
                }

                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        /**
         * Deletes an existing User model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         */
        public function actionDelete($id)
        {
            $model = $this->findModel($id);
            unlink(Yii::getAlias('@frontend') . '/web/image/' . $model->image);

            $model->delete();

            return $this->redirect(['index']);
        }

        /**
         * Finds the User model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return User the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id)
        {
            if (($model = User::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }
