<fieldset>
    <label class="label label_block">Product information <input type="text" name="stock-title" value="<?= $model->title; ?>" class="input"></label>
    <label class="label label_size_xl">Product link <input type="text" name="stock-link" value="<?= $model->link; ?>" class="input"></label
    ><label class="label label_size_m">Price <input type="text" name="stock-price" value="<?= $model->price; ?>" class="input"></label>


    <input type="hidden" name="stock-id" value="<?= $model->id; ?>">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken?>" id="">

</fieldset>
<div class="ctrls"><button class="button editStockBtn">Confirm</button></div>