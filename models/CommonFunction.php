<?php
/**
 * Created by PhpStorm.
 * User: zqi2
 * Date: 24/5/2015
 * Time: 6:20 PM
 */

namespace app\models;

use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

class CommonFunction extends Model
{
    public function getBeaconNumber(){
        if ($proj = ProjectUser::find()->where(['userId' => Yii::$app->user->id])->one()){
            return Beacon::find()->where(['projectId' => $proj['projectId']])->count();
        }
        return Beacon::find()->count();
    }

    public function getEquipmentNumber(){
        if ($proj = ProjectUser::find()->where(['userId' => Yii::$app->user->id])->one()){
            return Equipment::find()->where(['projectId' => $proj['projectId']])->count();
        }
        return Equipment::find()->count();
    }

    public function getLocationNumber(){
        if ($proj = ProjectUser::find()->where(['userId' => Yii::$app->user->id])->one()){
            return Location::find()->where(['projectId' => $proj['projectId']])->count();
        }
        return Location::find()->count();
    }
}