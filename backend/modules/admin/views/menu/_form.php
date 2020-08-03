<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use mdm\admin\models\Menu;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Menu */
/* @var $form yii\widgets\ActiveForm */

$opts = Json::htmlEncode([
    'menus' => Menu::getMenuSource(),
    'routes' => Menu::getSavedRoutes(),
]);
$this->registerJs("var _opts = $opts;");
$this->registerJs($this->render('_script.js'));
?>

<div class="menu-form">
    <?php $form = ActiveForm::begin([
        'layout' => ActiveForm::LAYOUT_HORIZONTAL,
        'enableClientValidation' => true,
        'enableAjaxValidation' => false
    ]);
    ?>

    <div class="card">
        <div class="card-body">
            <?= Html::activeHiddenInput($model, 'parent', ['id' => 'parent_id']); ?>

            <?= $form->field($model, 'parent_name')->textInput(['id' => 'parent_name', 'readonly' => true]) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>

            <?= $form->field($model, 'route')->textInput(['id' => 'route']) ?>

            <?= $form->field($model, 'icon')->textInput() ?>

            <?= $form->field($model, 'order')->input('number') ?>

            <?= $form->field($model, 'header')->checkbox()?>
        </div>

        <div class="card-footer">
            <?=
                Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), ['class' => $model->isNewRecord
                    ? 'btn btn-success' : 'btn btn-primary'])
            ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>