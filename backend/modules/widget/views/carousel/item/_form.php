<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\WidgetCarouselItem $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="widget-carousel-item-form">
    <?php
     $form = ActiveForm::begin([
        'layout' => ActiveForm::LAYOUT_HORIZONTAL,
        'enableClientValidation' => true,
        'enableAjaxValidation' => false
    ]); 
    ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->field($model, 'image')->widget(
                    \trntv\filekit\widget\Upload::class,
                    [
                        'url' => ['/file/storage/upload'],
                    ]
                ) ?>

                <?php echo $form->field($model, 'order')->textInput() ?>

                <?php echo $form->field($model, 'url')->textInput(['maxlength' => 1024]) ?>

                <?php echo $form->field($model, 'caption')->widget('yii\redactor\widgets\Redactor', [
                    'clientOptions' => [
                        'lang' => 'zh_cn',
                        'minHeight' => 200,
                        'buttonSource' => true,
                        'convertDivs' => false,
                        'removeEmptyTags' => true
                    ]
                ]) ?>

                <?php echo $form->field($model, 'status')->checkbox() ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
