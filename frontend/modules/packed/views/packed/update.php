<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\packed\models\Packed */

$this->title = 'Update Packed: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Packeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="packed-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
