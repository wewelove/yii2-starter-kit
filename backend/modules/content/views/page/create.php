<?php

/**
 * @var yii\web\View $this
 * @var common\models\Page $model
 */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Page',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
