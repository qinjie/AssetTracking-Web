<?php
/**
 * Created by PhpStorm.
 * User: qj
 * Date: 29/3/15
 * Time: 17:58
 */

namespace app\api\modules\v1\controllers;


use app\api\components\MyActiveController;
use app\api\models\Beacon;
use app\api\models\Equipment;
use app\api\models\Location;
use app\api\models\EquipmentLocation;
use Yii;
use yii\base\InvalidCallException;
use yii\filters\AccessControl;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\NotFoundHttpException;

class BeaconController extends MyActiveController
{

    public $modelClass = 'app\api\models\Beacon';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator']['except'] = ['index', 'view', 'search',
            'check-nearby-beacons', 'assign-to-equipment', 'assign-to-location'];

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => ['view', 'index', 'search',
                        'check-nearby-beacons', 'assign-to-equipment', 'assign-to-location'],
                    'allow' => true,
                    'roles' => ['?'],
                ],
                [
                    'actions' => ['create', 'delete', 'update'],
                    'allow' => true,
                    'roles' => ['user',],
                ],
            ],
            # if user not login, and not allowed for current action, return following exception
            'denyCallback' => function ($rule, $action) {
                throw new \Exception('You are not allowed to access this page');
            },
        ];

        return $behaviors;
    }

    //-- pass in a locationId which does not exists to clear it
    public function actionAssignToLocation($id, $locationId)
    {
        if (!Beacon::find()->where(['id' => $id])->exists()) {
            throw new NotFoundHttpException('Beacon not found: ' . $id);
        }
        $count = 0;
        if (Location::find()->where(['id' => $locationId])->exists()) {
            $count = Beacon::updateAll(['locationId' => $locationId, 'equipmentId' => null], ['id' => $id]);
        } else {
            $count = Beacon::updateAll(['locationId' => null, 'equipmentId' => null], ['id' => $id]);
        }
        return ['count' => $count];
    }

    //-- pass in a equipmentId which does not exists to clear it
    public function actionAssignToEquipment($id, $equipmentId)
    {
        if (!Beacon::find()->where(['id' => $id])->exists()) {
            throw new NotFoundHttpException('Beacon not found: ' . $id);
        }
        $count = 0;
        if (Equipment::find()->where(['id' => $equipmentId])->exists()) {
            $count = Beacon::updateAll(['locationId' => null, 'equipmentId' => $equipmentId], ['id' => $id]);
        } else {
            $count = Beacon::updateAll(['locationId' => null, 'equipmentId' => null], ['id' => $id]);
        }
        return ['count' => $count];
    }

    //-- Receive a list of beacons, separate into lists of registered locations & equipments.
    //-- Action = POST. Sample data
//    {
//        "beacons":[
//            {"uuid":"B9407F30-F5F8-466E-AFF9-25556B57FE6D", "major":"43564", "minor":"20594"},
//            {"uuid":"B9407F30-F5F8-466E-AFF9-25556B57FE6A", "major":"43561", "minor":"20591"},
//            {"uuid":"B9407F30-F5F8-466E-AFF9-25556B57FE6B", "major":"43562", "minor":"20592"},
//            {"uuid":"B9407F30-F5F8-466E-AFF9-25556B57FE6C", "major":"43563", "minor":"20593"},
//            {"uuid":"B9407F30-F5F8-466E-AFF9-25556B57FE6E", "major":"43565", "minor":"20595"}
//        ]
//    }
    public function actionCheckNearbyBeacons()
    {
        if (!\Yii::$app->request->isPost) {
            throw new InvalidCallException("Only POST action is allowed", 400);
        }

        $POST_KEY_BEACONS = 'beacons';
        $beacons = \yii::$app->request->post($POST_KEY_BEACONS);

        $locations = [];
        $equipments = [];
        $unassigns = [];
        $unknowns = [];
        // Identify
        foreach ($beacons as $bs) {
            $beacon = Beacon::findOne(['uuid' => $bs['uuid'], 'major' => $bs['major'], 'minor' => $bs['minor']]);
            if ($beacon) {
                \Yii::info($beacon, __METHOD__);
                if ($beacon->location) {
                    $locations[] = $beacon->location;
                } elseif ($beacon->equipment) {
                    $equipments[] = $beacon->equipment;
                } else {
                    $unassigns[] = $beacon;
                }
            } else {
                $unknowns[] = $bs;
            }
        }

        //-- update location of equipments
        if (!empty($locations)) {
            $loc = $locations[0];
            foreach ($equipments as $eq) {
                $el = EquipmentLocation::findOne(['locationId' => $loc->id, 'equipmentId' => $eq->id, 'recordDate' => date('Y-m-d')]);
                if (!$el) {
                    $el = new EquipmentLocation();
                    $el->equipmentId = $eq->id;
                    $el->locationId = $loc->id;
                    $el->recordDate = date('Y-m-d');
                    $el->count = 0;
                }
                $el->count = $el->count + 1;
                $el->save();
            }
        }

        return ['locations' => $locations, 'equipments' => $equipments, 'unassigned' => $unassigns, 'unknowns' => $unknowns];
    }
}