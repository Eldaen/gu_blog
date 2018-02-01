<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Blogentry */
/* @var $form yii\widgets\ActiveForm */
$model->enableHtmlPurifierBefore = true;
?>

<div class="blogentry-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'preview')->textarea(['maxlength' => true, 'rows' => 3]) ?>

    <?= $form->field($model, 'body')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ]]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
