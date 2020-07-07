<?php

/**
 * @var yii\web\View $this
 * @var common\models\Article $model
 */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Article',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="article-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
