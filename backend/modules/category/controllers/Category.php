<?php

    namespace backend\modules\category\controllers;


    use yii\web\Controller;

    class Category extends Controller
    {
        public function actionEdit()
        {
            return $this->render('edit');
        }
    }