<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Genero $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="genero-form card shadow p-4 mb-4 bg-white rounded" style="max-width: 500px; margin: auto;">
    
<h3 class="text-center mb-4">Formulario de Genero</h3>

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation', 'novalidate' => true]
    ]); ?>

    <?= $form->field($model, 'nombre')->textInput([
        'maxlength' => true,
        'required' => true,
        'placeholder' => 'Ingrese el nombre del género',
        'class' => 'form-control mb-4'
    ]) ?>

    <div class="form-group text-center">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-primary px-4 py-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
