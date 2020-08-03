<?php

use common\grid\EnumColumn;
use common\models\User;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\date\DatePicker;
use rmrevin\yii\fontawesome\FAS;
use ivankff\yii2ModalAjax\ModalAjax;

/**
 * @var yii\web\View $this
 * @var backend\models\search\UserSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */
$this->title = Yii::t('backend', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
Pjax::begin(['id' => 'grid-user-pjax']);
?>

<div class="user-index">
    <div class="card">
        <div class="card-header">
            <?= Html::a(FAS::icon('plus') .' '. Yii::t('backend', 'Create'), 
                ['create'], 
                [ 'class' => 'btn btn-success btn-sm btn-iframe-modal', 'title' => Yii::t('backend', 'Create')]); 
            ?>
        </div>

        <div class="card-body p-0">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'options' => ['style' => 'width: 60px'],
                    ],

                    'username',
                    'email:email',
                    [
                        'class' => EnumColumn::class,
                        'attribute' => 'status',
                        'enum' => User::statuses(),
                        'filter' => User::statuses()
                    ],
                    [
                        'attribute' => 'created_at',
                        'options' => ['style' => 'width: 200px'],
                        'format' => 'datetime',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'created_at',
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'endDate' => '0d',
                                'todayBtn' => 'linked',
                            ]
                        ]),
                    ],
                    [
                        'attribute' => 'logged_at',
                        'options' => ['style' => 'width: 200px'],
                        'format' => 'datetime',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'logged_at',
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'endDate' => '0d',
                                'todayBtn' => 'linked',
                            ]
                        ]),
                    ],
                    // 'updated_at',
                    [
                        'class' => \common\widgets\ActionColumn::class,
                        'header' => Yii::t('common', 'Actions'),
                        'template' => '{login} {assignment} {view} {update} {delete}',
                        'options' => ['style' => 'width: 140px'],
                        'buttons' => [
                            'login' => function ($url) {
                                return Html::a(
                                    FAS::icon('sign-in-alt', ['aria' => ['hidden' => true], 'class' => ['fa-fw']]),
                                    $url,
                                    [
                                        'title' => Yii::t('backend', 'Login'),
                                        'class' => ['btn', 'btn-xs', 'btn-secondary']
                                    ]
                                );
                            },
                            'assignment' => function ($url, $model) {
                                if($model->status == User::STATUS_ACTIVE) {
                                    return Html::a(
                                        FAS::icon('portrait', ['aria' => ['hidden' => true], 'class' => ['fa-fw']]),
                                        ['/admin/assignment/view', 'id' => $model->id],
                                        [
                                            'title' => Yii::t('backend', 'Assignment'),
                                            'class' => ['btn', 'btn-xs', 'btn-info', ' btn-iframe-modal']
                                        ]
                                    );
                                }
                            },
                        ],
                        'visibleButtons' => [
                            'login' => Yii::$app->user->can('administrator')
                        ]

                    ],
                ],
            ]); ?>
        </div>

        <div class="card-footer">
            <?= getDataProviderSummary($dataProvider) ?>
        </div>
    </div>
</div>

<?= newerton\fancybox3\FancyBox::widget([
    'target' => '.btn-iframe-modal',
    'config' => [
        'type' => 'iframe',
        'iframe' => [
            'css' => [
                'width' => '60%',
                'height' => '80%'
            ]
         ],
        'afterClose' => new \yii\web\JsExpression("function(){ $.pjax.reload({container : '#grid-user-pjax'}); }"),
    ]
]);
?>

<?php Pjax::end(); ?>