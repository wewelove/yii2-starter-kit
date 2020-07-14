<?php

use trntv\filekit\widget\Upload;
use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\web\JsExpression;

/**
 * @var yii\web\View $this
 * @var common\models\Article $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="article-form">
    <?php
     $form = ActiveForm::begin([
        'layout' => ActiveForm::LAYOUT_HORIZONTAL,
        'enableClientValidation' => true,
        'enableAjaxValidation' => true
    ]); 
    ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?php echo $form->field($model, 'slug')
                    ->hint(Yii::t('backend', 'If you leave this field empty, the slug will be generated automatically'))
                    ->textInput(['maxlength' => true]) 
                ?>

                <?php echo $form->field($model, 'category_id')->dropDownList($model->allActiveCategories(), ['prompt' => '']) ?>

                <?php echo $form->field($model, 'body')->widget(
                    \yii\imperavi\Widget::class,
                    [
                        'plugins' => ['fullscreen', 'fontcolor', 'video'],
                        'options' => [
                            'lang' => 'zh_cn',
                            'minHeight' => 400,
                            'maxHeight' => 400,
                            'buttonSource' => true,
                            'convertDivs' => false,
                            'removeEmptyTags' => true,
                            'imageUpload' => Yii::$app->urlManager->createUrl(['/file/storage/upload']),
                        ],
                    ]
                ) ?>

                <?php echo $form->field($model, 'thumbnail')->widget(
                    Upload::class,
                    [
                        'url' => ['/file/storage/upload'],
                        'maxFileSize' => 5000000, // 5 MiB,
                        'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                    ]
                ) ?>

                <?php echo $form->field($model, 'attachments')->widget(
                    Upload::class,
                    [
                        'url' => ['/file/storage/upload'],
                        'sortable' => true,
                        'maxFileSize' => 10000000, // 10 MiB
                        'maxNumberOfFiles' => 10,
                    ]
                ) ?>

                <?php echo $form->field($model, 'view')->textInput(['maxlength' => true]) ?>

                <?php echo $form->field($model, 'status')->checkbox() ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
