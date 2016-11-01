<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\stock\models\StockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stocks';
$this->params['breadcrumbs'][] = $this->title;
?>


    <!--<h1><?/*= Html::encode($this->title) */?></h1>
    <?php /*// echo $this->render('_search', ['model' => $searchModel]); */?>

    <p>
        <?/*= Html::a('Create Stock', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->
    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'number',
            'weight',
            'link',
            // 'price',
            // 'dt_add',
            // 'dt_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
    <div class="table_overflow">
        <table class="table table__stock">
            <thead class="table__thead">
            <tr>
                <td class="table__action"><label class="checkbox"><input type="checkbox"><span></span></label></td>
                <td class="table__date">Data</td>
                <td class="table__product">Product</td>
                <td class="table__trackNumber">Track Number</td>
                <td class="table__weight">Weight</td>
                <td class="table__price">Price</td>
                <td class="table__action"></td>
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

<div class="table__send__wr">
    <table class="table table__send">
        <thead class="table__thead">
        <tr>
            <td class="table__date">Data</td>
            <td class="table__product">Products Information</td>
            <td class="table__address">Address <span class="link link_add link_address"></span></td>
            <td class="table__description">Description <span class="link link_add link_comment"></span></td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="table__date"><?= date('d.m.Y'); ?></td>
            <td class="table__product">
                <table class="table packedInfo">
                    <!--<tbody>
                    <tr>
                        <td class="table__product">Iphone 7 Gold Edition 128 gb</td>
                        <td class="table__trackNumber">12345678901012312</td>
                        <td class="table__price">$ 800</td>
                    </tr>
                    <tr>
                        <td class="table__product">Iphone 7 Gold Edition 128 gb</td>
                        <td class="table__trackNumber">12345678901012312</td>
                        <td class="table__price">$ 800</td>
                    </tr>
                    <tr>
                        <td class="table__product">Iphone 7 Gold Edition 128 gb</td>
                        <td class="table__trackNumber">12345678901012312</td>
                        <td class="table__price">$ 800</td>
                    </tr>
                    </tbody>-->
                </table>
            </td>
            <td class="table__address address__text">Address</td>
            <td class="table__description">
                <div class="table__price_total">Total price: <span>$<span class="summPrice">0</span></span></div>
                <div class="table__tn tarck__number">Tracking number: <br><span class="span__tarck__number">

                    </span></div>
                <div class="table__coment">Comment: <br>
                    <span class="comment_text"></span>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <form id="packedForm" action="/packed/packed/update" method="post">
        <input type="hidden" name="packed_id" id="">
        <input type="hidden" name="Packed[idStock]" id="">
        <input type="hidden" name="Packed[dt_add]" value="<?= time(); ?>" id="">
        <input type="hidden" name="Packed[address_id]" value="" id="">
        <input type="hidden" name="Packed[price]" value="" id="">
        <input type="hidden" name="Packed[number]" value="" id="">
        <input type="hidden" name="Packed[comment]" value="" id="">

        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken?>" id="">

        <input type="submit" value="Send to packed" class="button" name="" id="">
        <!--<span class="button">Send to packed</span>-->
    </form>
</div>



<div class="popup stock__popup_edit">
    <div class="popup__wrap">
        <div class="popup__header">
            <h2 class="title title_size_s popup__title">Edit Product</h2>
            <span class="popup__close"></span>
        </div>
        <form class="edit-product edit-stock popup__form">

        </form>
    </div>
</div>



<div class="popup stock__popup_address">
    <div class="popup__wrap">
        <div class="popup__header">
            <h2 class="title title_size_s popup__title">Choose Address</h2>
            <span class="popup__close"></span>
        </div>
        <form class="choose-address popup__form">
            <fieldset>
                <label class="label label_block">Choose address</label>
                <div class="choose-address__list">
                    <?php foreach($address as $item): ?>
                            <div class="choose-address__item">
                                <label>
                                    <input type="radio" value="<?= $item->id; ?>" name="addres" class="radio"><span></span><span><?= $item->country?>, <?= $item->city?>, <?= $item->address?>, <?= $item->first_name . ' ' . $item->last_name?></span>
                                </label>
                                <span class="link fa fa-pencil"></span>
                            </div>
                    <?php endforeach; ?>
                </div>
            </fieldset>
            <div class="ctrls">
                <span class="link choose-address__add">+ Add new address</a></span><br>
                <button class="button addAddresToForm">Confirm</button>
            </div>
        </form>
    </div>
</div>

<div class="popup stock__popup_address_add">
    <div class="popup__wrap">
        <div class="popup__header">
            <h2 class="title title_size_s popup__title">Add Address</h2>
            <span class="popup__close"></span>
            <span class="link popup__back">&#60; Choose address</span>
        </div>
        <form class="form-address popup__form">
            <fieldset>
                <div>
                    <label class="label label_size_l">First name <input type="text" name="first_name" class="input"></label
                    ><label class="label label_size_l">Last name <input type="text" name="last_name" class="input"></label>
                </div>
                <label class="label label_block">Address <input type="text" name="address" class="input"></label>
                <div>
                    <label class="label label_size_l">City <input type="text" name="city" class="input"></label
                    ><label class="label label_size_l">Zip code <input type="text" name="zip_code" class="input"></label
                    ><label class="label label_size_l">Country <input type="text" name="country" class="input"></label
                    ><label class="label label_size_l">Telefon number <input type="text" name="phone" class="input"></label>
                </div>
            </fieldset>

            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken?>" id="">

            <div class="ctrls"><button class="button createAddress">Confirm</button></div>
        </form>
    </div>
</div>


<div class="popup stock__popup_comment">
    <div class="popup__wrap">
        <div class="popup__header">
            <h2 class="title title_size_s popup__title">Introduce Commentary</h2>
            <span class="popup__close"></span>
        </div>
        <form class="edit-product popup__form">
            <fieldset>
                <label class="label label_block">Comment <textarea name="comment" cols="" rows="" class="textarea"></textarea></label>
            </fieldset>
            <div class="ctrls"><button class="button addCommentForm">Confirm</button></div>
        </form>
    </div>
</div>