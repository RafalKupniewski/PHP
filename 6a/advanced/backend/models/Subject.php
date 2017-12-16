<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Subject".
 *
 * @property integer $id_subject
 * @property string $topic
 * @property string $owner
 *
 * @property Result[] $results
 * @property Login $owner0
 * @property Res[] $res
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topic', 'owner'], 'string'],
            [['owner'], 'exist', 'skipOnError' => true, 'targetClass' => Login::className(), 'targetAttribute' => ['owner' => 'id_login']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_subject' => 'Id Subject',
            'topic' => 'Topic',
            'owner' => 'Owner',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResults()
    {
        return $this->hasMany(Result::className(), ['id_subject' => 'id_subject']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner0()
    {
        return $this->hasOne(Login::className(), ['id_login' => 'owner']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRes()
    {
        return $this->hasMany(Res::className(), ['id_sub' => 'id_subject']);
    }
}
