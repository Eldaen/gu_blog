<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.11.2017
 * Time: 13:07
 */
namespace app\rbac;

use app\models\Blogentry;
use yii\helpers\Html;

class AuthorRule extends \yii\rbac\Rule
{
    public function execute($user, $item, $params)
    {
        return isset($params['id']) ?
            Blogentry::find()->where(['id' => HTML::encode($params['id'])])->one()->user_id == $user :
            false;
    }

}