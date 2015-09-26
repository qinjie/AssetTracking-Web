<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Location', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
//            'address',
//            'country',
//            'postal',
            ['attribute' => 'fullAddress', 'label' => 'Address'],
//            ['attribute' => 'beaconCount', 'label' => 'Beacons',
//                'value' => function ($data) {
//                    if($data->beaconCount>0)
//                        return $data->beaconCount;
//                    return null;
//                }],
            ['attribute' => 'beaconNamesWithUrl', 'label' => 'Beacons', 'format' => 'raw',],
            ['attribute' => 'equipmentNamesWithUrl', 'label' => 'Equipments', 'format' => 'raw',],
//            ['attribute' => 'latestEquipmentsCount', 'label' => 'Equipments'],
//            'firstBeacon.label',
            // 'latitude',
            // 'longitude',
            // 'created',
            // 'modified',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
