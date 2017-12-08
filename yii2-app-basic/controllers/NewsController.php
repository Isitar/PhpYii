<?php declare(strict_types=1);

// Page 28 
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08.12.2017
 * Time: 18:31
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;


class NewsController extends Controller
{

    private function dataList(): array
    {
        return [
            ["title" => "First World War", "date" => "1914-07-28"],
            ["title" => "Second World War", "date" => "1939-09-01"],
            ["title" => "First man on the moon", "date" => "1969-07-20"]
        ];
    }

    public function actionIndex()
    {
        return $this->render('itemList', ['newList' => $this->dataList()]);
    }

    public function actionItemDetail($title)
    {
        $item = null;
        foreach ($this->dataList() as $it) {
            if (
                $title === $it["title"]) {
                $item = $it;
            }
        }
        return $this->render("itemDetail", ['item' => $item]);
    }


}