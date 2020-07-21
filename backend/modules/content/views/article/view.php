<?php
use common\models\Article;
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
                            'attribute' => 'category_id',
                            'value' => function ($model) {
                                $query = $model->getCategory();
                                return $query->one()->title;
                            },
                        ],
                        [
                            'attribute' => 'thumbnail',
                            'format' => ['image', ['width'=>'auto','height'=>'100px',]],
                            'value' => function ($model) {
                                return $model->thumbnail_base_url . $model->thumbnail_path;
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                $statuses = Article::statuses();
                                return $statuses[$model->status];
                            },
                        ],
                        [
                            'attribute' => 'created_by',
                            'value' => function ($model) {
                                $query = $model->getAuthor();
                                return $query->one()->username;
                            },
                        ],
                        [
                            'attribute' => 'updated_by',
                            'value' => function ($model) {
                                $query = $model->getUpdater();
                                return $query->one()->username;
                            },
                        ],
                        'published_at:datetime',
                        'created_at:datetime',
                        'updated_at:datetime',
                        
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
