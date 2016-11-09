<fieldset>
    <label class="label label_block">Product information <input type="text" data-msg="requared input" name="stock-title" value="<?= $model->title; ?>" class="input valid4" required></label>
    <label class="label label_size_xl">Product link <input type="text" data-msg="requared input" name="stock-link" value="<?= $model->link; ?>" class="input valid4" required></label
    ><label class="label label_size_m">Price <input data-tpl="number" data-msg="requared input and numeric" type="text" name="stock-price" value="<?= $model->price; ?>" class="input valid4" required></label>


    <input type="hidden" name="stock-id" value="<?= $model->id; ?>">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken?>" id="">

</fieldset>
<div class="ctrls"><button class="button editStockBtn" id="editStockBtn">Confirm</button></div>