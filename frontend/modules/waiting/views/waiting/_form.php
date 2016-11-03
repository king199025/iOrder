<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\waiting\models\Waiting */
/* @var $form yii\widgets\ActiveForm */
?>



    <?php $form = ActiveForm::begin(['action' => '#', 'options' => ['class' => 'add-item']]); ?>
    <fieldset>
        <?= $form->field($model, 'title')->textInput(['placeholder' => 'Product name','maxlength' => true, 'class' => 'input add-item__input'])->label(false) ?>

        <?= $form->field($model, 'link')->textInput(['placeholder' => 'Paste link', 'maxlength' => true, 'class' => 'input add-item__input'])->label(false); ?>

        <?= $form->field($model, 'track_number')->textInput(['placeholder' => 'Tracking number','maxlength' => true, 'class' => 'input add-item__input'])->label(false) ?>

        <?= $form->field($model, 'price')->textInput(['placeholder' => 'Price','class' => 'input add-item__input add-item__input_price'])->label(false) ?>
        <?= Html::submitButton('Add',['class' => 'button button_size_s add_waiting']) ?>
    </fieldset>

    <?php ActiveForm::end(); ?>


<!--<form class="add-item" action="#">
    <fieldset>
        <input type="text" name="Waiting[title]" class="input add-item__input" placeholder="Product name" required>
        <input type="text" name="Waiting[link]" class="input add-item__input" placeholder="Paste link" required>
        <input type="text" name="Waiting[track_number]" class="input add-item__input" placeholder="Tracking number" required>
        <input type="text" name="Waiting[price]" class="input add-item__input add-item__input_price" placeholder="Price" required>
        <input type="hidden" name="_csrf" value="<?/*= Yii::$app->request->csrfToken*/?>" id="">
        <button class="button button_size_s add_waiting">Add</button>
    </fieldset>
</form>-->