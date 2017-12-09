

<h2>News item detail</h2>
<br />
Id: <?php echo $item->getId(); ?>
<br/>
Title: <?php echo $item->getTitle(); ?>
<br />
Date: <?php echo $item->getDate()->format("Y-m-d"); ?>

<?php echo $this->context->renderPartial('_copyright');?>
