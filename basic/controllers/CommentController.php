<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01.02.2018
 * Time: 14:12
 */

namespace app\controllers;


use app\models\CommentForm;
use Yii;
use yii\web\Controller;

class CommentController extends Controller
{
    public function actionCreate($id)
    {
        $model = new CommentForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('comment', 'Ваш комментарий добавлен');
                return $this->redirect(['blog/article','id'=>$id]);
            }
        }
    }
}