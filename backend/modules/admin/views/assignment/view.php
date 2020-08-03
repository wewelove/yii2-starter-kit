<?php

use mdm\admin\AnimateAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Assignment */
/* @var $fullnameField string */

$userName = $model->{$usernameField};

if (!empty($fullnameField)) {
    $userName .= ' (' . ArrayHelper::getValue($model, $fullnameField) . ')';
}
$userName = Html::encode($userName);

$this->title = Yii::t('backend', 'Assignment') . ': ' . $userName;

// AnimateAsset::register($this);
YiiAsset::register($this);

$opts = Json::htmlEncode([
    'items' => $model->getItems(),
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));

?>
<div class="assignment-index">
    <div class="modal-header">
        <h5 class="modal-title"><?php echo $this->title; ?> </h5>
    </div>

    <div class="fancybox-slim-scroll p-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <input class="form-control search mb-1" data-target="available" placeholder="<?= Yii::t('rbac-admin', 'Search for available'); ?>">
                        <select multiple size="20" class="form-control list" data-target="available"> </select>
                    </div>
                    <div class="col-sm-2 text-center">
                        <br><br>
                        <?= Html::a('&gt;&gt;', ['assign', 'id' => (string) $model->id], [
                            'class' => 'btn btn-success btn-assign',
                            'data-target' => 'available',
                            'title' => Yii::t('rbac-admin', 'Assign'),
                        ]); ?>
                        <br><br>
                        <?= Html::a('&lt;&lt;', ['revoke', 'id' => (string) $model->id], [
                            'class' => 'btn btn-danger btn-assign',
                            'data-target' => 'assigned',
                            'title' => Yii::t('rbac-admin', 'Remove'),
                        ]); ?>
                    </div>
                    <div class="col-sm-5">
                        <input class="form-control search mb-1" data-target="assigned" placeholder="<?= Yii::t('rbac-admin', 'Search for assigned'); ?>">
                        <select multiple size="20" class="form-control list" data-target="assigned"> </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>