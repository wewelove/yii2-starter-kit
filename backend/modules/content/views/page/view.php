<?php

use common\models\Page;
use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Page $model
 */

$this->title = Yii::t('backend', 'View') . ': ' . $model->title;
?>
<div class="page-view">
    <div class="modal-header">
        <h5 class="modal-title"><?php echo $this->title; ?> </h5>
    </div>

    <div class="fancybox-slim-scroll p-3">
        <div class="card">
            <div class="card-body p-0">
                <?php echo DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [
                            'attribute' => 'id',
                            'captionOptions' => [
                                'style' => 'width: 150px;'
                            ]
                        ],
                        'slug',
                        'title',
                        'body:html',
                        'view',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                $statuses = Page::statuses();
                                return $statuses[$model->status];
                            },
                        ],
                        'created_at:datetime',
                        'updated_at:datetime',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>