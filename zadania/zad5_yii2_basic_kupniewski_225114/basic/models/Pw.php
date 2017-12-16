<?php

namespace app\models;

use Yii;
use app\models\Wyjazdy;
use app\models\WyjazdySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * This is the model class for table "pw".
 *
 * @property integer $pw_id
 * @property integer $pracownik_id
 * @property integer $cel_id
 * @property string $data
 *
 * @property CelKopia $cel
 * @property PracownikKopia $pracownik
 * @property Wyjazdy[] $wyjazdies
 */
class Pw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pracownik_id', 'cel_id', 'data'], 'required'],
            [['pracownik_id', 'cel_id'], 'integer'],
            [['data'], 'safe'],
            [['cel_id'], 'exist', 'skipOnError' => true, 'targetClass' => CelKopia::className(), 'targetAttribute' => ['cel_id' => 'cel_id']],
            [['pracownik_id'], 'exist', 'skipOnError' => true, 'targetClass' => PracownikKopia::className(), 'targetAttribute' => ['pracownik_id' => 'pracownik_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'pw_id' => 'Pw ID',
            //'pracownik_id' => 'Pracownik ID',
            //'cel_id' => 'Cel ID',

            'data' => 'Data',
            'imie' => 'Imie',
            'nazwisko' => 'Nazwisko',
            'miasto' => 'Miasto',
            'marka' => 'Marka',
            'model' => 'Model',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCel()
    {
        return $this->hasOne(CelKopia::className(), ['cel_id' => 'cel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPracownik()
    {
        return $this->hasOne(PracownikKopia::className(), ['pracownik_id' => 'pracownik_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWyjazdies()
    {
        return $this->hasMany(Wyjazdy::className(), ['pw_id' => 'pw_id']);
    }
}
