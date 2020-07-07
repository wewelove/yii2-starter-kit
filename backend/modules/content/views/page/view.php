<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Page $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">
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
                    'status',
                    'created_at',
                    'updated_at',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>
