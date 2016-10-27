<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\waiting\models\Waiting */

$this->title = 'Create Waiting';
$this->params['breadcrumbs'][] = ['label' => 'Waitings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="waiting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
