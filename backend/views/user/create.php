<?php
/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $roles yii\rbac\Role[] */
$this->title = Yii::t('backend', 'Create');

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
    <div class="modal-header">
        <h5 class="modal-title"><?php echo $this->title; ?> </h5>
    </div>

    <div class="fancybox-slim-scroll p-3">

        <?php echo $this->render('_form', [
            'model' => $model,
            'roles' => $roles
        ]) ?>

    </div>
</div>