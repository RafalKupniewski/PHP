<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "auto".
 *
 * @property integer $auto_id
 * @property string $marka
 * @property string $model
 *
 * @property Pracownik[] $pracowniks
 * @property PracownikKopia[] $pracownikKopias
 */
class Auto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marka', 'model'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'auto_id' => 'Auto ID',
            'marka' => 'Marka',
            'model' => 'Model',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPracowniks()
    {
        return $this->hasMany(Pracownik::className(), ['auto_id' => 'auto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPracownikKopias()
    {
        return $this->hasMany(PracownikKopia::className(), ['auto_id' => 'auto_id']);
    }
}
