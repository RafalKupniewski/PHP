<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pracownik_all".
 *
 * @property integer $pracownik_id
 * @property string $imie
 * @property string $nazwisko
 * @property string $model
 * @property string $marka
 */
class PracownikAll extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pracownik_all';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pracownik_id'], 'integer'],
            [['imie'], 'string', 'max' => 20],
            [['nazwisko', 'model', 'marka'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pracownik_id' => 'Pracownik ID',
            'imie' => 'Imie',
            'nazwisko' => 'Nazwisko',
            'model' => 'Model',
            'marka' => 'Marka',
        ];
    }
}
