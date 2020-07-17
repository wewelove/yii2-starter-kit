<?php
use common\models\User;

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

?>
<div class="user-view">
    <div class="card">
        <div class="card-body p-0">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
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
