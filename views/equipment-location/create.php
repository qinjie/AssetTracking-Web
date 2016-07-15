<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EquipmentLocation */

$this->title = 'Create Equipment Location';
$this->params['breadcrumbs'][] = ['label' => 'Equipment Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-location-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
