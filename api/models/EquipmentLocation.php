<?php

namespace app\api\models;

use Yii;

class EquipmentLocation extends \app\models\EquipmentLocation
{
    public function extraFields()
    {
        $new = ['equipment', 'location'];
        $fields = array_merge(parent::fields(), $new);
        return $fields;
    }
}
