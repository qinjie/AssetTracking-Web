<?php
/* @var $this yii\web\View */
use app\components\Util;
use app\models\Project;
use yii\helpers\Html;

$this->title = 'Asset Tracking';
?>
<div class="site-index">
    <div class="body-content" align="center" >
        <?= Html::img(Util::getFileUrl('system_diagram_small.png'), ['alt' => 'some', 'class' => 'thing']); ?>
    </div>
</div>
