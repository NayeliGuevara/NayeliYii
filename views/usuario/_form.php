<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Usuario $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="usuario-form card shadow p-4 mb-4 bg-white rounded" style="max-width: 600px; margin: auto;">
<h3 class="text-center mb-4">Formulario de Usuario</h3>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput([
        'maxlength' => true,
        'required' => true,
        'placeholder' => 'Ingrese su nombre',
        'class' => 'form-control mb-3'
    ]) ?>

    <?= $form->field($model, 'correo')->textInput([
        'maxlength' => true,
        'required' => true,
        'placeholder' => 'Ingrese su correo electrónico',
        'class' => 'form-control mb-3'
    ]) ?>

    <div class="form-group text-center">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-primary px-4 py-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
