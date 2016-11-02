<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\shipped\models\Shipped */

$this->title = 'Update Shipped: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Shippeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shipped-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
