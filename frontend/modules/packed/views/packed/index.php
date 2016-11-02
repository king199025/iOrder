<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\packed\models\PackedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Packeds';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="packed-index">

    <h1><?/*= Html::encode($this->title) */?></h1>
    <?php /*// echo $this->render('_search', ['model' => $searchModel]); */?>

    <p>
        <?/*= Html::a('Create Packed', ['create'], ['class' => 'btn btn-success']) */?>
    </p>
    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dt_add',
            'idStock',
            'address_id',
            'price',
            // 'number',
            // 'comment',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
</div>-->
<div class="table_overflow">
    <table class="table table__packed">
        <thead class="table__thead">
        <tr>
            <td class="table__action"><label class="checkbox"><input class="checkPackedAll" type="checkbox"><span></span></label></td>
            <td class="table__date">Data</td>
            <td class="table__product">Product</td>
            <td class="table__trackNumber">Track Number</td>
            <td class="table__weight">Total weight</td>
            <td class="table__price">Total price</td>
            <td class="table__info">Information</td>
        </tr>
        </thead>
        <tbody class="table__tbody">

        <?= \yii\widgets\ListView::widget(
            [
                'dataProvider' => $dataProvider,
                'itemView' => '_list',

                'layout' => "{items}",
            ]
        )?>

        </tbody>
    </table>
</div>
<br><br>
<form action="/shipped/shipped/create" method="post">
    <input type="hidden" name="id-packed" id="id-packed">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken?>" id="">
    <input class="button" type="submit" name="Shipped[btn]" value="Send to shipped" id="">
</form>
<!--<span class="button">Send to shipped</span>-->