<?php

namespace app\api\models;

use Yii;

class Location extends \app\models\Location
{
    public function extraFields()
    {
        $new = ['beacon'];
        $fields = array_merge(parent::fields(), $new);
        return $fields;
    }
}
