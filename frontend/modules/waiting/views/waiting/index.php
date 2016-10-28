<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\waiting\models\WaitingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Waitings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">

    <form class="add-item" action="#">
        <fieldset>
            <input type="text" name="Waiting[title]" class="input add-item__input" placeholder="Product name" required>
            <input type="text" name="Waiting[link]" class="input add-item__input" placeholder="Paste link" required>
            <input type="text" name="Waiting[track_number]" class="input add-item__input" placeholder="Tracking number" required>
            <input type="text" name="Waiting[price]" class="input add-item__input add-item__input_price" placeholder="Price" required>
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken?>" id="">
            <button class="button button_size_s add_waiting">Add</button>
        </fieldset>
    </form>

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?/*= Html::a('Create Waiting', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->
    <div class="table_overflow">
        <table class="table table__waiting">
            <thead class="table__thead">
            <tr>
                <td class="table__date">Data</td>
                <td class="table__product">Product</td>
                <td class="table__trackNumber">Track Number</td>
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
</div>
<div class="popup waiting__popup">
    <div class="popup__wrap">
        <div class="popup__header">
            <h2 class="title title_size_s popup__title">Edit Product</h2>
            <span class="popup__close"></span>
        </div>
        <form class="edit-product popup__form">
            <!--<fieldset>
                <label class="label label_block">Product information <input type="text" class="input"></label>
                <label class="label label_size_l">Product link <input type="text" class="input"></label>
                <label class="label label_size_l">Tracking number <input type="text" class="input"></label>
                <label class="label label_size_s">Price <input type="text" class="input"></label>
            </fieldset>
            <div class="ctrls"><button class="button">Confirm</button></div>-->
        </form>
    </div>
</div>