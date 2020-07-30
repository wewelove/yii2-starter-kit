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
Pjax::begin([
    'id' => 'grid-menu-pjax',
    'timeout' => 5000,
]);
?>

<div class="menu-index">
    <div class="card">
        <div class="card-header">
            <?php
            echo Html::a(
                FAS::icon('plus') . ' ' . Yii::t('rbac-admin', 'Create Menu'),
                ['create'],
                ['class' => 'btn btn-success btn-sm btn-ajax-modal', 'title' => Yii::t('rbac-admin', 'Create Menu')]
            );
            ?>
        </div>

        <div class="card-body p-0">
            <?php 
            echo TreeGrid::widget([
                'dataProvider' => $dataProvider,
                'keyColumnName' => 'id',
                'parentColumnName' => 'parent',
                'columns' => [
                    'name',
                    'route',
                    'order',
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
                                        'class' => ['btn', 'btn-xs', 'btn-success', ' btn-ajax-modal']
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

<?php Pjax::end(); ?>

<?php
echo ModalAjax::widget([
    'selector' => 'a.btn-ajax-modal',
    'bootstrapVersion' => ModalAjax::BOOTSTRAP_VERSION_4,
    'header' => '',
    'size' => 'modal-lg',
    'autoClose' => true,
    'closeButton' => false,
    'pjaxContainer' => '#grid-menu-pjax'
]);
?>