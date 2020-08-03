<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\KeyStorageItem $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="key-storage-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'key') ?>
    <?php echo $form->field($model, 'value') ?>
    <?php echo $form->field($model, 'comment') ?>
    <?php echo $form->field($model, 'updated_at') ?>
    <?php echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
