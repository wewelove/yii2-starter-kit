<?php
use common\grid\EnumColumn;
use common\models\WidgetCarousel;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FAS;

/**
 * @var yii\web\View $this
 * @var backend\modules\widget\models\search\CarouselItemSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Items');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="widget-carousel-item-index">

    <div class="modal-header">
        <h5 class="modal-title"><?php echo $this->title; ?> </h5>
    </div>
    
    <div class="fancybox-slim-scroll p-3">
        <div class="card">
            <div class="card-body p-0">
                <?php echo GridView::widget([
                    'layout' => "{items}\n{pager}",
                    'options' => [
                        'class' => ['gridview', 'table-responsive'],
                    ],
                    'tableOptions' => [
                        'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                    ],
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn',
                            'options' => ['style' => 'width: 60px'],
                        ],
                        [
                            'attribute' => 'image',
                            'options' => ['style' => 'width: 340px'],
                            'format' => ['image', ['width'=>'100%', 'height'=>'auto']],
                            'value' => function($model) {
                                return $model->assetUrl;
                            }
                        ],
                        'caption',
                        [
                            'attribute' => 'order',
                            'options' => ['style' => 'width: 60px'],
                        ],
                        [
                            'class' => \common\widgets\ActionColumn::class,
                            'header' => Yii::t('common', 'Actions'),
                            'options' => ['style' => 'width: 80px'],
                            'template' => '{update} {delete}',
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>

</div>