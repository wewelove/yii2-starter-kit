<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var mdm\admin\models\AuthItem $model
 */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="auth-rule-view">
    <div class="card">
        <div class="card-body">

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