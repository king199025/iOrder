<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View                   $this
 * @var yii\widgets\ActiveForm         $form
 * @var dektrium\user\models\LoginForm $model
 * @var string                         $action
 */

?>

<div class="popup__wrap login" xmlns="http://www.w3.org/1999/html">
    <div class="popup__header">
        <h2 class="title title_size_s popup__title">Login</h2>
    </div>
    <!--<form class="login__form popup__form">
        <fieldset>
            <label class="label label_block">Login<input type="text" class="input"></label>
            <label class="label label_block">Password<input type="text" class="input"></label>
        </fieldset>
        <div class="ctrls"><button class="button">Log in</button></div>
    </form>-->

    <?php if (Yii::$app->user->isGuest): ?>
        <?php $form = ActiveForm::begin([
            'id'                     => 'login-widget-form',
            'action'                 => Url::to(['/user/security/login']),
            'options' => [
                'class' => 'login__form popup__form',
            ],
            'enableAjaxValidation'   => true,
            'enableClientValidation' => false,
            'validateOnBlur'         => false,
            'validateOnType'         => false,
            'validateOnChange'       => false,
            'fieldConfig' => [


                'inputOptions' => ['class' => 'input'],
            ],
        ]) ?>
        <label class="label label_block">Login<?= $form->field($model, 'login')->textInput()->label(false) ?></label>

        <label class="label label_block">PASSWORD<?= $form->field($model, 'password')->passwordInput()->label(false) ?></label>

        <?/*= $form->field($model, 'rememberMe')->checkbox() */?>
        <div class="ctrls">
            <?= Html::submitButton('Log in', ['class' => 'button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    <?php else: ?>
        <?= Html::a(Yii::t('user', 'Logout'), ['/user/security/logout'], [
            'class'       => 'btn btn-danger btn-block',
            'data-method' => 'post'
        ]) ?>
    <?php endif ?>
</div>
