<?php

use common\models\User;

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = Yii::t('backend', 'View') . ': ' . $model->username;

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <div class="modal-header">
        <h5 class="modal-title"><?php echo $this->title; ?> </h5>
    </div>

    <div class="fancybox-slim-scroll p-3">
        <div class="card">
            <div class="card-body p-0">
                <?php echo DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [
                            'attribute' => 'id',
                            'captionOptions' => [
                                'style' => 'width: 150px;'
                            ]
                        ],
                        'username',
                        'email:email',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                $statuses = User::statuses();
                                return $statuses[$model->status];
                            },
                        ],
                        'created_at:datetime',
                        'updated_at:datetime',
                        'logged_at:datetime',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>