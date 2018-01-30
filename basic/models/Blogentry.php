<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blogentry".
 *
 * @property int $id
 * @property int $viewed
 * @property string $title
 * @property string $preview
 * @property resource $body
 * @property int $user_id
 * @property string $date
 *
 * @property Users $user
 * @property Comment[] $comments
 */
class Blogentry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blogentry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['viewed', 'user_id'], 'integer'],
            [['body'], 'string'],
            [['date'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['preview'], 'string', 'max' => 200],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'viewed' => 'Viewed',
            'title' => 'Title',
            'preview' => 'Preview',
            'body' => 'Body',
            'user_id' => 'User ID',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['blogEntry_id' => 'id']);
    }

    public static function getRecent()
    {
        return static::find()->orderBy(['date' => SORT_DESC])->limit(3)->all();
    }

    public static function getPopular()
    {
        return static::find()->orderBy(['viewed' => SORT_DESC])->limit(3)->all();
    }

    public function increaseViewCount()
    {
        $this->viewed =+ 1;
        return $this->save(false);
    }

}
