<?php

namespace app\controllers;

use Yii;
use app\models\Packages;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PackagesController implements the CRUD actions for Packages model.
 */
class PackagesController extends Controller
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
     * Lists all Packages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Packages::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Packages model.
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
     * Creates a new Packages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Packages();
        $model->scenario = Packages::SCENARIO_CREATE;

        if (isset($_FILES["Packages"]))
        {
            $fieldNameThList = ["th_image","th_thumb_image"];
            $fieldNameEnList = ["en_image","en_thumb_image"];

            $passValidate = true;
            $nameThList = [];
            $nameEnList = [];

            foreach ($fieldNameThList as $fieldName)
            {
                if ($_FILES["Packages"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["Packages"]["name"][$fieldName]);
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
                if ($_FILES["Packages"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["Packages"]["name"][$fieldName]);
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
                    copy($_FILES["Packages"]["tmp_name"][$keyName], Packages::IMAGE_PATH."th/".$name);
                    $_POST["Packages"][$keyName] = Packages::IMAGE_PATH."th/".$name;
                }
                foreach ($nameEnList as $keyName => $name)
                {
                    copy($_FILES["Packages"]["tmp_name"][$keyName], Packages::IMAGE_PATH."en/".$name);
                    $_POST["Packages"][$keyName] = Packages::IMAGE_PATH."en/".$name;
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
     * Updates an existing Packages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Packages::SCENARIO_UPDATE;

        if (isset($_FILES["Packages"]))
        {
            $fieldNameThList = ["th_image","th_thumb_image"];
            $fieldNameEnList = ["en_image","en_thumb_image"];

            foreach($fieldNameThList as $fieldName) 
            {
                $_POST["Packages"][$fieldName] = $model->$fieldName;
                
                if ($_FILES["Packages"]["name"][$fieldName] != "")
                {
                    copy($_FILES["Packages"]["tmp_name"][$fieldName], $model->$fieldName);
                }
            }

            foreach($fieldNameEnList as $fieldName)
            {
                $_POST["Packages"][$fieldName] = $model->$fieldName;

                if ($_FILES["Packages"]["name"][$fieldName] != "")
                {
                    copy($_FILES["Packages"]["tmp_name"][$fieldName], $model->$fieldName);
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
     * Deletes an existing Packages model.
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
     * Finds the Packages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Packages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Packages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
