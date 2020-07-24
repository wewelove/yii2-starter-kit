<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;


/**
 * @var yii\web\View $this
 * @var yii\gii\generators\crud\Generator $generator
 */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\Pjax;
use <?php echo $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
use rmrevin\yii\fontawesome\FAS;

/**
 * @var yii\web\View $this
<?php echo !empty($generator->searchModelClass) ? " * @var " . $generator->searchModelClass . " \$searchModel\n" : '' ?>
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = <?php echo $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo "<?php\n"; ?>
Pjax::begin(['id' => 'grid-<?php echo Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-pjax']);
?>

<div class="<?php echo Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
    <div class="card">
        <div class="card-header">
            <?php echo "<?php echo " ?>Html::a(FAS::icon('plus') .' '. Yii::t('backend', 'Create'), 
                ['create'], 
                ['class' => 'btn btn-success btn-sm btn-iframe-modal', 'title' => Yii::t('backend', 'Create')]);  
            ?>
        </div>

        <div class="card-body <?php echo $generator->indexWidgetType === 'grid'? 'p-0': '' ?>">
    <?php if (!empty($generator->searchModelClass)) : ?>
        <?php echo "<?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php endif; ?>

    <?php if ($generator->indexWidgetType === 'grid') : ?>
        <?php echo "<?php echo " ?>GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                <?php echo !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n                'columns' => [\n" : "'columns' => [\n"; ?>
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'options' => ['style' => 'width: 60px'],
                    ],

                    <?php
                    $count = 0;
                    if (($tableSchema = $generator->getTableSchema()) === false) {
                        foreach ($generator->getColumnNames() as $name) {
                            if (++$count < 6) {
                                echo "'" . $name . "',\n";
                            } else {
                                echo "// '" . $name . "',\n";
                            }
                        }
                    } else {
                        foreach ($tableSchema->columns as $column) {
                            $format = $generator->generateColumnFormat($column);
                            if (++$count < 6) {
                                echo "'" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n                    ";
                            } else {
                                echo "// '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n                    ";
                            }
                        }
                    }
        ?>

                    [
                        'class' => \common\widgets\ActionColumn::class,
                        'header' => Yii::t('common', 'Actions'),
                        'options' => ['style' => 'width: 120px'],
                    ],
                ],
            ]); ?>
    <?php else: ?>
        <?php echo "<?php echo " ?>ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'itemView' => function ($model, $key, $index, $widget) {
                    return Html::a(Html::encode($model-><?php echo $nameAttribute ?>), ['view', <?php echo $urlParams ?>]);
                },
            ]) ?>
    <?php endif; ?>

        </div>
        <div class="card-footer">
            <?php echo "<?php echo " ?>getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>

<?php echo "<?php\n"; ?>
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
        'afterClose' => new \yii\web\JsExpression("function(){ $.pjax.reload({container : '#grid-<?php echo Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-pjax'}); }"),
    ]
]);
?>

<?php echo "<?php"; ?> Pjax::end(); ?>