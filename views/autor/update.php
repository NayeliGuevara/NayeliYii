<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Autor $model */

$this->title = Yii::t('app', 'Update Autor: {name}', [
    'name' => $model->idautor,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Autors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idautor, 'url' => ['view', 'idautor' => $model->idautor]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="autor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
