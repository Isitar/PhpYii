<table class="table">
    <tr>
        <th>Floor</th>
        <th>Room number</th>
        <th>Has conditioner</th>
        <th>Has tv</th>
        <th>Has phone</th>
        <th>Available from</th>
        <th>Available from (db format)</th>
        <th>Price per day</th>
        <th>Description</th>
    </tr>
    <?php /** @var \app\models\Room[] $rooms */
    /** @var \app\models\Room $item */
    foreach ($rooms as $arrItem) {
        $item =  (object)$arrItem;
        ?>
        <tr>
            <td><?= $item->floor ?></td>
            <td><?= $item->roomNumber ?></td>
            <td><?= Yii::$app->formatter->asBoolean($item->hasConditioner) ?></td>
            <td><?= Yii::$app->formatter->asBoolean($item->hasTV) ?></td>
            <td><?= ($item->getHasPhone()) ? 'Yes' : 'No' ?></td><!-- to show format asboolean is the same-->
            <td><?= $item->getHasPhone() ?></td><!-- to show format asboolean is the same-->
            <td><?= Yii::$app->formatter->asDate($item->availableFrom) ?></td>
            <td><?= Yii::$app->formatter->asDate($item->availableFrom, 'php:Y-m-d') ?></td>
            <td><?= Yii::$app->formatter->asCurrency($item->pricePerDay, 'CHf') ?></td>
            <td><?= $item->description ?></td>
        </tr>
    <?php } ?>
</table>