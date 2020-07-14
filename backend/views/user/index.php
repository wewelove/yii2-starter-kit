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
Pjax::begin([
    'id' => 'grid-user-pjax',
    'timeout' => 5000,
]);
?>

<div class="user-index">
    <div class="card">
        <div class="card-header">
            <?php  echo Html::a(FAS::icon('plus') .' '. Yii::t('backend', 'Create'), 
                ['create'], 
                [ 'class' => 'btn btn-success btn-sm btn-ajax-modal', 'title' => Yii::t('backend', 'Create')]); 
            ?>
        </div>

        <div class="card-body p-0">
            <?php echo GridView::widget([
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
                        'attribute' => 'logged_at',
                        'format' => 'datetime',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'logged_at',
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'showMeridian' => true,
                                'todayBtn' => true,
                                'endDate' => '0d',
                            ]
                        ]),
                    ],
                    // 'updated_at',
                    [
                        'class' => \common\widgets\ActionColumn::class,
                        'header' => Yii::t('common', 'Actions'),
                        'template' => '{login} {view} {update} {delete}',
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
                        ],
                        'visibleButtons' => [
                            'login' => Yii::$app->user->can('administrator')
                        ]

                    ],
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
    'size' => 'modal-lg',
    'autoClose' => true,
    'closeButton' => false,
    'pjaxContainer' => '#grid-user-pjax'
]);
?>
