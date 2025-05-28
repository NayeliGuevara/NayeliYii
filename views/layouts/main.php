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
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        // Quitamos brandLabel para no mostrar texto
        //'brandLabel' => Yii::$app->name,
        //'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top'],
        // Para eliminar el link por defecto, dejamos 'brandUrl' en null o '#'
        'brandUrl' => false,
        'renderInnerContainer' => false, // Si quieres quitar el contenedor interno para mayor control
    ]);
    ?>

    <div class="logo">
        <a href="<?= Yii::$app->homeUrl ?>">
            <img src="<?= Yii::getAlias('@web/assets/images/logo.png') ?>" alt="Logo" style="height:40px;">
        </a>
    </div>

    <?php
    $menuItems = [
        ['label' => '<i class="bi bi-house-door-fill"></i> Inicio', 'url' => ['/site/index'], 'encode' => false],
        ['label' => '<i class="bi bi-info-circle-fill"></i> Acerca de Nosotros', 'url' => ['/site/about'], 'encode' => false],
        ['label' => '<i class="bi bi-envelope-fill"></i> Contáctanos', 'url' => ['/site/contact'], 'encode' => false],
    ];

    if (!Yii::$app->user->isGuest) {
        $menuItems[] = [
            'label' => '<i class="bi bi-book-half"></i> Gestionar Libro',
            'items' => array_filter([
                ['label' => '<i class="bi bi-person-fill"></i> Usuario', 'url' => ['/usuario/index'], 'encode' => false],
                ['label' => '<i class="bi bi-tags-fill"></i> Género', 'url' => ['/genero/index'], 'encode' => false],
                ['label' => '<i class="bi bi-journal-bookmark-fill"></i> Libro', 'url' => ['/libro/index'], 'encode' => false],
                ['label' => '<i class="bi bi-pencil-fill"></i> Autor', 'url' => ['/autor/index'], 'encode' => false],
                ['label' => '<i class="bi bi-box-arrow-in-right"></i> Préstamo', 'url' => ['/prestamo/index'], 'encode' => false],
                Yii::$app->user->identity->role === 'admin'
                    ? ['label' => '<i class="bi bi-people-fill"></i> Usuarios', 'url' => ['/user/index'], 'encode' => false]
                    : null,
            ]),
            'encode' => false,
            'submenuOptions' => ['class' => 'dropdown-menu dropdown-menu-end'],
        ];
        $menuItems[] = ['label' => '<i class="bi bi-key-fill"></i> Cambiar Contraseña', 'url' => ['/user/change-password'], 'encode' => false];

        $menuItems[] = [
            'label' => '<i class="bi bi-box-arrow-right"></i> Cerrar Sesión (' . Html::encode(Yii::$app->user->identity->apellido . ' ' . Yii::$app->user->identity->nombre) . ') ' . strtoupper(Html::encode(Yii::$app->user->identity->role)),
            'url' => ['/site/logout'],
            'linkOptions' => [
                'data-method' => 'post',
                'class' => 'nav-link logout',
                'style' => 'color: #fff;',
            ],
            'encode' => false,
        ];
    } else {
        $menuItems[] = ['label' => '<i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión', 'url' => ['/site/login'], 'encode' => false];
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
