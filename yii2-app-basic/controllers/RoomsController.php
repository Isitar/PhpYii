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


}