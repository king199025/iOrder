<tbody>
<?php foreach($model as $item):?>
    <tr>
        <td class="table__product"><?= $item->title; ?></td>
        <td class="table__trackNumber"><?= $item->number; ?></td>
        <td class="table__price price__count"><?= $item->price; ?></td>
    </tr>
<?php endforeach; ?>
</tbody>