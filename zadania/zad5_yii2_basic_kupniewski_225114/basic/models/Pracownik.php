<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pracownik".
 *
 * @property integer $pracownik_id
 * @property string $imie
 * @property string $nazwisko
 * @property integer $auto_id
 *
 * @property Auto $auto
 * @property Pw[] $pws
 */
class Pracownik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pracownik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imie', 'nazwisko'], 'required'],
            [['auto_id'], 'integer'],
            [['imie'], 'string', 'max' => 20],
            [['nazwisko'], 'string', 'max' => 45],
            [['auto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Auto::className(), 'targetAttribute' => ['auto_id' => 'auto_id']],
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
            'auto_id' => 'Auto ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuto()
    {
        return $this->hasOne(Auto::className(), ['auto_id' => 'auto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPws()
    {
        return $this->hasMany(Pw::className(), ['pracownik_id' => 'pracownik_id']);
    }
}
