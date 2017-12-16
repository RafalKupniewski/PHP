<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wyjazdy".
 *
 * @property integer $id
 * @property integer $pw_id
 * @property string $data
 *
 * @property Pw $pw
 */
class Wyjazdy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wyjazdy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pw_id', 'data'], 'required'],
            [['pw_id'], 'integer'],
            [['data'], 'safe'],
            [['pw_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pw::className(), 'targetAttribute' => ['pw_id' => 'pw_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pw_id' => 'Pw ID',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPw()
    {
        return $this->hasOne(Pw::className(), ['pw_id' => 'pw_id']);
    }
}
