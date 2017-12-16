<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Result;

/**
 * SearchResult represents the model behind the search form about `backend\models\Result`.
 */
class SearchResult extends Result
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_result', 'score', 'privilege'], 'integer'],
            [['id_login', 'id_subject'], 'safe'],
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
        $query = Result::find();

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
            'id_result' => $this->id_result,
            'score' => $this->score,
            'privilege' => $this->privilege,
        ]);

        $query->andFilterWhere(['like', 'id_login', $this->id_login])
            ->andFilterWhere(['like', 'id_subject', $this->id_subject]);

        return $dataProvider;
    }
}
