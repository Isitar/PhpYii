<?php if ($year != null) { ?>
    <b>List for year <?php echo $year ?></b>
<?php } ?>
<?php if ($category != null) { ?>
    <b>List for category <?php echo $category ?></b>
<?php } ?>

    <table>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Category</th>
            <th>link</th>
        </tr>
        <?php
        /** @var \app\models\News $item */
        foreach ($newList as $item) {
            ?>
            <tr>
                <td><?php echo $item->getTitle() ?> </td>
                <td><?php echo $item->getDate()->format("Y-m-d") ?> </td>
                <td><?php echo $item->getCategory() ?> </td>
                <td>
                    <a href="<?php echo Yii::$app->urlManager->createUrl(["news/item-detail", "id" => $item->getId()]) ?>">link</a>
                </td>
            </tr>
        <?php } ?>

    </table>

<?php echo $this->context->renderPartial('_copyright'); ?>