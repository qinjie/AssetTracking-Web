<?php

namespace app\api\models;

use Yii;

class Beacon extends \app\models\Beacon
{
    public function extraFields()
    {
        $new = ['location', 'equipment'];
        $fields = array_merge(parent::fields(), $new);
        return $fields;
    }
}
