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
            new News(1, "First World War", new \DateTime("1914-07-28"), "history"),
            new News(2, "Second World War", new \DateTime("1939-09-01"), "history"),
            new News(3, "First man on the moon", new \DateTime("1969-07-20"), "history"),
            new News(4, "News 2015-05-01", new \DateTime("2015-05-01"), "business"),
            new News(5, "News 2015-06-01", new \DateTime("2015-06-01"), "business"),
            new News(6, "News 2015-07-01", new \DateTime("2015-07-01"), "business"),
            new News(4, "News 2015-05-15", new \DateTime("2015-05-15"), "shopping"),
            new News(5, "News 2015-06-15", new \DateTime("2015-06-15"), "shopping"),
            new News(6, "News 2015-07-15", new \DateTime("2015-07-15"), "shopping"),
        ];
    }

    public function actionItemList()
    {
        $year = Yii::$app->request->get("year");
        $category = Yii::$app->request->get("category");

        $data = $this->dataList();
        $filteredData = [];
        foreach ($data as $d) {
            if ((($year != null) && ($d->getDate()->format('Y') === $year)) ||
                (($category != null) && ($category === $d->getCategory())) ||
                ($year == null && $category == null)) {
                $filteredData[] = $d;
            }
        }

        return $this->render('itemList', ['year' => $year, 'newList' => $filteredData, 'category' => $category]);
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionItemDetail()
    {
        $title = Yii::$app->request->get('title');

        $item = null;
        foreach ($this->dataList() as $it) {
            if ($title === $it->getTitle()) {
                $item = $it;
            }
        }
        return $this->render("itemDetail", ['title' => $title,'item' => $item]);

    }


    public function actionAdvTest()
    {
        return $this->render('advTest');
    }

    public function actionResponsiveContentTest()
    {
        $responsive = Yii::$app->request->get('responsive', false);
        if ($responsive) {
            $this->layout = 'responsive';
        } else {
            $this->layout = 'main';
        }

        return $this->render('responsiveContentTest', ['responsive' => $responsive]);
    }


    public function actionInternationalIndex() {
        $lang = Yii::$app->request->get('lang','en');
        Yii::$app->language = $lang;

        return $this->render('internationalIndex');
    }
}