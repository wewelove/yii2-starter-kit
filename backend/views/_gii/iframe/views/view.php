<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var yii\gii\generators\crud\Generator $generator
 */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var <?php echo ltrim($generator->modelClass, '\\') ?> $model
 */

$this->title = Yii::t('backend', 'View');
?>
<div class="<?php echo Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">
    <div class="modal-header">
        <h5 class="modal-title"><?php echo "<?php echo"; ?> $this->title; ?> </h5>
    </div>
    
    <div class="fancybox-slim-scroll p-3">
        <div class="card">
            <div class="card-body p-0">
                <?php echo "<?php echo " ?>DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        <?php
                        if (($tableSchema = $generator->getTableSchema()) === false) {
                            foreach ($generator->getColumnNames() as $name) {
                                echo "'" . $name . "',\n                    ";
                            }
                        } else {
                            foreach ($generator->getTableSchema()->columns as $column) {
                                $format = $generator->generateColumnFormat($column);
                                echo "'" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n                    ";
                            }
                        }
                        ?>
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
