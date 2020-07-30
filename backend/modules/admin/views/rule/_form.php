<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this  yii\web\View */
/* @var $model mdm\admin\models\BizRule */
/* @var $form ActiveForm */
?>

<div class="auth-rule-form">

    <?php $form = ActiveForm::begin([
        'layout' => ActiveForm::LAYOUT_HORIZONTAL,
        'enableClientValidation' => true,
        'enableAjaxValidation' => false
    ]);
    ?>
    <div class="card">
        <div class="card-body">

            <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

            <?= $form->field($model, 'className')->textInput() ?>

        </div>

        <div class="card-footer">
            <?php
            echo Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), [
                'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
            ])
            ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>