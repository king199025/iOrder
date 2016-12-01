<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 28.10.2016
 * Time: 11:40
 */
?>

<tr>
    <td class="table__date"><?= date('d.m.Y', $model['dt_add']); ?></td>
    <td class="table__product"><?= $model['title']; ?>
        <?php
            $link = '';
            $rest = substr($model['link'], 0, 4);
            if($rest == 'http'){
                $link = $model['link'];
            }else{
                $link = 'http://' . $model['link'];
            }
        ?>
        <a href="<?= $link;  ?>" title="<?= $link; ?>" target="_blank" class="link table__link fa fa-link"></a>
    </td>
    <td class="table__trackNumber"><?= $model['track_number']; ?></td>
    <td class="table__price"><?= $model['price']; ?>$</td>
    <td class="table__action">
        <span data-id="<?= $model->id; ?>" title="Edit" data-csrf="<?= Yii::$app->request->csrfToken;?>" class="link link__waiting_edit fa fa-pencil"></span>
        <span data-id="<?= $model->id; ?>" title="Delete" data-csrf="<?= Yii::$app->request->csrfToken;?>" class="link link_delete fa fa-trash-o waiting_delete"></span>
    </td>
</tr>
