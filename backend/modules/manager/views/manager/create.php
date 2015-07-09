<?php

    use yii\helpers\Html;


    /* @var $this yii\web\View */
    /* @var $model backend\modules\manager\models\db\User */

    $this->title = 'Добавленение пользователя';
    $this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Назад', ['/manager'], ['class' => 'btn btn-info']) ?>
    </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
