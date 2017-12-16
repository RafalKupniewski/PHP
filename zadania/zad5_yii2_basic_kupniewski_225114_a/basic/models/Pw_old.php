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
 *
 * @property Cel $cel
 * @property Pracownik $pracownik
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


            [['pracownik_id', 'cel_id'], 'required'],
            [['pracownik_id', 'cel_id'], 'integer'],
            [['cel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cel::className(), 'targetAttribute' => ['cel_id' => 'cel_id']],
            [['pracownik_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pracownik::className(), 'targetAttribute' => ['pracownik_id' => 'pracownik_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'data' => 'Data',
            'imie' => 'Imie',
            'nazwisko' => 'Nazwisko',
            'miasto' => 'Miasto',
            'marka' => 'Marka',
            'model' => 'Model',
            //'pw_id' => 'Pw ID',
            //'pracownik_id' => 'Pracownik ID',
            //'cel_id' => 'Cel ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCel()
    {
        return $this->hasOne(Cel::className(), ['cel_id' => 'cel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPracownik()
    {
        return $this->hasOne(Pracownik::className(), ['pracownik_id' => 'pracownik_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWyjazdy()
    {
        return $this->hasMany(Wyjazdy::className(), ['pw_id' => 'pw_id']);
    }
    /**
    *@return \yii\db\ActiveQuery
    */

   public function getData()
   {
       return $this->hasMany(Wyjazdy::className(), ['data' => 'data']);
   }

}
