<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 14.12.2017
 * Time: 14:45
 */

namespace app\controllers;

use app\models\Room;
use Yii;
use yii\db\mssql\PDO;
use yii\web\Controller;
use yii\web\UploadedFile;

class RoomsController extends Controller
{
    public function actionCreate() {

        /** @var Room $model */
        $model = new Room();

        /** @var bool $modelCanSave */
        $modelCanSave = ($model->load(Yii::$app->request->post()) && $model->validate());
        if ($modelCanSave) {
            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');

            if ($model->fileImage) {
                $model->fileImage->saveAs(Yii::getAlias('@uploadedfilesdir/' . $model->fileImage->baseName."." . $model->fileImage->extension));
            }
        }
        return $this->render('create', ['model' => $model, 'modelCanSave' => $modelCanSave]);

    }

    public function actionIndex() {
        $rooms = Room::find()->orderBy('id')->all();
//        $sql = 'SELECT * FROM room ORDER BY id ASC';
//        $db = Yii::$app->db;
//        $rooms = $db->createCommand($sql)->queryAll();

        return $this->render('index', ['rooms' => $rooms]);
    }

}