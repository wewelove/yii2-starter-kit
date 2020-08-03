<?php

use common\models\ArticleCategory;
use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\ArticleCategory $model
 */

$this->title = Yii::t('backend', 'View') . ': ' . $model->title;
?>

<div class="article-category-view">
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
                        'body:ntext',
                        [
                            'attribute' => 'parent_id',
                            'value' => function ($model) {
                                $query = $model->getParent();
                                return $query->one()->title;
                            },
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                $statuses = ArticleCategory::statuses();
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