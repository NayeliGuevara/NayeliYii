<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Libro $model */

$this->title = Yii::t('app', 'Actualizar Libro: {name}', [
    'name' => $model->idlibro,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idlibro, 'url' => ['view', 'idlibro' => $model->idlibro, 'autor_idautor' => $model->autor_idautor, 'genero_idgenero' => $model->genero_idgenero]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="libro-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
