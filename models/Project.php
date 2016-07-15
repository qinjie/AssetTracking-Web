<?php

namespace app\models;

use app\components\MyActiveRecord;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $label
 * @property string $remark
 * @property string $serial
 * @property integer $status
 * @property string $created
 * @property string $modified
 *
 * @property Beacon[] $beacns
 * @property Equipment[] $equipments
 * @property Location[] $locations
 * @property User $owner
 * @property ProjectUser[] $projectusers
 */
class Project extends MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }


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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['created', 'modified'], 'safe'],
            [['label'], 'string', 'max' => 100],
            [['remark'], 'string', 'max' => 200],
            [['serial'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'remark' => 'Remark',
            'serial' => 'Serial',
            'status' => 'Status',
            'created' => 'Created',
            'modified' => 'Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeacons()
    {
        return $this->hasMany(Beacon::className(), ['projectId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectUsers()
    {
        return $this->hasMany(ProjectUser::className(), ['projectId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'userId'])->via('projectUsers');
    }


}
