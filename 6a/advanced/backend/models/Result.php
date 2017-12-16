<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Result".
 *
 * @property integer $id_result
 * @property integer $score
 * @property integer $privilege
 * @property string $id_login
 * @property string $id_subject
 *
 * @property Subject $idSubject
 * @property Login $idLogin
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['score', 'privilege'], 'integer'],
            [['id_login', 'id_subject'], 'string'],
            [['id_subject'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['id_subject' => 'id_subject']],
            [['id_login'], 'exist', 'skipOnError' => true, 'targetClass' => Login::className(), 'targetAttribute' => ['id_login' => 'id_login']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_result' => 'Id Result',
            'score' => 'Score',
            'privilege' => 'Privilege',
            'id_login' => 'Id Login',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLogin()
    {
        return $this->hasOne(Login::className(), ['id_login' => 'id_login']);
    }
}
