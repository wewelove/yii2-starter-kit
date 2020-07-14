<?php

/**
 * @var yii\web\View $this
 * @var common\models\Article $model
 */

$this->title = Yii::t('backend', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="article-update">
    <nav class="navbar border-bottom">
        <span class="navbar-brand mb-0"><?php echo $this->title; ?> </span>
    </nav>

    <div class="fancybox-slim-scroll p-4">

        <?php echo $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>