<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Genero;
use app\models\Autor;

/** @var yii\web\View $this */
/** @var app\models\Libro $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="libro-form card shadow p-4 mb-4 bg-white rounded" style="max-width: 600px; margin: auto;">
<h3 class="text-center mb-4">Formulario de Libro</h3>

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation', 'novalidate' => true]
    ]); ?>

    <?= $form->field($model, 'titulo')->textInput([
        'maxlength' => true,
        'required' => true,
        'placeholder' => 'Ingrese el título del libro',
        'class' => 'form-control mb-3'
    ]) ?>

    <?= $form->field($model, 'año_publicacion')->textInput([
        'type' => 'number',
        'required' => true,
        'placeholder' => 'Ingrese el año de publicación',
        'class' => 'form-control mb-3'
    ]) ?>

    <?= $form->field($model, 'autor_idautor')->dropDownList(
        ArrayHelper::map(Autor::find()->all(), 'idautor', function($autor) {
            return $autor->nombre . ' ' . $autor->apellido;
        }),
        [
            'prompt' => 'Seleccione un autor',
            'class' => 'form-control mb-3',
            'required' => true
        ]
    ) ?>

    <?= $form->field($model, 'genero_idgenero')->dropDownList(
        ArrayHelper::map(Genero::find()->all(), 'idgenero', 'nombre'),
        [
            'prompt' => 'Seleccione un género',
            'class' => 'form-control mb-4',
            'required' => true
        ]
    ) ?>

    <div class="form-group text-center">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-primary px-4 py-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
