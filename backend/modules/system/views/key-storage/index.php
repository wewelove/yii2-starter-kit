<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FAS;

/**
 * @var yii\web\View $this
 * @var backend\modules\system\models\search\KeyStorageItemSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Key Storage Items');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
Pjax::begin(['id' => 'grid-key-storage-item-pjax']);
?>

<div class="key-storage-item-index">
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
                    'value:ntext',
                    'comment:ntext',
                    'updated_at:datetime',
                    'created_at:datetime',
                    
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
        'type' => 'iframe',
        'iframe' => [
            'css' => [
                'width' => '60%',
                'height' => '80%'
            ]
         ],
        'afterClose' => new \yii\web\JsExpression("function(){ $.pjax.reload({container : '#grid-key-storage-item-pjax'}); }"),
    ]
]);
?>

<?php Pjax::end(); ?>