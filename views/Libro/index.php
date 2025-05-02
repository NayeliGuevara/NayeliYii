<?php

use app\models\Libro;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\LibroSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Libros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libro-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Libro'), ['create'], ['class' => 'btn btn-custom']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered table-striped text-center my-grid'],
        'headerRowOptions' => ['class' => 'table-header'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'titulo',
            'año_publicacion',
            'autor_idautor',
            'genero_idgenero',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete}',
                'contentOptions' => ['class' => 'action-buttons text-center'],
                'urlCreator' => function ($action, Libro $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idlibro' => $model->idlibro, 'autor_idautor' => $model->autor_idautor, 'genero_idgenero' => $model->genero_idgenero]);
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
    background-color: rgb(200, 120, 190);
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
    background-color: rgb(200, 120, 190);
}
CSS;
$this->registerCss($css);
?>
