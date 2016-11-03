<?php
//\common\classes\Debug::prn($model);
use common\models\db\PackedStock;
use common\models\db\Stock;

$idPacked = [];
foreach($model['shipped_packed'] as $item){
    $idPacked[] = $item->packed_id;
}

$packed = \common\models\db\Packed::find()->where(['id' => $idPacked])->all();


/*$idStock = PackedStock::find()->where(['packed_id' => $idPacked])->all();
$stock = [];
foreach($idStock as $item){
    $stock[] = $item->stock_id;
}

$stockInfo = Stock::find()->where(['id' => $stock])->all();*/

//\common\classes\Debug::prn($stock);
?>


<div class="shipped"><span class="date"><?= date('d.m.Y', $model['dt_add']);?></span> Shipped #<?= $model['id']; ?> <a href="#" data-id="<?= $model['id']; ?>" class="link fa fa-download generete_excel"></a></div>


<div class="table_overflow accordion">
    <table class="table table__packed">
        <thead class="table__thead">
        <tr>
            <td class="table__date">Data</td>
            <td class="table__product">Product</td>
            <td class="table__trackNumber">Track Number</td>
            <td class="table__weight">Total weight</td>
            <td class="table__price">Total price</td>
            <td class="table__info">Information</td>
        </tr>
        </thead>
        <tbody class="table__tbody">
        <?php foreach($packed as $item):?>

        <tr>
            <td class="table__date"><?= date('d.m.y', $item->dt_add); ?></td>
            <?php $idStock = PackedStock::find()->where(['packed_id' => $item->id])->all();
            $stock = [];
            foreach($idStock as $k){
                $stock[] = $k->stock_id;
            }

            $stockInfo = Stock::find()->where(['id' => $stock])->all();?>

            <td class="table__product">
                <?php foreach($stockInfo as $value):

                    ?>
                    <div><?= $value->title; ?><a href="<?= $value->link; ?>" class="link table__link fa fa-link"></a><br><span><?= $value->number; ?></span></div>
                <?php endforeach; ?>
            </td>
            <td class="table__trackNumber"><?= $item->number; ?></td>
            <td class="table__weight">200 lb</td>
            <td class="table__price">$<?= $item->price; ?></td>
            <td class="table__info">
                <div class="address">
                    <strong>Address</strong>
                    <?php $address = \common\models\db\Address::find()->where(['id' => $item->address_id])->one(); ?>
                    <?= $address->first_name . ' ' . $address->last_name?>
                    <?= $address->country?>, <?= $address->city?>, <?= $address->address?>
            </div>
                <div class="comment">
                    <strong>Comment</strong>
            <?= $item->comment; ?>
            </div>
            </td>
        </tr>


        <?php endforeach; ?>

        </tbody>
    </table>
</div>