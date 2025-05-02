<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Autor $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="autor-form card shadow p-4 mb-4 bg-white rounded" style="max-width: 500px; margin: auto;">

    <h3 class="text-center mb-4">Formulario de Autor</h3>

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation', 'novalidate' => true]
    ]); ?>

    <?= $form->field($model, 'nombre')->textInput([
        'maxlength' => true,
        'required' => true,
        'placeholder' => 'Ingrese el nombre',
        'class' => 'form-control mb-3'
    ]) ?>

    <?= $form->field($model, 'apellido')->textInput([
        'maxlength' => true,
        'required' => true,
        'placeholder' => 'Ingrese el apellido',
        'class' => 'form-control mb-3'
    ]) ?>

    <?= $form->field($model, 'nacionalidad')->textInput([
        'maxlength' => true,
        'required' => true,
        'placeholder' => 'Ingrese la nacionalidad',
        'class' => 'form-control mb-4'
    ]) ?>

    <div class="form-group text-center">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-primary px-4 py-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
