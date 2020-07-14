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

$this->title = <?php echo $generator->generateString('Update') ?> ;
$this->params['breadcrumbs'][] = ['label' => <?php echo $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model-><?php echo $generator->getNameAttribute() ?>, 'url' => ['view', <?php echo $urlParams ?>]];
$this->params['breadcrumbs'][] = <?php echo $generator->generateString('Update') ?>;
?>
<div class="<?php echo Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update">
    <nav class="navbar border-bottom">
        <span class="navbar-brand mb-0"><?php echo $this->title; ?> </span>
    </nav>
    
    <div class="fancybox-slim-scroll p-4">

    <?php echo "<?php echo " ?>$this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>

</div>
