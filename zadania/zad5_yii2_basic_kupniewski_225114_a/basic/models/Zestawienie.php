<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zestawienie".
 *
 * @property integer $id
 * @property string $imie
 * @property string $nazwisko
 * @property string $model
 * @property string $marka
 * @property string $data
 * @property string $miasto
 */
class Zestawienie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zestawienie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['data'], 'safe'],
            [['imie'], 'string', 'max' => 20],
            [['nazwisko', 'model', 'marka', 'miasto'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imie' => 'Imie',
            'nazwisko' => 'Nazwisko',
            'model' => 'Model',
            'marka' => 'Marka',
            'data' => 'Data',
            'miasto' => 'Miasto',
        ];
    }
}
