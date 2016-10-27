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
            <input type="text" class="input add-item__input" placeholder="Product name" required>
            <input type="text" class="input add-item__input" placeholder="Paste link" required>
            <input type="text" class="input add-item__input" placeholder="Tracking number" required>
            <input type="text" class="input add-item__input add-item__input_price" placeholder="Price" required>
            <button class="button button_size_s">Add</button>
        </fieldset>
    </form>

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?/*= Html::a('Create Waiting', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->
    <div class="table_overflow">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
    
                'id',
                'title',
                'link',
                'track_number',
                'price',
                // 'dt_add',
                // 'dt_update',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
