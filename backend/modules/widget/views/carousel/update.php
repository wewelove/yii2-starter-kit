<?php

/**
 * @var yii\web\View $this
 * @var common\models\WidgetCarousel $model
 */

$this->title = Yii::t('backend', 'Update') . ': ' . $model->key;;
?>
<div class="widget-carousel-update">
    <div class="modal-header">
        <h5 class="modal-title"><?php echo $this->title; ?> </h5>
    </div>
    
    <div class="fancybox-slim-scroll p-3">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>

</div>
