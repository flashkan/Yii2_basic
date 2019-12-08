<?php

namespace app\controllers;



use yii\helpers\Url;

class AdminController extends \yii\web\Controller
{

    public function actionIndex()
    {
        if (\Yii::$app->user->can('admin')) {
            return $this->render('index');
        } else \Yii::$app->response->redirect(Url::to('/web/'));
    }

}
