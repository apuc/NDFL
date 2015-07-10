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
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-6 form-group">
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-4 form-group">
            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4 form-group">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4 form-group">
            <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <? //= $form->field($model, 'salt')->textInput(['maxlength' => true]) ?>

    <? //= $form->field($model, 'time_create')->textInput() ?>

    <? //= $form->field($model, 'time_update')->textInput() ?>

    <? //= $form->field($model, 'verification_code')->textInput(['maxlength' => true]) ?>


    <div class="row">
        <div class="col-xs-6 form-group">
            <?= $form->field($model, 'user_type')->listBox(
                [                 \common\constants\UserType::MODERATOR     => 'Модератор',
                 \common\constants\UserType::ADMINISTRATOR => 'Администратор'],
                ['size' => 2]
            ) ?>
        </div>
        <div class="col-xs-6 form-group">
            <?php
                $config = ($model->image) ? ['initialPreview'   => [
                    Html::img("/image/" . $model->image, ['class' => 'file-preview-image']),
                ],
                                             'initialCaption'   => $model->image,
                                             'overwriteInitial' => true,] : [];
            ?>
            <?= $form->field($model, 'image')->widget(\kartik\file\FileInput::className(), [
                'options'       => ['accept' => 'image/*'],
                'pluginOptions' => array_merge([


                    //'showCaption' => false,
                    'showRemove'       => false,
                    'showUpload'       => false,
                    'browseLabel'      => 'Выбрать изображение',
                ], $config),
            ]); ?>
        </div>
    </div>
    <? //= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
