<?php

/* @var $this yii\web\View */
/* @var $category \crudschool\modules\articles\models\ArticleCategory */
/* @var $groups array */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h1><?= $category->title ?></h1>
    <ul>
        <?php foreach($groups as $group) { ?>
            <li>
                <a href="<?= \yii\helpers\Url::to('/learn/' . $category->article_category_id . '/' . $group->article_group_id . '/') ?>">
                    <?= $group->title ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>
