<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\WidgetCarouselItem $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="widget-carousel-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>
    <?php echo $form->field($model, 'carousel_id') ?>
    <?php echo $form->field($model, 'base_url') ?>
    <?php echo $form->field($model, 'path') ?>
    <?php echo $form->field($model, 'asset_url') ?>
    <?php // echo $form->field($model, 'type') ?>
    <?php // echo $form->field($model, 'url') ?>
    <?php // echo $form->field($model, 'caption') ?>
    <?php // echo $form->field($model, 'status') ?>
    <?php // echo $form->field($model, 'order') ?>
    <?php // echo $form->field($model, 'created_at') ?>
    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
