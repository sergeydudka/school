<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use \crudschool\modules\languages\models\Language;
use \crudschool\modules\languages\helpers\SystemLanguage;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    $langItems = [];
    
    $sysLang = Yii::$app->lang->getLanguage();
    $url = '/' . ltrim(str_replace(Yii::$app->getHomeUrl() . ($sysLang->url == SystemLanguage::DEFAULT_LANGUAGE ? '' : $sysLang->url), '', Yii::$app->request->getUrl()), '/');
    
    $langItems[] = [
	    'label' => Html::img(Yii::$app->getHomeUrl() . $sysLang->flag) . ' ' . $sysLang->title,
	    'url' => ['#'],
        'active' => true,
    ];
    
    foreach (Language::find()->all() as $lang) {
        if ($lang->language_id !== $sysLang->language_id) {
	        $langItems[] = [
		        'label' => Html::img(Yii::$app->getHomeUrl() . $lang->flag) . ' ' . $lang->title,
		        'url' => Yii::$app->getHomeUrl() . (SystemLanguage::DEFAULT_LANGUAGE == $lang->url ? ltrim($url, '/') : $lang->url . $url),
	        ];
        }
    }

    echo Nav::widget([
	    'options' => ['class' => 'navbar-nav navbar-left'],
	    'items' => [
            [
                'label' => 'Languages',
                'url' => ['#'],
                'items' => $langItems,
            ]
	    ],
        'encodeLabels' => false,
    ]);
    
    $menuItems = [
        ['label' => 'Home', 'url' => ['/index']],
    ];
    
    $menu = new crudschool\modules\menu\controllers\DefaultController('menu', new crudschool\modules\menu\Module('menu'),[]);
    
    foreach ($menu->prepareDataProvider() as $module => $controllers) {
        
        $items = [];
        
        foreach ($controllers as $name => $params) {
            
            if ($name == 'default') {
	            continue;
            }
	        
            $items[] = [
	            'label' => $params['label'] ?: $name,
                'url' => [$params['url']]
            ];
        }
	    $menuItems[] = [
		    'label' => ucfirst($module),
		    'url' => ['/' . $module],
            'items' => $items,
        ];
    }
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
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
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
