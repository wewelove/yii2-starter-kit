<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Page $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="page-form">
    <?php $form = ActiveForm::begin([
        'layout' => ActiveForm::LAYOUT_HORIZONTAL,
        'enableClientValidation' => true,
        'enableAjaxValidation' => false
    ]); ?>
        <div class="card">
            <div class="card-body">

                <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'slug')
                    ->hint(Yii::t('backend', 'If you leave this field empty, the slug will be generated automatically'))
                    ->textInput(['maxlength' => true]) 
                ?>

                <?php echo $form->field($model, 'body')->widget('vova07\imperavi\Widget', [
                    'settings' => [
                        'lang' => 'zh_cn',
                        'minHeight' => 200,
                        'imageUpload' => Url::to(['/file/storage/upload-imperavi']),
                        'fileUpload' => Url::to(['/file/storage/upload-imperavi']),
                        'plugins' => [
                            'fontcolor',
                            'fontfamily',
                            'table',
                            'imagemanager',
                            'filemanager',
                            'video'
                        ],
                    ],
                ]);
                ?>

                <?php echo $form->field($model, 'view')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'status')->checkbox() ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
