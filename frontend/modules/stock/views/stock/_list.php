<?php //\common\classes\Debug::prn($model); ?>

<tr>
    <td class="table__action">
        <label class="checkbox">
            <input type="checkbox" class="stockCheck" value="<?= $model['id'];?>">
            <span></span>
        </label></td>
    <td class="table__date"><?= date('d.m.Y', $model['dt_add'])?></td>
    <td class="table__product"><?= $model->title; ?><a href="<?= $model['link']; ?>" class="link table__link fa fa-link"></a></td>
    <td class="table__trackNumber"><?= $model['number']; ?></td>
    <td class="table__weight"><?= $model['weight']; ?></td>
    <td class="table__price"><?= $model['price']; ?></td>
    <td class="table__action">
        <span data-id="<?= $model['id'];?>" data-csrf="<?= Yii::$app->request->csrfToken;?>" class="link link__stock_edit fa fa-pencil"></span>
    </td>
</tr>