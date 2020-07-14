<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Article $model
 */

$this->title = Yii::t('backend', 'View');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">
    <nav class="navbar border-bottom">
        <span class="navbar-brand mb-0"><?php echo $this->title; ?> </span>
    </nav>

    <div class="fancybox-slim-scroll p-4">
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
</div>
