<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cel_kopia".
 *
 * @property integer $cel_id
 * @property string $miasto
 *
 * @property Pw[] $pws
 */
class CelKopia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cel_kopia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['miasto'], 'required'],
            [['miasto'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cel_id' => 'Cel ID',
            'miasto' => 'Miasto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPws()
    {
        return $this->hasMany(Pw::className(), ['cel_id' => 'cel_id']);
    }
}
