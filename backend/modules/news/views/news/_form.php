<?php

    use mihaildev\ckeditor\CKEditor;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    mihaildev\elfinder\Assets::noConflict($this);

    /* @var $this yii\web\View */
    /* @var $model backend\modules\news\models\db\News */
    /* @var $form yii\widgets\ActiveForm */
?>
<div>

    <div class="news-form">

        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-xs-6 form-group">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-6 form-group">
                <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                <? //= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
                <?= $form->field($model, 'text')->widget(CKEditor::className(), [
                    'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
                        'preset' => 'standard',
                        'inline' => false,
                    ]),
                ]) ?>
            </div>
        </div>
        <!-- --><? /*= $form->field($model, 'dt_add')->textInput() */ ?>
        <div class="row">
            <div class="col-xs-6 form-group">
                <?= $form->field($model, 'status')->dropDownList([
                    common\constants\Status::ACTIVE => \common\constants\Status::ACTIVE_TEXT,
                    common\constants\Status::QEUEUE => \common\constants\Status::QEUEUE_TEXT
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>