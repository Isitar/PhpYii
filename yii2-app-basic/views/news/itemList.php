
<table>
    <tr>
        <th>Title</th>
        <th>Date</th>
        <th>link</th>
    </tr>
    <?php
    foreach ($newList
             as $item) {
        ?>
        <tr>
            <td><?php echo $item["title"] ?>        </td>
            <td><?php echo $item["date"] ?>            </td>
            <td><a href="<?php echo Yii::$app->urlManager->createUrl(["news/item-detail", "title" => $item["title"]]) ?>" >link</a> </td>
        </tr>
    <?php } ?>

</table>