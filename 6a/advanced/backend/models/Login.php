<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Login".
 *
 * @property integer $id_login
 * @property string $login
 * @property string $passwd
 * @property integer $privilege
 *
 * @property Result[] $results
 * @property Subject[] $subjects
 */
class Login extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Login';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'passwd', 'privilege'], 'required'],
            [['privilege'], 'integer'],
            [['login', 'passwd'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_login' => 'Id Login',
            'login' => 'Login',
            'passwd' => 'Passwd',
            'privilege' => 'Privilege',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResults()
    {
        return $this->hasMany(Result::className(), ['id_login' => 'id_login']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subject::className(), ['owner' => 'id_login']);
    }
}
