<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 09.07.2015
 * Time: 22:30
 */

namespace backend\modules\category\controllers;


use yii\web\Controller;

class Category extends Controller {
    public function actionEdit() {
        return $this->render('edit');
    }
}