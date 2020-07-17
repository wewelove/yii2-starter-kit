<?php
use common\grid\EnumColumn;
use common\models\Page;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FAS;
use ivankff\yii2ModalAjax\ModalAjax;

/**
 * @var yii\web\View $this
 * @var backend\modules\content\models\search\PageSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
Pjax::begin([
    'id' => 'grid-page-pjax',
    'timeout' => 5000,
]);
?>

<div class="page-index">
    <div class="card">
        <div class="card-header">
            <?php  echo Html::a(FAS::icon('plus') .' '. Yii::t('backend', 'Create'), 
                ['create'], 
                [ 'class' => 'btn btn-success btn-sm  btn-ajax-modal', 'title' => Yii::t('backend', 'Create')]); 
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

                    'slug',
                    'title',
                    [
                        'class' => EnumColumn::class,
                        'attribute' => 'status',
                        'enum' => Page::statuses(),
                        'filter' => Page::statuses(),
                    ],
                    // 'created_at',
                    // 'updated_at',
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

<?php Pjax::end(); ?>

<?php
echo ModalAjax::widget([
    'selector' => 'a.btn-ajax-modal',
    'bootstrapVersion' => ModalAjax::BOOTSTRAP_VERSION_4,
    'header' => '',
    'size' => 'modal-lg',
    'autoClose' => true,
    'closeButton' => false,
    'pjaxContainer' => '#grid-page-pjax'
]);
?>