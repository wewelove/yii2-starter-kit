<?php

/**
 * @var yii\web\View $this
 * @var common\models\ArticleCategory $model
 */

?>

<div class="article-category-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
    ]) ?>

</div>
