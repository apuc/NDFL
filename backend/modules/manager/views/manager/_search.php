<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\manager\models\db\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php  echo $form->field($model, 'name') ?>

    <?php  echo $form->field($model, 'surname') ?>

    <?php // echo $form->field($model, 'patronymic') ?>

    <?php // echo $form->field($model, 'salt') ?>

    <?php  echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'time_create') ?>

    <?php // echo $form->field($model, 'time_update') ?>

    <?php // echo $form->field($model, 'verification_code') ?>

    <?php  echo $form->field($model, 'user_type') ?>

    <?php // echo $form->field($model, 'image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
