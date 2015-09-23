<?php

namespace app\models;

use app\components\MyActiveRecord;
use Yii;

/**
 * This is the model class for table "beacon".
 *
 * @property string $id
 * @property string $uuid
 * @property integer $major
 * @property integer $minor
 * @property string $label
 * @property string $equipmentId
 * @property string $locationId
 * @property string $created
 * @property string $modified
 *
 * @property Equipment $equipment
 * @property Location $location
 */
class Beacon extends MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'beacon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uuid', 'major', 'minor'], 'required'],
            [['major', 'minor', 'equipmentId', 'locationId'], 'integer'],
            [['created', 'modified'], 'safe'],
            [['uuid'], 'string', 'max' => 36],
            [['label'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uuid' => 'Uuid',
            'major' => 'Major',
            'minor' => 'Minor',
            'label' => 'Label',
            'equipmentId' => 'Equipment ID',
            'locationId' => 'Location ID',
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
