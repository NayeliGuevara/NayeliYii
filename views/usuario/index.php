<?php

use app\models\Usuario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\UsuarioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Usuario'), ['create'], ['class' => 'btn btn-custom']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered table-striped text-center my-grid'], // Centramos texto
        'headerRowOptions' => ['class' => 'table-header'], // Clase personalizada para el encabezado
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombre',
            'correo',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete}', // Agregar acciones de vista, edición y eliminación
                'contentOptions' => ['class' => 'action-buttons text-center'], // Centrado de las acciones
                'urlCreator' => function ($action, Usuario $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idusuario' => $model->idusuario]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

<?php
$css = <<<CSS
.table-header th {
    background-color: rgb(228, 152, 218);
    color: white;
}

.btn-custom {
    background-color: rgb(228, 152, 218);
    color: white;
    border: none;
}

.btn-custom:hover {
    background-color: rgb(200, 120, 190); /* Un poco más oscuro al pasar el mouse */
    color: white;
}

.action-buttons a {
    background-color: rgb(228, 152, 218);
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    margin: 0 2px;
    display: inline-block;
    text-decoration: none;
}

.action-buttons a:hover {
    background-color: rgb(200, 120, 190); /* Color al pasar el mouse */
}
CSS;
$this->registerCss($css);
?>
