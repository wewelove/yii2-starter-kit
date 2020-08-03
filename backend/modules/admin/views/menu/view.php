<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Menu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-view">
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
                        'menuParent.name:text:Parent',
                        'name',
                        'route',
                        'order',
                    ],
                ])
                ?>

            </div>
        </div>
    </div>
</div>