<?php

/**
 * @var yii\web\View $this
 * @var common\models\Article $model
 */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Article',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
