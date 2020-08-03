<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\KeyStorageItem $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="key-storage-item-form">
    <?php
     $form = ActiveForm::begin([
        'layout' => ActiveForm::LAYOUT_HORIZONTAL,
        'enableClientValidation' => true,
        'enableAjaxValidation' => false
    ]); 
    ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'key')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'value')->textarea(['rows' => 6]) ?>
                <?php echo $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
