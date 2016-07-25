<?php

namespace app\models;

use app\components\MyActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "beacon".
 *
 * @property string $id
 * @property string $projectId
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
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                // Modify only created not updated attribute
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created', 'modified'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['modified'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

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
            [['uuid', 'major', 'minor', 'projectId'], 'required'],
            [['major', 'minor', 'equipmentId', 'locationId', 'projectId'], 'integer'],
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
            'projectId' => 'Project ID',
            'uuid' => 'UUID',
            'major' => 'Major',
            'minor' => 'Minor',
            'label' => 'Label',
            'equipmentId' => 'Equipment',
            'locationId' => 'Location',
            'equipmentName' => 'Equipment',
            'locationName' => 'Location',
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

    public function getLocationName(){
        $query = Location::find()->select(['name'])->where(['id' => $this->locationId])->one();
        return $query['name'];
    }

    public function getEquipmentName(){
        $query = Equipment::find()->select(['name'])->where(['id' => $this->equipmentId])->one();
        return $query['name'];
    }
}
