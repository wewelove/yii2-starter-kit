<?php
use common\grid\EnumColumn;
use common\models\User;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use rmrevin\yii\fontawesome\FAS;
use ivankff\yii2ModalAjax\ModalAjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = Yii::t('backend', 'Assignment');
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    [
        'class' => 'yii\grid\SerialColumn',
        'options' => ['style' => 'width: 60px'],
    ],
    'username',
    'email:email',
    [
        'class' => EnumColumn::class,
        'options' => ['style' => 'width: 120px'],
        'attribute' => 'status',
        'enum' => User::statuses(),
        'filter' => User::statuses()
    ],
];

$columns[] = [    
    'class' => \common\widgets\ActionColumn::class,
    'header' => Yii::t('common', 'Actions'),
    'options' => ['style' => 'width: 120px'],
    'template' => '{update} {view}',
    'buttons' => [
        'update' => function ($url, $model) {
            return Html::a(
                FAS::icon('edit', ['aria' => ['hidden' => true], 'class' => ['fa-fw']]),
                ['/user/update', 'id' => $model->id],
                [
                    'title' => Yii::t('backend', 'User') .': '. $model->username,
                    'class' => ['btn', 'btn-xs', 'btn-warning', ' btn-iframe-modal']
                ]
            );
        },
        'view' => function ($url, $model) {
            if($model->status == User::STATUS_ACTIVE) {
                return Html::a(
                    FAS::icon('portrait', ['aria' => ['hidden' => true], 'class' => ['fa-fw']]),
                    $url,
                    [
                        'title' => Yii::t('backend', 'User') .': '. $model->username,
                        'class' => ['btn', 'btn-xs', 'btn-info', ' btn-iframe-modal']
                    ]
                );
            }
        },
    ]
];
?>

<?php
Pjax::begin(['id' => 'grid-assignment-pjax']);
?>

<div class="assignment-index">
    <div class="card">
        <div class="card-header">
            <?= Html::a(FAS::icon('user-plus') .' '. Yii::t('backend', 'Create'), 
                ['/user/create'], 
                [ 'class' => 'btn btn-success btn-sm btn-iframe-modal', 'title' => Yii::t('backend', 'Create')]); 
            ?>
        </div>

        <div class="card-body p-0">

            <?= GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $columns,
            ]);
            ?>

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
        'afterClose' => new \yii\web\JsExpression("function(){ $.pjax.reload({container : '#grid-assignment-pjax'}); }"),
    ]
]);
?>

<?php Pjax::end(); ?>
