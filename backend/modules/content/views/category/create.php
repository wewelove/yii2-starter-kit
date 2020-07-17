<?php

/**
 * @var yii\web\View $this
 * @var common\models\ArticleCategory $model
 */

?>

<div class="article-category-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
    ]) ?>

</div>
