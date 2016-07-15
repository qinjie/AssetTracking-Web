<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Beacon;

/**
 * BeaconSearch represents the model behind the search form about `app\models\Beacon`.
 */
class BeaconSearch extends Beacon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'major', 'minor', 'locationId', 'equipmentId'], 'integer'],
            [['uuid', 'label', 'created', 'modified'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        if ($proj = ProjectUser::find()->where(['userId' => Yii::$app->user->id])->one()){
            $query = Beacon::find()->where(['projectId' => $proj['projectId']]);
        }
        else{
            $query = Beacon::find();
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'major' => $this->major,
            'minor' => $this->minor,
            'locationId' => $this->locationId,
            'equipmentId' => $this->equipmentId,
            'created' => $this->created,
            'modified' => $this->modified,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'label', $this->label]);

        return $dataProvider;
    }
}