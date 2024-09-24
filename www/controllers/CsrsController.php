<?php

namespace app\controllers;

use Yii;
use app\models\Csrs;
use app\models\CsrImages;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CsrsController implements the CRUD actions for Csrs model.
 */
class CsrsController extends Controller
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
     * Lists all Csrs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Csrs::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Csrs model.
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
     * Creates a new Csrs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Csrs();
        $model->scenario = Csrs::SCENARIO_CREATE;

        if (isset($_FILES["Csrs"]))
        {
            $fieldNameThList = ["th_panorama_image","th_thumb_image"];
            $fieldNameEnList = ["en_panorama_image","en_thumb_image"];

            $passValidate = true;
            $nameThList = [];
            $nameEnList = [];

            foreach ($fieldNameThList as $fieldName)
            {
                if ($_FILES["Csrs"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["Csrs"]["name"][$fieldName]);
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
                if ($_FILES["Csrs"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["Csrs"]["name"][$fieldName]);
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
                    copy($_FILES["Csrs"]["tmp_name"][$keyName], Csrs::IMAGE_PATH."th/".$name);
                    $_POST["Csrs"][$keyName] = Csrs::IMAGE_PATH."th/".$name;
                }
                foreach ($nameEnList as $keyName => $name)
                {
                    copy($_FILES["Csrs"]["tmp_name"][$keyName], Csrs::IMAGE_PATH."en/".$name);
                    $_POST["Csrs"][$keyName] = Csrs::IMAGE_PATH."en/".$name;
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
     * Updates an existing Csrs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Csrs::SCENARIO_UPDATE;

        if (isset($_FILES["Csrs"]))
        {
            $fieldNameThList = ["th_panorama_image","th_thumb_image"];
            $fieldNameEnList = ["en_panorama_image","en_thumb_image"];

            foreach($fieldNameThList as $fieldName) 
            {
                $_POST["Csrs"][$fieldName] = $model->$fieldName;
                
                if ($_FILES["Csrs"]["name"][$fieldName] != "")
                {
                    copy($_FILES["Csrs"]["tmp_name"][$fieldName], $model->$fieldName);
                }
            }

            foreach($fieldNameEnList as $fieldName)
            {
                $_POST["Csrs"][$fieldName] = $model->$fieldName;

                if ($_FILES["Csrs"]["name"][$fieldName] != "")
                {
                    copy($_FILES["Csrs"]["tmp_name"][$fieldName], $model->$fieldName);
                }
            }
        }

        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            $csrImages = CsrImages::find()->where(['csr_id' => $model->id])->orderby(['index_weight'=> SORT_ASC])->all();

            return $this->render('update', [
                'model' => $model,
                'csrImages' => $csrImages,
            ]);
        }
    }

    /**
     * Deletes an existing Csrs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $fieldNameList = ["th_panorama_image","en_panorama_image","th_thumb_image","en_thumb_image"];

        foreach ($fieldNameList as $fieldName)
        {
            @unlink($model->$fieldName);
        }

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Csrs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Csrs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Csrs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
