<?php
declare(strict_types=1);


/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08.12.2017
 * Time: 18:31
 */

namespace app\controllers;

use app\models\News;

use Yii;
use yii\web\Controller;


class NewsController extends Controller
{

    /**
     * @return News[]
     */
    private function dataList(): array
    {
        return [
            new News(1, "First World War", new \DateTime("1914-07-28")),
            new News(2, "Second World War", new \DateTime("1939-09-01")),
            new News(3, "First man on the moon", new \DateTime("1969-07-20")),
        ];
    }

    public function actionIndex()
    {
        return $this->render('itemList', ['newList' => $this->dataList()]);
    }

    public function actionItemDetail(int $id)
    {
        $item = null;
        foreach ($this->dataList() as $it) {
            if ($id === $it->getId()) {
                $item = $it;
            }
        }
        return $this->render("itemDetail", ['item' => $item]);
    }


    public function actionAdvTest() {
        return $this->render('advTest');
    }

}