<?php

namespace app\api\models;

use Yii;

class Equipment extends \app\models\Equipment
{
    public function extraFields()
    {
        $new = ['beacon'];
        $fields = array_merge(parent::fields(), $new);
        return $fields;
    }
}
