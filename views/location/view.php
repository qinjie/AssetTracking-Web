<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Location */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-view">

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
            'address',
            'countryName',
            'postal',
            'latitude',
            'longitude',
            'created',
            'modified',
        ],
    ]) ?>

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
    <h3>Current Equipments</h3>
    <?= GridView::widget([
        'dataProvider' => new yii\data\ActiveDataProvider(['query' => $model->getLatestEquipments()]),
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'name',
            'department',
            'remark',
//            ['attribute' => 'latestLocation.name', 'label' => 'Last Location',
//                'format' => 'raw',
//                'value' => function ($data) {
//                    if($data->latestLocation)
//                        return Html::a($data->latestLocation->name, ['/location/view', 'id' => $data->latestLocation->id]);
//                    return null;
//                }],
//            ['attribute' => 'lastSeen', 'label' => 'Last Seen'],
////            'created',
//            // 'modified',
//
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
