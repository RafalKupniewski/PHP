<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cel;

/**
 * CelSearch represents the model behind the search form about `app\models\Cel`.
 */
class CelSearch extends Cel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cel_id'], 'integer'],
            [['miasto'], 'safe'],
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
        $query = Cel::find();

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
            'cel_id' => $this->cel_id,
        ]);

        $query->andFilterWhere(['like', 'miasto', $this->miasto]);

        return $dataProvider;
    }
}
