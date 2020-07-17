<?php
use common\models\Page;
use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Page $model
 */

?>
<div class="page-view">
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
