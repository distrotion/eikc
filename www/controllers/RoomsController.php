<?php

namespace app\controllers;

use Yii;
use app\models\Rooms;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoomsController implements the CRUD actions for Rooms model.
 */
class RoomsController extends Controller
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
     * Lists all Rooms models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Rooms::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rooms model.
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
     * Creates a new Rooms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rooms();
        $model->scenario = Rooms::SCENARIO_CREATE;

        if (isset($_FILES["Rooms"]))
        {
            $fieldNameThList = ["th_image","th_panorama_image","th_thumb_image"];
            $fieldNameEnList = ["en_image","en_panorama_image","en_thumb_image"];

            $passValidate = true;
            $nameThList = [];
            $nameEnList = [];

            foreach ($fieldNameThList as $fieldName)
            {
                if ($_FILES["Rooms"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["Rooms"]["name"][$fieldName]);
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
                if ($_FILES["Rooms"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["Rooms"]["name"][$fieldName]);
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
                    copy($_FILES["Rooms"]["tmp_name"][$keyName], Rooms::IMAGE_PATH."th/".$name);
                    $_POST["Rooms"][$keyName] = Rooms::IMAGE_PATH."th/".$name;
                }
                foreach ($nameEnList as $keyName => $name)
                {
                    copy($_FILES["Rooms"]["tmp_name"][$keyName], Rooms::IMAGE_PATH."en/".$name);
                    $_POST["Rooms"][$keyName] = Rooms::IMAGE_PATH."en/".$name;
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
     * Updates an existing Rooms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Rooms::SCENARIO_UPDATE;

        if (isset($_FILES["Rooms"]))
        {
            $fieldNameThList = ["th_image","th_panorama_image","th_thumb_image"];
            $fieldNameEnList = ["en_image","en_panorama_image","en_thumb_image"];

            foreach($fieldNameThList as $fieldName) 
            {
                $_POST["Rooms"][$fieldName] = $model->$fieldName;
                
                if ($_FILES["Rooms"]["name"][$fieldName] != "")
                {
                    copy($_FILES["Rooms"]["tmp_name"][$fieldName], $model->$fieldName);
                }
            }

            foreach($fieldNameEnList as $fieldName)
            {
                $_POST["Rooms"][$fieldName] = $model->$fieldName;

                if ($_FILES["Rooms"]["name"][$fieldName] != "")
                {
                    copy($_FILES["Rooms"]["tmp_name"][$fieldName], $model->$fieldName);
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
     * Deletes an existing Rooms model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $fieldNameList = ["th_image","en_image","th_panorama_image","en_panorama_image","th_thumb_image","en_thumb_image"];

        foreach ($fieldNameList as $fieldName)
        {
            unlink($model->$fieldName);
        }

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rooms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rooms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rooms::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
