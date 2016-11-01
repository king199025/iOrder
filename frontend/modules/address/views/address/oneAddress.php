<div class="choose-address__item">
    <label>
        <input type="radio" value="<?= $model->id; ?>" name="addres" class="radio"><span></span><?= $model->country?>, <?= $model->city?>, <?= $model->address?>, <?= $model->first_name . ' ' . $model->last_name?>
    </label>
    <span class="link fa fa-pencil"></span>
</div>