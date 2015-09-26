<?php

namespace app\models;

use app\components\MyActiveRecord;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "equipment".
 *
 * @property string $id
 * @property string $name
 * @property string $department
 * @property string $remark
 * @property string $created
 * @property string $modified
 *
 * @property Beacon[] $beacons
 */
class Equipment extends MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created', 'modified'], 'safe'],
            [['name', 'department'], 'string', 'max' => 100],
            [['remark'], 'string', 'max' => 200]
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
            'department' => 'Department',
            'remark' => 'Remark',
            'created' => 'Created',
            'modified' => 'Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeacons()
    {
        return $this->hasMany(Beacon::className(), ['equipmentId' => 'id']);
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

    public function getBeaconNamesWithUrl()
    {
        $names = [];
        if ($this->getBeacons()->count() > 0) {
            $beacons = $this->getBeacons()->all();
            foreach ($beacons as $b) {
//                $names[] = '(' . $b->id . ') ' . $b->label;
                $names[] = Html::a($b->label, ['/beacon/view', 'id' => $b->id]);
            }
            return join(",", $names);
        }
        return null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentLocations()
    {
        return $this->hasMany(EquipmentLocation::className(), ['equipmentId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Location::className(), ['id' => 'locationId'])->via('equipmentLocations');
    }

    public function getUrlView()
    {
        return Url::to(['equipment/view', 'id' => $this->id]);
    }

    public function getLatestEquipmentLocation()
    {
        $sql = "SELECT el1.*
            FROM equipmentlocation AS el1
            LEFT JOIN equipmentlocation AS el2
              ON (el1.equipmentId = el2.equipmentId AND el1.modified < el2.modified)
            LEFT JOIN location AS l
	       ON (el1.`locationId` = l.id)
              WHERE el2.`equipmentId` IS NULL AND el1.equipmentId = :equipmentId";

        $el = Location::findBySql($sql, ['equipmentId' => $this->id])->one();

        return $el;
    }

    public function getLatestLocation()
    {
        $sql = "SELECT l.*
            FROM equipmentlocation AS el1
            LEFT JOIN equipmentlocation AS el2
              ON (el1.equipmentId = el2.equipmentId AND el1.modified < el2.modified)
            LEFT JOIN location AS l
	       ON (el1.`locationId` = l.id)
              WHERE el2.`equipmentId` IS NULL AND el1.equipmentId = :equipmentId";

        $location = Location::findBySql($sql, ['equipmentId' => $this->id]);

        return $location;
    }

    public function getLastSeen()
    {
        $el = $this->getLatestEquipmentLocation();
        if (!empty($el)) {
            return $el->modified;
        }
        return null;
    }

    public function getBeaconCount()
    {
        return sizeof($this->getBeacons());
    }
}
