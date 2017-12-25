<?php

use yii\helpers\Url;

$operators = ['=', '<=', '>='];
$sf = $searchFilter;
?>

<form method="post" action="<?= Url::to(['rooms/index-filtered']); ?>">
    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>"/>
    <div class="row">
        <?php
        $operator = $sf['floor']['operator'];
        $value = $sf['floor']['value'];
        ?>


        <div class="col-md-3">
            <label>Floor</label> <br/>
            <select name="SearchFilter[floor][operator]">
                <?php foreach ($operators as $op) { ?>
                    <option value="<?= $op ?>"
                        <?= ($operator === $op) ? 'selected' : '' ?>
                    >
                        <?= $op ?>
                    </option>
                <?php } ?>
            </select>
            <input type="text" name="SearchFilter[floor][value]" value="<?= $value ?>"/>
        </div>

        <?php
        $operator = $sf['roomNumber']['operator'];
        $value = $sf['roomNumber']['value'];
        ?>
        <div class="col-md-3">
            <label>Room Number</label> <br/>
            <select name="SearchFilter[roomNumber][operator]">
                <?php foreach ($operators as $op) { ?>
                    <option value="<?= $op ?>"
                        <?= ($operator === $op) ? 'selected' : '' ?>
                    >
                        <?= $op ?>
                    </option>
                <?php } ?>
            </select>
            <input type="text" name="SearchFilter[roomNumber][value]" value="<?= $value ?>"/>
        </div>

        <?php
        $operator = $sf['pricePerDay']['operator'];
        $value = $sf['pricePerDay']['value'];
        ?>
        <div class="col-md-3">
            <label>Price per day</label> <br/>
            <select name="SearchFilter[pricePerDay][operator]">
                <?php foreach ($operators as $op) { ?>
                    <option value="<?= $op ?>"
                        <?= ($operator === $op) ? 'selected' : '' ?>
                    >
                        <?= $op ?>
                    </option>
                <?php } ?>
            </select>
            <input type="text" name="SearchFilter[pricePerDay][value]" value="<?= $value ?>"/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <input type="submit" value="filter" class="btn btn-primary" />
            <input type="submit" value="reset" class="btn btn-primary" />
        </div>
    </div>
</form>



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