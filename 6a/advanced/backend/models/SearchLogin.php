<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Login;

/**
 * SearchLogin represents the model behind the search form about `backend\models\Login`.
 */
class SearchLogin extends Login
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_login', 'privilege'], 'integer'],
            [['login', 'passwd'], 'safe'],
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
        $query = Login::find();

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
            'id_login' => $this->id_login,
            'privilege' => $this->privilege,
        ]);

        $query->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'passwd', $this->passwd]);

        return $dataProvider;
    }
}
