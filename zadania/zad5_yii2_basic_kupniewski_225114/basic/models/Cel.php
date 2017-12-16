<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cel".
 *
 * @property integer $cel_id
 * @property string $miasto
 *
 * @property Pw[] $pws
 */
class Cel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['miasto'], 'string'],
            [['miasto'], 'unique'],
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
