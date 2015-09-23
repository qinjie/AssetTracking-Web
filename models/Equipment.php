<?php

namespace app\models;

use app\components\MyActiveRecord;
use Yii;
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

    public function getUrlView()
    {
        return Url::to(['equipment/view', 'id' => $this->id]);
    }
}
