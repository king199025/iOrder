<table class="table table__stock">
    <thead class="table__thead">
    <tr>
        <td class="table__action"><label class="checkbox"><input type="checkbox"><span></span></label></td>
        <td class="table__date">Data</td>
        <td class="table__product">Product</td>
        <td class="table__trackNumber">Track Number</td>
        <td class="table__weight">Weight</td>
        <td class="table__price">Price</td>
        <td class="table__action"></td>
    </tr>
    </thead>
    <tbody class="table__tbody">
    <?= \yii\widgets\ListView::widget(
        [
            'dataProvider' => $dataProvider,
            'itemView' => '_list',

            'layout' => "{items}",
        ]
    )?>
    </tbody>
</table>