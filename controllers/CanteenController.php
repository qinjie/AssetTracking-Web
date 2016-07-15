<?php
/**
 * Created by PhpStorm.
 * User: zqi2
 * Date: 9/6/2015
 * Time: 5:16 PM
 */

namespace app\controllers;


use app\models\Floor;
use app\models\Project;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class CanteenController extends Controller
{

    public function actionIndex()
    {
        $projectId = \Yii::$app->params['project.id.canteen'];
        $project = Project::findOne($projectId);
        $dataProvider = new ActiveDataProvider([
            'query' => Floor::find()->where(['projectId' => $projectId, 'status' => 1]),
        ]);

        return $this->render('index', [
            'project' => $project,
            'dataProvider' => $dataProvider,
        ]);
    }

}