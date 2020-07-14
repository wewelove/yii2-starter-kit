<?php

use common\grid\EnumColumn;
use common\models\Article;
use common\models\ArticleCategory;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
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
Pjax::begin(['id' => 'grid-article-pjax']);
?>

<div class="article-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(FAS::icon('plus') .' '. Yii::t('backend', 'Create'), 
                ['create'], 
                ['class' => 'btn btn-success btn-sm btn-iframe-modal', 'data-type' => 'iframe']); 
            ?>
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
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'options' => ['style' => 'width: 60px'],
                    ],
                    [
                        'attribute' => 'slug',
                        'options' => ['style' => 'width: 20%'],
                    ],
                    [
                        'attribute' => 'title',
                        'options' => ['style' => 'width: 20%'],
                    ],
                    [
                        'attribute' => 'category_id',
                        'options' => ['style' => 'width: 10%'],
                        'value' => function ($model) {
                            return $model->category ? $model->category->title : null;
                        },
                        'filter' => ArrayHelper::map(ArticleCategory::find()->all(), 'id', 'title'),
                    ],
                    [
                        'class' => EnumColumn::class,
                        'attribute' => 'status',
                        'options' => ['style' => 'width: 10%'],
                        'enum' => Article::statuses(),
                        'filter' => Article::statuses(),
                    ],
                    [
                        'attribute' => 'published_at',
                        'options' => ['style' => 'width: 15%'],
                        'format' => 'datetime',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'published_at',
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'showMeridian' => true,
                                'todayBtn' => true,
                                'endDate' => '0d',
                            ]
                        ]),
                    ],
                    [
                        'attribute' => 'created_at',
                        'options' => ['style' => 'width: 15%'],
                        'format' => 'datetime',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'created_at',
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'showMeridian' => true,
                                'todayBtn' => true,
                                'endDate' => '0d',
                            ]
                        ]),
                    ],
                    
                    [
                        'class' => \common\widgets\ActionColumn::class,
                        'header' => Yii::t('common', 'Actions'),
                        'options' => ['style' => 'width: 120px'],
                    ],
                ],
            ]); ?>
    
        </div>

        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
        
    </div>
</div>

<?php
echo newerton\fancybox3\FancyBox::widget([
    'target' => '.btn-iframe-modal',
    'config' => [
        'iframe' => [
            'css' => [
                'width' => '1000px',
                'height' => '80%'
            ]
         ],
        'afterClose' => new \yii\web\JsExpression("function(){ $.pjax.reload({container : '#grid-article-pjax', timeout : 5000 }); }"),
    ]
]);
?>

<?php Pjax::end(); ?>