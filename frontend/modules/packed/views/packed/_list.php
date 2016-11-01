<?php

use common\models\db\Stock;

$idStock = $model['idStock'];
$idStock = explode(',', $idStock);
$k = array_pop($idStock);

$stock = Stock::find()->where(['id' => $idStock])->all();

 ?>

<tr>
    <td class="table__action"><label class="checkbox"><input type="checkbox"><span></span></label></td>
    <td class="table__date"><?= date('d.m.Y', $model['dt_add']); ?></td>
    <td class="table__product">
        <?php foreach($stock as $item): ?>
            <div><?= $item->title; ?><a href="<?= $item->link; ?>" class="link table__link fa fa-link"></a><br><span><?= $item->number;?></span></div>
        <?php endforeach; ?>

    </td>
    <td class="table__trackNumber"><?= $model['number'];?></td>
    <td class="table__weight">200 lb</td>
    <td class="table__price">$<?= $model->price; ?></td>
    <td class="table__info">
        <div class="address">
            <strong>Address</strong>
            <?= $model['address']->first_name . ' ' . $model['address']->last_name?>
            <?= $model['address']->country?>, <?= $model['address']->city?>, <?= $model['address']->address?>
            <!--Razgulin Vitalii
            Str. Dacia 89, ap 11
            Chisinau City
            Republic of Moldova-->
        </div>
        <div class="comment">
            <strong>Comment</strong>
            <?= $model['comment']; ?>
        </div>
    </td>
</tr>