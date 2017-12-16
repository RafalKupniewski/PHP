<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pracownik;

/**
 * PracownikSearch represents the model behind the search form about `app\models\Pracownik`.
 */
class PracownikSearch extends Pracownik
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pracownik_id', 'auto_id'], 'integer'],
            [['imie', 'nazwisko'], 'safe'],
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
        $query = Pracownik::find();

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
            'pracownik_id' => $this->pracownik_id,
            'auto_id' => $this->auto_id,
        ]);

        $query->andFilterWhere(['like', 'imie', $this->imie])
            ->andFilterWhere(['like', 'nazwisko', $this->nazwisko]);

        return $dataProvider;
    }
}
