<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beacons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beacon-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Beacon', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'uuid',
            'major',
            'minor',
            'label',
//            'equipmentId',
//            'locationId',
            ['attribute' => 'equipment.name', 'label' => 'Equipment', 'format' => 'raw',
                'value' => function ($data) {
                    if($data->equipment)
                        return Html::a($data->equipment->name, ['/equipment/view', 'id' => $data->equipmentId]);
                    return null;
                }],
            ['attribute' => 'location.name', 'label' => 'Location', 'format' => 'raw',
                'value' => function ($data) {
                    if($data->location)
                        return Html::a($data->location->name, ['/location/view', 'id' => $data->locationId]);
                    return null;
                }],
            // 'created',
            // 'modified',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
