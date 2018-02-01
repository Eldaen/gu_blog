<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\StringHelper;

$this->title = 'Learning yii2, GU-web';
?>
<main class="col-md-12 main-page">
    <h1 class="main-page__header">Записи из блогов наших пользователей</h1>
    <div class="row">
        <div class="col-md-9 article-container">

            <? foreach ($articles as $model) {?>

            <article class="article">
                <h2 class="article__header"><?= Html::encode($model->title) ?></h2>
                <p class="article__preview"><?= Html::encode($model->preview) ?>
                    <a href="<?='/blog/article/?id=' . $model->id?>" class="article__read-more btn btn-info">Читать дальше</a></p>
            </article>

            <? } ?>
        </div>

        <div class="col-md-3 widget-container">
            <?=$this->render('/partials/popular',
                [
                    'popular' => $popular
                ])
            ?>
            <?=$this->render('/partials/recent',
                [
                    'recent' => $recent
                ])
            ?>
        </div>

    </div>
</main>
