<?php
namespace app\controllers;

use app\models\Activity;
use yii\web\Controller;

class ActivityController extends Controller
{
    public function actionIndex() {
        $model = new Activity();
        return $this->render('index', ['model' => $model]);
    }

    public function actionCreate()
    {

    }

}