<?php
use common\models\WidgetCarousel;
use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\WidgetCarousel $model
 */

$this->title = Yii::t('backend', 'View') . ': ' . $model->key;
?>
<div class="widget-carousel-view">
    <div class="modal-header">
        <h5 class="modal-title"><?php echo $this->title; ?> </h5>
    </div>
    
    <div class="fancybox-slim-scroll p-3">
        <div class="card">
            <div class="card-body p-0">
                <?php echo common\widgets\DbCarousel::widget([
                    'key'=> $model->key,
                    'assetManager' => Yii::$app->getAssetManager(),
                    'options' => [
                        'class' => 'slide',
                    ],
                ]);
                ?>
            </div>
            <div class="card-footer">
                <?php echo $model->description; ?>
            </div>
        </div>
    </div>
</div>
