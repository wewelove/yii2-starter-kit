<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Article $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">
    <div class="card">
        <div class="card-body">
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
                    'published_at',
                    'created_at',
                    'updated_at',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>
