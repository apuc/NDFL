<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    /* @var $this yii\web\View */
    /* @var $model backend\modules\manager\models\db\User */
    /* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-xs-6 form-group">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-6 form-group">
            <?= $form->field($model, 'parent_id')->dropDownList(\backend\modules\category\models\db\Category::getTree($model->isNewRecord ? 0 : $model->id), ['encode' => false]) ?>
        </div>
    </div>

    <? //= $form->field($model, 'salt')->textInput(['maxlength' => true]) ?>

    <? //= $form->field($model, 'time_create')->textInput() ?>

    <? //= $form->field($model, 'time_update')->textInput() ?>

    <? //= $form->field($model, 'verification_code')->textInput(['maxlength' => true]) ?>

    <? //= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
