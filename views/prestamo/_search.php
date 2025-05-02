<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PrestamoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="prestamo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idprestamo') ?>

    <?= $form->field($model, 'libro_idlibro') ?>

    <?= $form->field($model, 'usuario_idusuario') ?>

    <?= $form->field($model, 'fecha_prestamo') ?>

    <?= $form->field($model, 'fecha_devolucion') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
