<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <link type="text/css" rel="stylesheet" href="/css/frontend/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/css/frontend/leaflet.ie.css" />
    <![endif]-->

    <script type="text/javascript" src="/scripts/common/jquery.min.js"></script>
    <script type="text/javascript" src="/scripts/frontend/script.js"></script>

	<?php $this->head() ?>	
</head>
<body>

<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<?php $this->beginBody() ?>
<? $images =  Yii::getAlias('@web').'/images/frontend/'; ?>

<!-- Navigation & Logo-->
<div class="mainmenu-wrapper">
    <?php NavBar::begin(
                [
                    'brandLabel' => '<img src="'.$images.'mPurpose-logo.png" alt="Multipurpose Twitter Bootstrap Template">',
                    'options' => ['style' => 'border:none;'],
                    'brandUrl' => ['site/index'],
                ]
            );
            $items = [
                [
                    'label' => 'Главная <span class="glyphicon glyphicon-home"></span>',
                    'url' => ['site/index'],
                ],
                [
                    'label' => 'Регистрация <span class="glyphicon glyphicon-pencil"></span>',
                    'url' => ['site/register']
                ],
                [
                    'label' => 'Пользователи <span class="glyphicon glyphicon-user"></span>',
                    'url' => ['site/users']
                ],
            ];

            if (Yii::$app->user->isGuest) {
                $items[] = [
                    'label' => 'Вход <span class="glyphicon glyphicon-lock"></span>',
                    'url' => ['site/login']
                ];
            } else {
                $items[] = [
                    'label' => 'Выход <span class="glyphicon glyphicon-lock"></span>',
                    'url' => ['site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }

            echo Nav::widget([
                'encodeLabels' => false,
                'options' => [
                    'class' => 'navbar-nav navbar-right',
                    'style' => 'border:none',
                ],
                    'items' => $items,
            ]);
    NavBar::end();?>
</div>

        <?= $content ?>

<!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-footer col-md-3 col-xs-6">
                <h3>Our Latest Work</h3>
                <div class="portfolio-item">
                    <div class="portfolio-image">
                        <a href="#"><img src="<?=$images; ?>portfolio6.jpg" alt="Project Name"></a>
                    </div>
                </div>
            </div>
            <div class="col-footer col-md-3 col-xs-6">
                <h3>Navigate</h3>
                <ul class="no-list-style footer-navigate-section">
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">eShop</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>

            <div class="col-footer col-md-4 col-xs-6">
                <h3>Contacts</h3>
                <p class="contact-us-details">
                    <b>Address:</b> 123 Fake Street, LN1 2ST, London, United Kingdom<br/>
                    <b>Phone:</b> +44 123 654321<br/>
                    <b>Fax:</b> +44 123 654321<br/>
                    <b>Email:</b> <a href="mailto:getintoutch@yourcompanydomain.com">getintoutch@yourcompanydomain.com</a>
                </p>
            </div>
            <div class="col-footer col-md-2 col-xs-6">
                <h3>Stay Connected</h3>
                <ul class="footer-stay-connected no-list-style">
                    <li><a href="#" class="facebook"></a></li>
                    <li><a href="#" class="twitter"></a></li>
                    <li><a href="#" class="googleplus"></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="footer-copyright">&copy; 2013 mPurpose. All rights reserved.</div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
