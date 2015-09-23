<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property string $id
 * @property string $name
 * @property string $address
 * @property string $country
 * @property string $postal
 * @property string $latitude
 * @property string $longitude
 * @property string $created
 * @property string $modified
 *
 * @property Beacon[] $beacons
 * @property Equipmentlocation[] $equipmentlocations
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['latitude', 'longitude'], 'number'],
            [['created', 'modified'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 200],
            [['country'], 'string', 'max' => 50],
            [['postal'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'country' => 'Country',
            'postal' => 'Postal',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'created' => 'Created',
            'modified' => 'Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeacons()
    {
        return $this->hasMany(Beacon::className(), ['locationId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentlocations()
    {
        return $this->hasMany(Equipmentlocation::className(), ['locationId' => 'id']);
    }

    public function getFirstBeacon()
    {
        if ($this->beacons) {
            return $this->beacons[0];
        }
        return null;
    }
}
