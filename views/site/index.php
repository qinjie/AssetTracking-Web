<?php
/* @var $this yii\web\View
 */
use app\components\Util;
use app\models\Project;
use yii\helpers\Html;

$this->title = 'Asset Tracking';
?>

<div class="site-index">
    <div class="body-content" >
        <div style="margin-top:50px; margin-left:50px;" align="center">
            <?= Html::img(Util::getFileUrl('system_diagram_small.png'), ['alt' => 'some', 'class' => 'thing']); ?>
        </div>
        <br>
        <h2><font color="#00BCD4">Quick Report</font></h2>
        <div class="row" style="margin-top:10px;">
            <a href="beacon">
                <div class="col-lg-4 col-xs-12" align="center">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3><?php echo $beaconNumber; ?></h3>
                            <p>Beacons</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="equipment">
                <div class="col-lg-4 col-xs-12" align="center">
                    <div class="small-box bg-aqua-active">
                        <div class="inner">
                            <h3><?php echo $equipmentNumber; ?></h3>
                            <p>Equipments</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="location">
                <div class="col-lg-4 col-xs-12" align="center">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $locationNumber; ?></h3>
                            <p>Locations</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
