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
            <td class="table__action"><label class="checkbox"><input type="checkbox"><span></span></label></td>
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

        <!--<tr>
            <td class="table__action"><label class="checkbox"><input type="checkbox"><span></span></label></td>
            <td class="table__date">18.06.2016</td>
            <td class="table__product">
                <div>Iphone 7 Gold Edition 128 gb<a href="" class="link table__link fa fa-link"></a><br><span>12345678901012312</span></div>
                <div>Iphone 7 Gold Edition 128 gb<a href="" class="link table__link fa fa-link"></a><br><span>12345678901012312</span></div>
                <div>Iphone 7 Gold Edition 128 gb<a href="" class="link table__link fa fa-link"></a><br><span>12345678901012312</span></div>
                <div>Iphone 7 Gold Edition 128 gb<a href="" class="link table__link fa fa-link"></a><br><span>12345678901012312</span></div>
            </td>
            <td class="table__trackNumber">TN0001</td>
            <td class="table__weight">200 lb</td>
            <td class="table__price">$1800</td>
            <td class="table__info">
                <div class="address">
                    <strong>Address</strong>
                    Razgulin Vitalii
                    Str. Dacia 89, ap 11
                    Chisinau City
                    Republic of Moldova
                </div>
                <div class="comment">
                    <strong>Comment</strong>
                    gently fragile goods, order courier delivery
                </div>
            </td>
        </tr>
        <tr>
            <td class="table__action"><label class="checkbox"><input type="checkbox"><span></span></label></td>
            <td class="table__date">18.06.2016</td>
            <td class="table__product">
                <div>Iphone 7 Gold Edition 128 gb<a href="" class="link table__link fa fa-link"></a><br><span>12345678901012312</span></div>
                <div>Iphone 7 Gold Edition 128 gb<a href="" class="link table__link fa fa-link"></a><br><span>12345678901012312</span></div>
                <div>Iphone 7 Gold Edition 128 gb<a href="" class="link table__link fa fa-link"></a><br><span>12345678901012312</span></div>
                <div>Iphone 7 Gold Edition 128 gb<a href="" class="link table__link fa fa-link"></a><br><span>12345678901012312</span></div>
            </td>
            <td class="table__trackNumber">TN0001</td>
            <td class="table__weight">200 lb</td>
            <td class="table__price">$1800</td>
            <td class="table__info">
                <div class="address">
                    <strong>Address</strong>
                    Razgulin Vitalii
                    Str. Dacia 89, ap 11
                    Chisinau City
                    Republic of Moldova
                </div>
                <div class="comment">
                    <strong>Comment</strong>
                    gently fragile goods, order courier delivery
                </div>
            </td>
        </tr>
        <tr>
            <td class="table__action"><label class="checkbox"><input type="checkbox"><span></span></label></td>
            <td class="table__date">18.06.2016</td>
            <td class="table__product">
                <div>Iphone 7 Gold Edition 128 gb<a href="" class="link table__link fa fa-link"></a><br><span>12345678901012312</span></div>
                <div>Iphone 7 Gold Edition 128 gb<a href="" class="link table__link fa fa-link"></a><br><span>12345678901012312</span></div>
                <div>Iphone 7 Gold Edition 128 gb<a href="" class="link table__link fa fa-link"></a><br><span>12345678901012312</span></div>
                <div>Iphone 7 Gold Edition 128 gb<a href="" class="link table__link fa fa-link"></a><br><span>12345678901012312</span></div>
            </td>
            <td class="table__trackNumber">TN0001</td>
            <td class="table__weight">200 lb</td>
            <td class="table__price">$1800</td>
            <td class="table__info">
                <div class="address">
                    <strong>Address</strong>
                    Razgulin Vitalii
                    Str. Dacia 89, ap 11
                    Chisinau City
                    Republic of Moldova
                </div>
                <div class="comment">
                    <strong>Comment</strong>
                    gently fragile goods, order courier delivery
                </div>
            </td>
        </tr>-->
        </tbody>
    </table>
</div>
<br><br>
<span class="button">Send to shipped</span>