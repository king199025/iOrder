<?php //\common\classes\Debug::prn($model); ?>
<fieldset>
    <label class="label label_block">Product information<input type="text" name="Waiting_title" data-msg="required" class="input valid3" required value="<?= $model->title; ?>"></label>
    <label class="label label_size_l">Product link<input type="text" name="Waiting_link" data-msg="required" value="<?= $model->link; ?>" class="input valid3" required></label
    ><label class="label label_size_l">Tracking number<input name="Waiting_track_number" data-msg="required" value="<?= $model->track_number; ?>" type="text" class="input valid3" required></label
    ><label class="label label_size_s">Price<input name="Waiting_price" value="<?= $model->price; ?>" type="text" data-tpl="number" data-msg="required input and numeric" class="input valid3" required></label>



    <input type="hidden" name="Waiting_id" value="<?= $model->id; ?>">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken?>" id="">
</fieldset>
<div class="ctrls"><button class="button btnEditWaiting" id="btnEditWaiting">Confirm</button></div>

