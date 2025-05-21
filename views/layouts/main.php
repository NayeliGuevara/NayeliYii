<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top'],
    ]);

    $menuItems = [
        ['label' => 'Inicio', 'url' => ['/site/index']],
        ['label' => 'Acerca de Nosotros', 'url' => ['/site/about']],
        ['label' => 'Contáctanos', 'url' => ['/site/contact']],
    ];

    if (!Yii::$app->user->isGuest) {
        $menuItems[] = [
            'label' => 'Gestionar Libro',
            'items' => array_filter([
                ['label' => 'Usuario', 'url' => ['/usuario/index']],
                ['label' => 'Género', 'url' => ['/genero/index']],
                ['label' => 'Libro', 'url' => ['/libro/index']],
                ['label' => 'Autor', 'url' => ['/autor/index']],
                ['label' => 'Préstamo', 'url' => ['/prestamo/index']],
                Yii::$app->user->identity->role === 'admin'
                    ? ['label' => 'Usuarios', 'url' => ['/user/index']]
                    : null,
            ]),
        ];
        $menuItems[] = ['label' => 'Cambiar Contraseña', 'url' => ['/user/change-password']];

        // Botón de cerrar sesión correctamente estilizado
        $menuItems[] = [
            'label' => 'Cerrar Sesión (' . Html::encode(Yii::$app->user->identity->apellido . ' ' . Yii::$app->user->identity->nombre) . ') ' . strtoupper(Html::encode(Yii::$app->user->identity->role)),
            'url' => ['/site/logout'],
            'linkOptions' => [
                'data-method' => 'post',
                'class' => 'nav-link logout',
                'style' => 'color: #fff;',
            ],
            'encode' => false,
        ];
    } else {
        $menuItems[] = ['label' => 'Iniciar Sesión', 'url' => ['/site/login']];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container" style="margin-top: 0px;">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
