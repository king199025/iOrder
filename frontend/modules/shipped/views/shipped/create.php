<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\shipped\models\Shipped */

$this->title = 'Create Shipped';
$this->params['breadcrumbs'][] = ['label' => 'Shippeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipped-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
