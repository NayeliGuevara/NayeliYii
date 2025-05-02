<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Prestamo $model */

$this->title = Yii::t('app', 'Update Prestamo: {name}', [
    'name' => $model->idprestamo,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prestamos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idprestamo, 'url' => ['view', 'idprestamo' => $model->idprestamo, 'libro_idlibro' => $model->libro_idlibro, 'usuario_idusuario' => $model->usuario_idusuario]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="prestamo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
