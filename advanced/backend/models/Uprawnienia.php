<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "uprawnienia".
 *
 * @property string $konto_id
 * @property string $podkategoria_id
 *
 * @property Podkategoria $podkategoria
 * @property Konto $konto
 */
class Uprawnienia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uprawnienia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['konto_id', 'podkategoria_id'], 'string'],
            [['konto_id', 'podkategoria_id'], 'unique', 'targetAttribute' => ['konto_id', 'podkategoria_id'], 'message' => 'The combination of Konto ID and Podkategoria ID has already been taken.'],
            [['podkategoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Podkategoria::className(), 'targetAttribute' => ['podkategoria_id' => 'id']],
            [['konto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Konto::className(), 'targetAttribute' => ['konto_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'konto_id' => 'Konto ID',
            'podkategoria_id' => 'Podkategoria ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPodkategoria()
    {
        return $this->hasOne(Podkategoria::className(), ['id' => 'podkategoria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKonto()
    {
        return $this->hasOne(Konto::className(), ['id' => 'konto_id']);
    }
}
