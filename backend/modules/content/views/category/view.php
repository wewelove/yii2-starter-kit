<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\ArticleCategory $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Article Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-category-view">
    <div class="card">
        <div class="card-body">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'slug',
                    'title',
                    'body:ntext',
                    'parent_id',
                    'status',
                    'created_at',
                    'updated_at',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>
