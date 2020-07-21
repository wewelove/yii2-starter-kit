<?php
use common\models\ArticleCategory;
use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\ArticleCategory $model
 */

?>

<div class="article-category-view">
    <div class="card">
        <div class="card-body p-0">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
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
