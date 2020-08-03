<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use rmrevin\yii\fontawesome\FAS;
use ivankff\yii2ModalAjax\ModalAjax;
use leandrogehlen\treegrid\TreeGrid;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Menu */

$this->title = Yii::t('rbac-admin', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
Pjax::begin(['id' => 'grid-menu-pjax']);
?>

<div class="menu-index">
    <div class="card">
        <div class="card-header">
            <?php
            echo Html::a(
                FAS::icon('plus') . ' ' . Yii::t('rbac-admin', 'Create'),
                ['create'],
                ['class' => 'btn btn-success btn-sm btn-iframe-modal', 'title' => Yii::t('rbac-admin', 'Create')]
            );
            ?>
        </div>

        <div class="card-body p-0">
            <?php 
            echo TreeGrid::widget([
                'dataProvider' => $dataProvider,
                'keyColumnName' => 'id',
                'parentColumnName' => 'parent',
                'parentRootValue' => '',
                'pluginOptions' => [
                    'initialState' => 'collapsed',
                ],
                'columns' => [
                    'name',
                    'route',
                    'icon',
                    'order',
                    'header',
                    [
                        'class' => 'common\widgets\ActionColumn',
                        'header' => Yii::t('common', 'Actions'),
                        'options' => ['style' => 'width: 120px'],
                        'template' => '{create} {update} {view} {delete}',
                        'buttons' => [
                            'create' => function ($url, $model) {
                                return Html::a(
                                    FAS::icon('plus', ['aria' => ['hidden' => true], 'class' => ['fa-fw']]),
                                    ['create', 'parent' => $model->id],
                                    [
                                        'title' => Yii::t('backend', 'Create'),
                                        'class' => ['btn', 'btn-xs', 'btn-success', ' btn-iframe-modal']
                                    ]
                                );
                            },
                        ]
                    ]
                ]        
            ]); 
            ?>
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
        'afterClose' => new \yii\web\JsExpression("function(){ $.pjax.reload({container : '#grid-menu-pjax'}); }"),
    ]
]);
?>

<?php Pjax::end(); ?>