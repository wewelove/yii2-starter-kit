<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\RouteRule;
use mdm\admin\components\Configs;
use yii\widgets\Pjax;
use rmrevin\yii\fontawesome\FAS;
use ivankff\yii2ModalAjax\ModalAjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\AuthItem */
/* @var $context mdm\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('rbac-admin', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Configs::authManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>

<?php
Pjax::begin([
    'id' => 'grid-assignment-pjax',
    'timeout' => 5000,
]);
?>

<div class="role-index">
    <div class="card">
        <div class="card-header">
            <?php
            echo Html::a(
                FAS::icon('plus') . ' ' . Yii::t('rbac-admin', 'Create ' . $labels['Item']),
                ['create'],
                ['class' => 'btn btn-success btn-sm btn-ajax-modal', 'title' => Yii::t('rbac-admin', 'Create ' . $labels['Item'])]
            );
            ?>
        </div>

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
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'options' => ['style' => 'width: 60px'],
                    ],
                    [
                        'attribute' => 'name',
                        'label' => Yii::t('rbac-admin', 'Name'),
                    ],
                    [
                        'attribute' => 'ruleName',
                        'label' => Yii::t('rbac-admin', 'Rule Name'),
                        'filter' => $rules
                    ],
                    [
                        'attribute' => 'description',
                        'label' => Yii::t('rbac-admin', 'Description'),
                    ],
                    [
                        'class' => 'common\widgets\ActionColumn',
                        'header' => Yii::t('common', 'Actions'),
                        'options' => ['style' => 'width: 120px'],
                        'template' => '{update} {view} {delete}',
                        'buttons' => [
                            'view' => function ($url) {
                                return Html::a(
                                    FAS::icon('portrait', ['aria' => ['hidden' => true], 'class' => ['fa-fw']]),
                                    $url,
                                    [
                                        'title' => Yii::t('backend', 'Assignment'),
                                        'class' => ['btn', 'btn-xs', 'btn-info', ' btn-ajax-modal']
                                    ]
                                );
                            },
                        ]
                    ]
                ]
            ])
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
    'size' => 'modal-xl',
    'autoClose' => true,
    'closeButton' => false,
    'pjaxContainer' => '#grid-assignment-pjax'
]);
?>