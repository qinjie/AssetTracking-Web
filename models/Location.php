<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

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
 * @property EquipmentLocation[] $equipmentLocations
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

    public function getBeaconCount()
    {
        return $this->getBeacons()->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentLocations()
    {
        return $this->hasMany(EquipmentLocation::className(), ['locationId' => 'id']);
    }

    public function getFirstBeacon()
    {
        if ($this->beacons) {
            return $this->beacons[0];
        }
        return null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipments()
    {
        return $this->hasMany(Equipment::className(), ['id' => 'equipmentId'])->via('equipmentLocations');
    }

    public function getLatestEquipments()
    {
        $sql = "SELECT e.*
            FROM equipmentlocation AS el1
            LEFT JOIN equipmentlocation AS el2
              ON (el1.equipmentId = el2.equipmentId AND el1.modified < el2.modified)
            LEFT JOIN equipment AS e
	       ON (el1.`equipmentId` = e.id)
              WHERE el2.`equipmentId` IS NULL AND el1.locationId = :locationId";

        $equipments = Equipment::findBySql($sql, ['locationId' => $this->id]);

        return $equipments;
    }

    public function getLatestEquipmentsCount()
    {
        return $this->getLatestEquipments()->count();
    }

    public function getFullAddress()
    {
        return $this->address . " " . $this->country . " " . $this->postal;
    }


    public function getBeaconNames()
    {
        $names = [];
        if ($this->getBeacons()->count() > 0) {
            $beacons = $this->getBeacons()->all();
            foreach ($beacons as $b) {
                $names[] = '(' . $b->id . ') ' . $b->label;
            }
            return join(",", $names);
        }
        return null;
    }

    public function getEquipmentNamesWithUrl()
    {
        $names = [];
        if ($this->getLatestEquipments()->count() > 0) {
            $eqs = $this->getLatestEquipments()->all();
            foreach ($eqs as $b) {
                $names[] = Html::a($b->name, ['/equipment/view', 'id' => $b->id]);
            }
            return join(", ", $names);
        }
        return null;
    }

    public function getBeaconNamesWithUrl()
    {
        $names = [];
        if ($this->getBeacons()->count() > 0) {
            $beacons = $this->getBeacons()->all();
            foreach ($beacons as $b) {
//                $names[] = '(' . $b->id . ') ' . $b->label;
                $names[] = Html::a($b->label, ['/beacon/view', 'id' => $b->id]);
            }
            return join(", ", $names);
        }
        return null;
    }
}
