<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Services;
use app\models\Banners;

class LanguageController extends Controller
{
    public $banners = [];
    public $services = [];

    public function beforeAction($event)
    {

        if (isset(Yii::$app->session['lang']))
        {
            Yii::$app->language = Yii::$app->session['lang'];
        }

        $this->banners = Banners::find()->where(['active' => 1])->orderby(['index_weight' => SORT_ASC])->all();
        $this->services = Services::find()->where(['active' => 1])->orderby(['index_weight' => SORT_ASC])->all();

        return parent::beforeAction($event);
    }

    public function actionLanguage()
    {
        Yii::$app->session['lang'] = Yii::$app->getRequest()->getQueryParam('lang');

        Yii::$app->response->redirect(Yii::$app->request->referrer);
    }
}
