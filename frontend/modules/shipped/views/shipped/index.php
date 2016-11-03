<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\shipped\models\ShippedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shippeds';
$this->params['breadcrumbs'][] = $this->title;
?>


   <!-- <h1><?/*= Html::encode($this->title) */?></h1>
    <?php /*// echo $this->render('_search', ['model' => $searchModel]); */?>

    <p>
        <?/*= Html::a('Create Shipped', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->
    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dt_add',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>

<?= \yii\widgets\ListView::widget(
    [
        'dataProvider' => $dataProvider,
        'itemView' => '_list',

        'layout' => "{items}",
    ]
)?>
<div class="popup shipped_download_file">
    <div class="popup__wrap">
        <div class="popup__header">
            <h2 class="title title_size_s popup__title">The file is generated</h2>
            <span class="popup__close"></span>
        </div>

            <div class="ctrls"><a class="button fileDownload">Download</a></div>

    </div>
</div>
