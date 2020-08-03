<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\KeyStorageItem $model
 */

$this->title = Yii::t('backend', 'View');
?>
<div class="key-storage-item-view">
    <div class="modal-header">
        <h5 class="modal-title"><?php echo $this->title; ?> </h5>
    </div>
    
    <div class="fancybox-slim-scroll p-3">
        <div class="card">
            <div class="card-body p-0">
                <?php echo DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'key',
                    'value:ntext',
                    'comment:ntext',
                    'updated_at:datetime',
                    'created_at:datetime',
                                        ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
