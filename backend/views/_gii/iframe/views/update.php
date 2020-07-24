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

/**
 * @var yii\web\View $this
 * @var <?php echo ltrim($generator->modelClass, '\\') ?> $model
 */

$this->title = Yii::t('backend', 'Update');
?>
<div class="<?php echo Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update">
    <div class="modal-header">
        <h5 class="modal-title"><?php echo "<?php echo"; ?> $this->title; ?> </h5>
    </div>
    
    <div class="fancybox-slim-scroll p-3">

    <?php echo "<?php echo " ?>$this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>

</div>
