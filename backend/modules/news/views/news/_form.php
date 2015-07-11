<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\news\models\db\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

   <!-- --><?/*= $form->field($model, 'dt_add')->textInput() */?>

    <?= $form->field($model, 'status')->dropDownList([common\constants\Status::ACTIVE => \common\constants\Status::ACTIVE_TEXT,
                                                common\constants\Status::QEUEUE => \common\constants\Status::QEUEUE_TEXT]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
