<?php

namespace app\controllers;

use app\models\BeaconSearch;
use app\models\Equipment;
use app\models\Location;
use app\models\ProjectUser;
use Yii;
use app\models\Beacon;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BeaconController implements the CRUD actions for Beacon model.
 */
class BeaconController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Beacon models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BeaconSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Beacon model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Beacon model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Beacon();
        $items1 = ArrayHelper::map(Location::find()->orderBy('name')->all(), 'id', 'name');
        $items2 = ArrayHelper::map(Equipment::find()->orderBy('name')->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post())) {
            $query = ProjectUser::find()->where(['userId' => Yii::$app->user->id])->one();
            $model->projectId = $query['projectId'];
            if ($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'items1' => $items1,
                'items2' => $items2,
            ]);
        }
    }

    /**
     * Updates an existing Beacon model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $items1 = ArrayHelper::map(Location::find()->orderBy('name')->all(), 'id', 'name');
        $items2 = ArrayHelper::map(Equipment::find()->orderBy('name')->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'items1' => $items1,
                'items2' => $items2,
            ]);
        }
    }

    /**
     * Deletes an existing Beacon model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Beacon model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Beacon the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Beacon::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
