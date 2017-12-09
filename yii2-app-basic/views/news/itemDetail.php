Detail item with title <b><?php echo $title ?></b>
<br/>
<br/>

<?php
/** @var \app\models\News $item  */
if ($item != null) {  ?>

    <table>
        <tr>
            <th>Id </th>
            <td><?php echo $item->getId() ?></td>
        </tr>
        <tr>
            <th>Title </th>
            <td><?php echo $item->getTitle() ?></td>
        </tr>
        <tr>
            <th>Category </th>
            <td><?php echo $item->getCategory() ?></td>
        </tr>
        <tr>
            <th>Date </th>
            <td><?php echo $item->getDate()->format('Y-m-d') ?></td>
        </tr>


    </table>
    <br/>
    Url for this item is <?php echo yii\helpers\Url::to(['news/item-detail','title' => $title]); ?>
<?php } else { ?>
    No item found
<?php } ?>


<!---->
<!---->
<!--<h2>News item detail</h2>-->
<!--<br />-->
<!--Id: --><?php //echo $item->getId(); ?>
<!--<br/>-->
<!--Title: --><?php //echo $item->getTitle(); ?>
<!--<br />-->
<!--Date: --><?php //echo $item->getDate()->format("Y-m-d"); ?>
<!---->
<?php //echo $this->context->renderPartial('_copyright');?>
