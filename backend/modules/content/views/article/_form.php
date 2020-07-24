<?php

use trntv\filekit\widget\Upload;
use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\helpers\Url;
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
        'enableAjaxValidation' => false
    ]); 
    ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?php echo $form->field($model, 'slug')
                    ->hint(Yii::t('backend', 'If you leave this field empty, the slug will be generated automatically'))
                    ->textInput(['maxlength' => true]) 
                ?>

                <?php echo $form->field($model, 'category_id')->dropDownList($categories, ['prompt' => '']) ?>

                <?php echo $form->field($model, 'body')->widget('yii\redactor\widgets\Redactor', [
                    'clientOptions' => [
                        'lang' => 'zh_cn',
                        'minHeight' => 400,
                        'imageManagerJson' => Url::to(['/redactor/upload/image-json']),
                        'imageUpload' => Url::to(['/file/storage/upload-imperavi']),
                        'fileUpload' => Url::to(['/file/storage/upload-imperavi']),
                        'plugins' => [
                            'fontcolor',
                            'fontfamily',
                            'table',
                            'imagemanager',
                            'filemanager',
                            'video'
                        ]
                    ]
                ]) ?>

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

                <?php echo $form->field($model, 'published_at')->widget(
                    DateTimePicker::class,
                    [
                        'type' => DateTimePicker::TYPE_INLINE,
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd hh:ii:ss',
                            'todayBtn' => 'linked'
                        ]
                    ]
                ) ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
