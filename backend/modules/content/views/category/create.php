<?php

/**
 * @var yii\web\View $this
 * @var common\models\ArticleCategory $model
 */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Article Category',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Article Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-category-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>