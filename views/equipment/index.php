<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Equipment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'department',
//            'remark',
            ['attribute' => 'beaconNamesWithUrl', 'label' => 'Beacons', 'format' => 'raw',],
            ['attribute' => 'latestLocation.name', 'label' => 'Last Location',
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->latestLocation)
                        return Html::a($data->latestLocation->name, ['/location/view', 'id' => $data->latestLocation->id]);
                    return null;
                }],
            ['attribute' => 'lastSeen', 'label' => 'Last Seen'],
//            'created',
            // 'modified',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
