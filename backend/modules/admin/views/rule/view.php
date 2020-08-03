<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var mdm\admin\models\AuthItem $model
 */
$this->title = Yii::t('rbac-admin', 'Rule') . ': ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="auth-rule-view">
    <div class="modal-header">
        <h5 class="modal-title"><?php echo $this->title; ?> </h5>
    </div>

    <div class="fancybox-slim-scroll p-3">
        <div class="card">
            <div class="card-body p-0">

                <?php
                echo DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'name',
                        'className',
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>
</div>