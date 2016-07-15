<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

$this->title = 'Account';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-account">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Change Password', ['change-password'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email',
        ],
    ]) ?>

</div>
