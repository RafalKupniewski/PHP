<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Word".
 *
 * @property integer $id_word
 * @property string $word
 * @property string $id_subject
 *
 * @property Subject $idSubject
 */
class Word extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Word';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_subject'], 'string'],
            [['word'], 'string', 'max' => 255],
            [['id_subject'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['id_subject' => 'id_subject']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_word' => 'Id Word',
            'word' => 'Word',
            'id_subject' => 'Id Subject',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSubject()
    {
        return $this->hasOne(Subject::className(), ['id_subject' => 'id_subject']);
    }
}
