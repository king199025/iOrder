<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\packed\models\PackedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packed-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'dt_add') ?>

    <?= $form->field($model, 'idStock') ?>

    <?= $form->field($model, 'address_id') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
