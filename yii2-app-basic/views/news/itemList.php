
<table>
    <tr>
        <th>Title</th>
        <th>Date</th>
        <th>link</th>
    </tr>
    <?php
    foreach ($newList as $item) {
        ?>
        <tr>
            <td><?php echo $item->getTitle()?>        </td>
            <td><?php echo $item->getDate()->format("Y-m-d") ?>            </td>
            <td><a href="<?php echo Yii::$app->urlManager->createUrl(["news/item-detail", "id" => $item->getId()]) ?>" >link</a> </td>
        </tr>
    <?php } ?>

</table>

<?php echo $this->context->renderPartial('_copyright');?>