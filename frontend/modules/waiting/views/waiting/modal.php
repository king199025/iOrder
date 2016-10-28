<?php //\common\classes\Debug::prn($model); ?>
<fieldset>
    <label class="label label_block">Product information<input type="text" name="Waiting_title" class="input" value="<?= $model->title; ?>"></label>
    <label class="label label_size_l">Product link<input type="text" name="Waiting_link" value="<?= $model->link; ?>" class="input"></label
    ><label class="label label_size_l">Tracking number<input name="Waiting_track_number" value="<?= $model->track_number; ?>" type="text" class="input"></label
    ><label class="label label_size_s">Price<input name="Waiting_price" value="<?= $model->price; ?>" type="text" class="input"></label>

    <input type="hidden" name="Waiting_id" value="<?= $model->id; ?>">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken?>" id="">
</fieldset>
<div class="ctrls"><button class="button btnEditWaiting">Confirm</button></div>

