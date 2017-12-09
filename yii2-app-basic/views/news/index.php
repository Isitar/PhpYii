<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09.12.2017
 * Time: 23:27
 */
use yii\helpers\Url;
use yii\helpers\Html;
?>

<b>Filter data by year:</b>
<br />
<ul>
    <?php $currentYear = date('Y'); ?></php>
    <?php for ($year=$currentYear; $year>($currentYear-5);$year--) { ?>
        <li><?php  echo Html::a("List items by year $year",Url::to(['news/item-list','year'=>$year])); ?></li>
    <?php } ?>
</ul>
<br />
<br />
<b>Filter data by category:</b>
<br />
<ul>
    <?php $categories = ['business', 'shopping'] ?></php>
    <?php foreach ($categories as $category) { ?>
        <li><?php  echo Html::a("List items by category $category",Url::to(['news/item-list','category'=>$category])); ?></li>
    <?php } ?>
</ul>
