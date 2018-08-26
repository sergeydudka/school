<?php

/* @var $this yii\web\View */
/* @var $categories array */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <ul>
        <?php foreach($categories as $category) { ?>
            <li>
                <a href="<?= \yii\helpers\Url::to('/learn/' . $category->article_category_id . '/') ?>">
                    <?= $category->title; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>
