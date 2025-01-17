<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<a name="anchorTop" id="anchorTop"></a>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    if (Yii::$app->user->isGuest) {
        $items = [
//            ['label' => 'Beacons', 'url' => ['/beacon/']],
//            ['label' => 'Equipments', 'url' => ['/equipment/']],
//            ['label' => 'Locations', 'url' => ['/location/']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Sign Up', 'url' => ['/site/signup']],
            ['label' => 'Login', 'url' => ['/site/login']],
        ];
    } else {
        $items = [
            ['label' => 'Beacons', 'url' => ['/beacon/']],
            ['label' => 'Equipments', 'url' => ['/equipment/']],
            ['label' => 'Locations', 'url' => ['/location/']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            [
                'label' => 'Account (' . Yii::$app->user->identity->username . ')',
                'items' => [
                    ['label' => 'Account',
                        'url' => ['site/account'],
                    ],
                    ['label' => 'Logout',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ],
                ],
            ]
        ];
    }
    NavBar::begin([
        'brandLabel' => 'Asset Tracking',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ECE, Ngee Ann Polytechnic <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
