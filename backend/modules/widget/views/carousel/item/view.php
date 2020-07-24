<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\WidgetCarouselItem $model
 */

$this->title = Yii::t('backend', 'View');
?>
<div class="widget-carousel-item-view">
    <div class="modal-header">
        <h5 class="modal-title"><?php echo $this->title; ?> </h5>
    </div>
    
    <div class="fancybox-slim-scroll p-3">
        <div class="card">
            <div class="card-body p-0">
                <?php echo DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'carousel_id',
                        'base_url:url',
                        'path',
                        'asset_url:url',
                        'type',
                        'url:url',
                        'caption',
                        'status',
                        'order',
                        'created_at',
                        'updated_at',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
