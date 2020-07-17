<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Article $model
 */

$this->title = Yii::t('backend', 'View');
?>
<div class="article-view">
    <div class="modal-header">
        <h5 class="modal-title"><?php echo $this->title; ?> </h5>
    </div>

    <div class="fancybox-slim-scroll p-4">
        <div class="card">
            <div class="card-body p-0">
                <?php echo DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'slug',
                        'title',
                        'body:ntext',
                        'view',
                        'category_id',
                        'thumbnail_base_url:url',
                        'thumbnail_path',
                        'status',
                        'created_by',
                        'updated_by',
                        'published_at:datetime',
                        'created_at:datetime',
                        'updated_at:datetime',
                        
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
