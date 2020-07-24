<?php
use common\grid\EnumColumn;
use common\models\WidgetCarousel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FAS;

/**
 * @var yii\web\View $this
 * @var backend\modules\widget\models\search\CarouselSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Widget Carousels');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
Pjax::begin(['id' => 'grid-widget-carousel-pjax']);
?>

<div class="widget-carousel-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(FAS::icon('plus') .' '. Yii::t('backend', 'Create'), 
                ['create'], 
                ['class' => 'btn btn-success btn-sm btn-iframe-modal', 'title' => Yii::t('backend', 'Create')]);  
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

                    'key',
                    'description',
                    [
                        'class' => EnumColumn::class,
                        'attribute' => 'status',
                        'options' => ['style' => 'width: 120px'],
                        'enum' => WidgetCarousel::statuses(),
                        'filter' => WidgetCarousel::statuses(),
                    ],
                    
                    [
                        'class' => \common\widgets\ActionColumn::class,
                        'header' => Yii::t('backend', 'Items'),
                        'options' => ['style' => 'width: 120px'],
                        'template' => '{items} {create}',
                        'buttons' => [
                            'items' => function ($url, $model) {
                                return Html::a(
                                    FAS::icon('images', ['aria' => ['hidden' => true], 'class' => ['fa-fw']]),
                                    Url::to(['/widget/carousel-item/index', 'carousel_id' => $model->id]),
                                    [
                                        'title' => Yii::t('backend', 'View'),
                                        'class' => ['btn', 'btn-xs', 'btn-info', 'btn-iframe-modal']
                                    ]
                                );
                            },
                            'create' => function ($url, $model) {
                                return Html::a(
                                    FAS::icon('plus', ['aria' => ['hidden' => true], 'class' => ['fa-fw']]),
                                    Url::to(['/widget/carousel-item/create', 'carousel_id' => $model->id]),
                                    [
                                        'title' => Yii::t('backend', 'Create'),
                                        'class' => ['btn', 'btn-xs', 'btn-success', 'btn-iframe-modal']
                                    ]
                                );
                            }
                        ],
                    ],
                    [
                        'class' => \common\widgets\ActionColumn::class,
                        'header' => Yii::t('common', 'Actions'),
                        'options' => ['style' => 'width: 120px'],
                    ]
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
        'type' => 'iframe',
        'iframe' => [
            'css' => [
                'width' => '60%',
                'height' => '80%'
            ]
         ],
        'afterClose' => new \yii\web\JsExpression("function(){ $.pjax.reload({container : '#grid-widget-carousel-pjax'}); }"),
    ]
]);
?>

<?php Pjax::end(); ?>