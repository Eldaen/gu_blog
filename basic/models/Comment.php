<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $user_id
 * @property string $text
 * @property int $blogEntry_id
 * @property string $date
 *
 * @property Blogentry $blogEntry
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'blogEntry_id'], 'integer'],
            [['date'], 'safe'],
            [['text'], 'string', 'max' => 255],
            [['blogEntry_id'], 'exist', 'skipOnError' => true, 'targetClass' => Blogentry::className(), 'targetAttribute' => ['blogEntry_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'text' => 'Text',
            'blogEntry_id' => 'Blog Entry ID',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogEntry()
    {
        return $this->hasOne(Blogentry::className(), ['id' => 'blogEntry_id']);
    }
}
