<?php

namespace app\controllers;

use Yii;
use app\models\Healths;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HealthsController implements the CRUD actions for Healths model.
 */
class HealthsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Healths models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Healths::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Healths model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Healths model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Healths();
        $model->scenario = Healths::SCENARIO_CREATE;

        if (isset($_FILES["Healths"]))
        {
            $fieldNameThList = ["th_image","th_thumb_image"];
            $fieldNameEnList = ["en_image","en_thumb_image"];

            $passValidate = true;
            $nameThList = [];
            $nameEnList = [];

            foreach ($fieldNameThList as $fieldName)
            {
                if ($_FILES["Healths"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["Healths"]["name"][$fieldName]);
                    if (count($nameExplode) > 1)
                    {
                        $nameThList[$fieldName] = uniqid().".".$nameExplode[1];
                    }
                    else 
                    {
                        $passValidate = false;
                        break;
                    }
                }
                else
                {
                    $passValidate = false;
                    break;
                }
            }

            foreach ($fieldNameEnList as $fieldName)
            {
                if ($_FILES["Healths"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["Healths"]["name"][$fieldName]);
                    if (count($nameExplode) > 1)
                    {
                        $nameEnList[$fieldName] = uniqid().".".$nameExplode[1];
                    }
                    else
                    {
                        $passValidate = false;
                        break;
                    }
                }
                else
                {
                    $passValidate = false;
                    break;
                }
            }

            if ($passValidate)
            {
                foreach ($nameThList as $keyName => $name)
                {
                    copy($_FILES["Healths"]["tmp_name"][$keyName], Healths::IMAGE_PATH."th/".$name);
                    $_POST["Healths"][$keyName] = Healths::IMAGE_PATH."th/".$name;
                }
                foreach ($nameEnList as $keyName => $name)
                {
                    copy($_FILES["Healths"]["tmp_name"][$keyName], Healths::IMAGE_PATH."en/".$name);
                    $_POST["Healths"][$keyName] = Healths::IMAGE_PATH."en/".$name;
                }
            }
        }

        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Healths model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Healths::SCENARIO_UPDATE;

        if (isset($_FILES["Healths"]))
        {
            $fieldNameThList = ["th_image","th_thumb_image"];
            $fieldNameEnList = ["en_image","en_thumb_image"];

            foreach($fieldNameThList as $fieldName) 
            {
                $_POST["Healths"][$fieldName] = $model->$fieldName;
                
                if ($_FILES["Healths"]["name"][$fieldName] != "")
                {
                    copy($_FILES["Healths"]["tmp_name"][$fieldName], $model->$fieldName);
                }
            }

            foreach($fieldNameEnList as $fieldName)
            {
                $_POST["Healths"][$fieldName] = $model->$fieldName;

                if ($_FILES["Healths"]["name"][$fieldName] != "")
                {
                    copy($_FILES["Healths"]["tmp_name"][$fieldName], $model->$fieldName);
                }
            }
        }

        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Healths model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $fieldNameList = ["th_image","en_image","th_thumb_image","en_thumb_image"];

        foreach ($fieldNameList as $fieldName)
        {
            unlink($model->$fieldName);
        }

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Healths model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Healths the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Healths::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
