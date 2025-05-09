<?php

use app\models\Genero;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\GeneroSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Generos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genero-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role === 'admin'): ?>
            <?= Html::a(Yii::t('app', 'Crear Genero'), ['create'], ['class' => 'btn btn-custom']) ?>
        <?php endif; ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered table-striped text-center my-grid'],
        'headerRowOptions' => ['class' => 'table-header'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombre',
            [
                'class' => ActionColumn::className(),
                'template' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->role === 'admin') ? '{view} {update} {delete}' : '{view}',
                'contentOptions' => ['class' => 'action-buttons text-center'],
                'urlCreator' => function ($action, Genero $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idgenero' => $model->idgenero]);
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
