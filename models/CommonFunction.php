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
        return Beacon::find()->count();
    }

    public function getEquipmentNumber(){
        return Equipment::find()->count();
    }

    public function getLocationNumber(){
        return Location::find()->count();
    }
}