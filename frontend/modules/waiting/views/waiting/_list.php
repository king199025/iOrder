<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 28.10.2016
 * Time: 11:40
 */
?>

<tr>
    <td class="table__date"><?= date('d.m.Y', $model['dt_update']); ?></td>
    <td class="table__product"><?= $model['title']; ?><a href="<?= $model['link']; ?>" class="link table__link fa fa-link"></a></td>
    <td class="table__trackNumber"><?= $model['track_number']; ?></td>
    <td class="table__price"><?= $model['price']; ?></td>
    <td class="table__action">
        <span data-id="<?= $model->id; ?>" data-csrf="<?= Yii::$app->request->csrfToken;?>" class="link link__waiting_edit fa fa-pencil"></span>
        <span data-id="<?= $model->id; ?>" data-csrf="<?= Yii::$app->request->csrfToken;?>" class="link link_delete fa fa-trash-o"></span>
    </td>
</tr>
