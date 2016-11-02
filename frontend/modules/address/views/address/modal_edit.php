<?php
/**
 * @var $model common\models\db\Address
 */
?>

<fieldset>
    <div>
        <label class="label label_size_l">First name <input type="text" name="first_name" value="<?= $model->first_name; ?>" class="input"></label
        ><label class="label label_size_l">Last name <input type="text" name="last_name" value="<?= $model->last_name; ?>" class="input"></label>
    </div>
    <label class="label label_block">Address <input type="text" value="<?= $model->address; ?>" name="address" class="input"></label>
    <div>
        <label class="label label_size_l">City <input type="text" name="city" value="<?= $model->city; ?>" class="input"></label
        ><label class="label label_size_l">Zip code <input type="text" name="zip_code" value="<?= $model->zip_code; ?>" class="input"></label
        ><label class="label label_size_l">Country <input type="text" name="country" value="<?= $model->country; ?>" class="input"></label
        ><label class="label label_size_l">Telefon number <input type="text" name="phone" value="<?= $model->phone; ?>" class="input"></label>
    </div>
</fieldset>

<input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken?>" id="">
<input type="hidden" name="id" value="<?= $model->id; ?>" id="">

<div class="ctrls"><button class="button editAddressBtn">Confirm</button></div>