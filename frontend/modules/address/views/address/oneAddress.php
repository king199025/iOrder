<div class="choose-address__item" id="address<?= $model->id; ?>">
    <label>
        <input type="radio" value="<?= $model->id; ?>" name="addres" class="radio"><span></span><span><?= $model->country?>, <?= $model->city?>, <?= $model->address?>, <?= $model->first_name . ' ' . $model->last_name?></span>
    </label>
    <span data-csrf="<?= Yii::$app->request->csrfToken?>" data-id="<?= $model->id; ?>" class="link fa fa-pencil editAddress"></span>
</div>