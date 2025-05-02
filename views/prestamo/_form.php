<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Prestamo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="prestamo-form card shadow p-4 mb-4 bg-white rounded" style="max-width: 600px; margin: auto;">
<h3 class="text-center mb-4">Formulario de Prestamo</h3>
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation', 'novalidate' => true]
    ]); ?>

    <?= $form->field($model, 'libro_idlibro')->textInput([
        'type' => 'number',
        'required' => true,
        'placeholder' => 'Ingrese el ID del libro',
        'class' => 'form-control mb-3'
    ]) ?>

    <?= $form->field($model, 'usuario_idusuario')->textInput([
        'type' => 'number',
        'required' => true,
        'placeholder' => 'Ingrese el ID del usuario',
        'class' => 'form-control mb-3'
    ]) ?>

    <?= $form->field($model, 'fecha_prestamo')->textInput([
        'type' => 'date',
        'required' => true,
        'class' => 'form-control mb-3'
    ]) ?>

    <?= $form->field($model, 'fecha_devolucion')->textInput([
        'type' => 'date',
        'required' => true,
        'class' => 'form-control mb-4'
    ]) ?>

    <div class="form-group text-center">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-primary px-4 py-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
