<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'department',
            'remark',
            'created',
            'modified',
        ],
    ]) ?>
    <br>
    <h3>Current Location</h3>
    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider(['query' => $model->getLatestLocation()]),
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'name',
//            'address',
//            'country',
//            'postal',
            ['attribute' => 'fullAddress', 'label' => 'Address'],
//            ['attribute' => 'beaconCount', 'label' => 'Beacons'],
//            ['attribute' => 'latestEquipmentsCount', 'label' => 'Equipments'],
//            'firstBeacon.label',
            // 'latitude',
            // 'longitude',
            // 'created',
            // 'modified',
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <br>
    <h3>Beacons</h3>
    <?= GridView::widget([
        'dataProvider' => new yii\data\ActiveDataProvider(['query' => $model->getBeacons()]),
        'summary' => "",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'label',
            'uuid',
            'major',
            'minor',
//             'created',
//             'modified',
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <br>
    <h3>Past Locations</h3>
    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider(['query' => $model->getEquipmentLocations()]),
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'recordDate',
            'location.name',
            ['attribute' => 'location.fullAddress', 'label' => 'Address'],
        ],
    ]); ?>
</div>
