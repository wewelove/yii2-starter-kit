<?php

/**
 * @var yii\web\View $this
 * @var common\models\Page $model
 */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Page',
]) . ' ' . $model->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="page-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
