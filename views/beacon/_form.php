<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Beacon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beacon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uuid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'major')->textInput() ?>

    <?= $form->field($model, 'minor')->textInput() ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'locationId')->widget(Select2::className(), [
        'data' => $items1,
        'options' => ['placeholder' => 'Select a location ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'equipmentId')->widget(Select2::className(), [
        'data' => $items2,
        'options' => ['placeholder' => 'Select a equipment ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'created')->textInput()->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'modified')->textInput()->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
