<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use rmrevin\yii\fontawesome\FAS;
use ivankff\yii2ModalAjax\ModalAjax;

/**
 * @var yii\web\View $this
 * @var backend\modules\content\models\search\ArticleSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Articles');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
Pjax::begin([
    'id' => 'grid-article-pjax',
    'timeout' => 5000,
]);
?>

<div class="article-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(FAS::icon('plus'), ['create'], [ 'class' => 'btn btn-success btn-ajax-modal', 'title' => Yii::t('backend', 'Create')]); ?>
        </div>

        <div class="card-body p-0">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?php echo GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'slug',
                    'title',
                    'body:ntext',
                    'view',
                    // 'category_id',
                    // 'thumbnail_base_url:url',
                    // 'thumbnail_path',
                    // 'status',
                    // 'created_by',
                    // 'updated_by',
                    // 'published_at',
                    // 'created_at',
                    // 'updated_at',
                    
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>

<?php Pjax::end(); ?>

<?php
echo ModalAjax::widget([
    'selector' => 'a.btn-ajax-modal',
    'bootstrapVersion' => ModalAjax::BOOTSTRAP_VERSION_4,
    'header' => '',
    'size' => 'modal-xl',
    'autoClose' => true,
    'pjaxContainer' => '#grid-article-pjax'
]);
?>