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
    <?php foreach ($rooms as $item) { ?>
        <tr>
            <td><?= $item['floor'] ?></td>
            <td><?= $item['roomNumber'] ?></td>
            <td><?= Yii::$app->formatter->asBoolean($item['hasConditioner']) ?></td>
            <td><?= Yii::$app->formatter->asBoolean($item['hasTV']) ?></td>
            <td><?= ($item['hasPhone'] == 1) ? 'Yes' : 'No' ?></td> <!-- to show, boolean formatter does the same -->
            <td><?= Yii::$app->formatter->asDate($item['availableFrom']) ?></td>
            <td><?= Yii::$app->formatter->asDate($item['availableFrom'], 'php:Y-m-d') ?></td>
            <td><?= Yii::$app->formatter->asCurrency($item['pricePerDay'], 'CHF') ?></td>
            <td><?= $item['description'] ?></td>
        </tr>
    <?php } ?>
</table>

<?php