<?php

namespace app\controllers;

use Yii;
use app\models\InsuranceImages;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InsuranceimagesController implements the CRUD actions for InsuranceImages model.
 */
class InsuranceimagesController extends Controller
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
     * Lists all InsuranceImages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $insuranceImages = InsuranceImages::find()->orderby(['index_weight' => SORT_ASC])->all();

        return $this->render('index', ["insuranceImages" => $insuranceImages]);
    }

    /**
     * Displays a single InsuranceImages model.
     * @param integer $id
     * @return mixed
     */
    /*public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new InsuranceImages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InsuranceImages();
        $model->scenario = InsuranceImages::SCENARIO_CREATE;

        if (isset($_FILES["InsuranceImages"]))
        {
            $fieldNameThList = ["th_image"];
            $fieldNameEnList = ["en_image"];

            $passValidate = true;
            $nameThList = [];
            $nameEnList = [];

            foreach ($fieldNameThList as $fieldName)
            {
                if ($_FILES["InsuranceImages"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["InsuranceImages"]["name"][$fieldName]);
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
                if ($_FILES["InsuranceImages"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["InsuranceImages"]["name"][$fieldName]);
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
                    copy($_FILES["InsuranceImages"]["tmp_name"][$keyName], InsuranceImages::IMAGE_PATH."th/".$name);
                    $_POST["InsuranceImages"][$keyName] = InsuranceImages::IMAGE_PATH."th/".$name;
                }
                foreach ($nameEnList as $keyName => $name)
                {
                    copy($_FILES["InsuranceImages"]["tmp_name"][$keyName], InsuranceImages::IMAGE_PATH."en/".$name);
                    $_POST["InsuranceImages"][$keyName] = InsuranceImages::IMAGE_PATH."en/".$name;
                }
            }
        }

        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InsuranceImages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = InsuranceImages::SCENARIO_UPDATE;

        if (isset($_FILES["InsuranceImages"]))
        {
            $fieldNameThList = ["th_image"];
            $fieldNameEnList = ["en_image"];

            foreach($fieldNameThList as $fieldName) 
            {
                $_POST["InsuranceImages"][$fieldName] = $model->$fieldName;
                
                if ($_FILES["InsuranceImages"]["name"][$fieldName] != "")
                {
                    copy($_FILES["InsuranceImages"]["tmp_name"][$fieldName], $model->$fieldName);
                }
            }

            foreach($fieldNameEnList as $fieldName)
            {
                $_POST["InsuranceImages"][$fieldName] = $model->$fieldName;

                if ($_FILES["InsuranceImages"]["name"][$fieldName] != "")
                {
                    copy($_FILES["InsuranceImages"]["tmp_name"][$fieldName], $model->$fieldName);
                }
            }
        }

        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing InsuranceImages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $fieldNameList = ["th_image","en_image"];

        foreach ($fieldNameList as $fieldName)
        {
            @unlink($model->$fieldName);
        }

        return $this->redirect(['index']);
    }

    public function actionUpdateorder()
    {
        if (isset($_POST["image_sort_list"]))
        {
            $orderList = explode(",", $_POST["image_sort_list"]);

            foreach ($orderList as $orderNumber => $objectId)
            {
                $insuranceObject = InsuranceImages::find()->where(["id"=>$objectId])->one();
                
                if ($insuranceObject)
                {
                    $insuranceObject->index_weight = $orderNumber;
                    $insuranceObject->save();                
                }
            }
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the InsuranceImages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InsuranceImages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InsuranceImages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
