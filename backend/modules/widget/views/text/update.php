<?php

/**
 * @var yii\web\View $this
 * @var common\models\WidgetText $model
 */

$this->title = Yii::t('backend', 'Update');
?>
<div class="widget-text-update">
    <div class="modal-header">
        <h5 class="modal-title"><?php echo $this->title; ?> </h5>
    </div>
    
    <div class="fancybox-slim-scroll p-3">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>

</div>
