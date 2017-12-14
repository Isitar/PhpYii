<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 14.12.2017
 * Time: 14:36
 */

namespace app\models;


use yii\base\Model;

class Room extends Model
{
    public $floor;
    public $roomNumber;
    public $hasConditioner;
    public $hasTV;

    public $hasPhone;
    public $availableFrom;
    public $pricePerDay;
    public $description;
    public $fileImage;


    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'floor' => 'Floor',
            'roomNumber' => 'Room number',
            'hasConditioner' => 'Condition available',
            'hasTV' => 'TV available',
            'hasPhone' => 'Phone availabe',
            'availableFrom' => 'Available from',
            'pricePerDay' => 'Price (CHF/day)',
            'description' => 'Description',
            'fileImage' => 'Image',
        ];
    }

    public function rules()
    {
        return [
            ['floor', 'integer', 'min' => 0],
            ['roomNumber', 'integer', 'min' => 0],
            [['hasConditioner', 'hasTV', 'hasPhone'], 'integer',
                'min' => 0, 'max' => 1],
            ['availableFrom', 'date', 'format' => 'php:Y-m-d'],
            ['pricePerDay', 'number', 'min' => 0],
            ['description', 'string', 'max' => 500],
            ['fileImage', 'image']
        ];
    }

    /**
     * @return bool
     */
    public function getHasPhone() : bool
    {
        return $this->hasPhone;
    }

    /**
     * @param bool $hasPhone
     */
    public function setHasPhone(bool $hasPhone)
    {
        $this->hasPhone = $hasPhone;
    }

}