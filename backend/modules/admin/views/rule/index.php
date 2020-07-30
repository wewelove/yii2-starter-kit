<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use rmrevin\yii\fontawesome\FAS;
use ivankff\yii2ModalAjax\ModalAjax;

/* @var $this  yii\web\View */
/* @var $model mdm\admin\models\BizRule */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\BizRule */

$this->title = Yii::t('rbac-admin', 'Rules');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
Pjax::begin([
    'id' => 'grid-assignment-pjax',
    'timeout' => 5000,
]);
?>

<div class="rule-index">
    <div class="card">
        <div class="card-header">
            <?php
            echo Html::a(
                FAS::icon('plus') . ' ' . Yii::t('rbac-admin', 'Create'),
                ['create'],
                ['class' => 'btn btn-success btn-sm btn-ajax-modal', 'title' => Yii::t('rbac-admin', 'Create')]
            );
            ?>
        </div>

        <div class="card-body p-0">
            <?php
            echo GridView::widget([
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
                        'class' => 'common\widgets\ActionColumn',
                        'header' => Yii::t('common', 'Actions'),
                        'options' => ['style' => 'width: 120px']
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
    'pjaxContainer' => '#grid-assignment-pjax'
]);
?>