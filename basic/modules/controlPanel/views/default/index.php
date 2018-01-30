<?php

use yii\helpers\Url;

$this->title = 'Личный кабинет юзера';

?>

<div class="private-default-index">
    <h1>Личный кабинет  юзера</h1>
    <p>
    <?= \yii\helpers\Html::a('Создать запись', Url::to('/controlPanel/blogentry/index')) ?>
    </p>
</div>
