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

        $behaviors['authenticator']['except'] = ['index', 'view', 'search', 'assign-to-equipment', 'assign-to-location'];

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => ['view', 'index', 'search', 'assign-to-equipment', 'assign-to-location'],
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
        }else{
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
        }else{
            $count = Beacon::updateAll(['locationId' => null, 'equipmentId' => null], ['id' => $id]);
        }
        return ['count' => $count];
    }
}