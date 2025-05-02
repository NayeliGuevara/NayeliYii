<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Prestamo $model */

$this->title = Yii::t('app', 'Crear Prestamo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prestamos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestamo-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
