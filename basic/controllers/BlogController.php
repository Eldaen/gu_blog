<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25.01.2018
 * Time: 16:22
 */

namespace app\controllers;


use app\models\Blogentry;
use app\models\Comment;
use app\models\CommentForm;
use yii\web\Controller;

class BlogController extends Controller
{
    public function actionIndex()
    {
        //TODO: список статей
    }


    public function actionArticle($id)
    {
        //TODO: собрать в один метод модели
        $article = BlogEntry::findOne(['id' => $id]);
        $recent = BlogEntry::getRecent();
        $popular = BlogEntry::getPopular();

        $comments = Comment::findAll(['article_id' => $id]);
        $commentForm = new CommentForm();
        $article->increaseViewCount();

        return $this->render('article',
            [
                'article' => $article,
                'comments' => $comments,
                'commentForm' => $commentForm,
                'recent' => $recent,
                'popular' => $popular
            ]);
    }
}