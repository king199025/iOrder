<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\packed\models\Packed */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packed-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dt_add')->textInput() ?>

    <?= $form->field($model, 'idStock')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_id')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
