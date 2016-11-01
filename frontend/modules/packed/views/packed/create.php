<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\packed\models\Packed */

$this->title = 'Create Packed';
$this->params['breadcrumbs'][] = ['label' => 'Packeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
