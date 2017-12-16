<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pw;

/**
 * PwSearch represents the model behind the search form about `app\models\Pw`.
 */
class PwSearch extends Pw
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pw_id', 'pracownik_id', 'cel_id'], 'integer'],
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
        $query = Pw::find();

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
            'pw_id' => $this->pw_id,
            'pracownik_id' => $this->pracownik_id,
            'cel_id' => $this->cel_id,
        ]);

        return $dataProvider;
    }
}
