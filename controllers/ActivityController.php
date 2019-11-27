<?php

namespace app\controllers;

use app\models\Activity;
use yii\web\Controller;

class ActivityController extends Controller
{
    public function actionIndex()
    {
        $model = new Activity();
        return $this->render('index', ['model' => $model]);
    }

    public function actionCreate()
    {
        $model = new \app\models\Activity();
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->startDay = time();
                $model->endDay = time() + (3600 * 24 * 10);
                return $this->render('index', ['model' => $model]);
            }
        }

        return $this->render('create', ['model' => $model]);

    }
}