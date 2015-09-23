<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipmentlocation".
 *
 * @property string $id
 * @property string $equipmentId
 * @property string $locationId
 * @property string $latitude
 * @property string $longitude
 * @property string $created
 * @property string $modified
 *
 * @property Equipment $equipment
 * @property Location $location
 */
class EquipmentLocation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipmentlocation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['equipmentId'], 'required'],
            [['equipmentId', 'locationId'], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['created', 'modified'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'equipmentId' => 'Equipment ID',
            'locationId' => 'Location ID',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'created' => 'Created',
            'modified' => 'Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(Equipment::className(), ['id' => 'equipmentId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'locationId']);
    }
}