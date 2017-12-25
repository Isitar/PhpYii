<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "room".
 *
 * @property integer $id
 * @property integer $floor
 * @property integer $roomNumber
 * @property integer $hasConditioner
 * @property integer $hasTV
 * @property integer $hasPhone
 * @property string $availableFrom
 * @property string $pricePerDay
 * @property string $description
 *
 * @property Reservation[] $reservations
 */
class Room extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['floor', 'roomNumber', 'hasConditioner', 'hasTV', 'hasPhone', 'availableFrom'], 'required'],
            [['floor', 'roomNumber', 'hasConditioner', 'hasTV', 'hasPhone'], 'integer'],
            [['availableFrom'], 'safe'],
            [['pricePerDay'], 'number'],
            [['description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'floor' => 'Floor',
            'roomNumber' => 'Room Number',
            'hasConditioner' => 'Has Conditioner',
            'hasTV' => 'Has Tv',
            'hasPhone' => 'Has Phone',
            'availableFrom' => 'Available From',
            'pricePerDay' => 'Price Per Day',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {

        return $this->hasMany(Reservation::className(), ['room_id' => 'id']);
    }
}
