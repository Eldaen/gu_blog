<?php
namespace app\models;
use Yii;
use yii\base\Model;


class CommentForm extends Model
{
    public $comment;
    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'length' => [3,300]]
        ];
    }
    public function saveComment($article_id)
    {
        $comment = new Comment;
        $comment->text = $this->comment;
        $comment->user_id = Yii::$app->user->id;
        $comment->blogEntry_id = $article_id;
        $comment->date = date('Y-m-d H:i:s');
        return $comment->save();
    }
}