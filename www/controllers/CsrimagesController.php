<?php

namespace app\controllers;

use Yii;
use app\models\CsrImages;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CsrimagesController implements the CRUD actions for CsrImages model.
 */
class CsrimagesController extends Controller
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
     * Lists all CsrImages models.
     * @return mixed
     */
    /*public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CsrImages::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }*/

    /**
     * Displays a single CsrImages model.
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
     * Creates a new CsrImages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($csr_id)
    {
        $model = new CsrImages();
        $model->scenario = CsrImages::SCENARIO_CREATE;
        $model->csr_id = $csr_id;

        if (isset($_FILES["CsrImages"]))
        {
            $fieldNameThList = ["th_image"];
            $fieldNameEnList = ["en_image"];

            $passValidate = true;
            $nameThList = [];
            $nameEnList = [];

            foreach ($fieldNameThList as $fieldName)
            {
                if ($_FILES["CsrImages"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["CsrImages"]["name"][$fieldName]);
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
                if ($_FILES["CsrImages"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["CsrImages"]["name"][$fieldName]);
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
                    copy($_FILES["CsrImages"]["tmp_name"][$keyName], CsrImages::IMAGE_PATH."th/".$name);
                    $_POST["CsrImages"][$keyName] = CsrImages::IMAGE_PATH."th/".$name;
                }
                foreach ($nameEnList as $keyName => $name)
                {
                    copy($_FILES["CsrImages"]["tmp_name"][$keyName], CsrImages::IMAGE_PATH."en/".$name);
                    $_POST["CsrImages"][$keyName] = CsrImages::IMAGE_PATH."en/".$name;
                }
            }
        }

        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(['csrs/update', 'id' => $model->csr_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CsrImages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = CsrImages::SCENARIO_UPDATE;

        if (isset($_FILES["CsrImages"]))
        {
            $fieldNameThList = ["th_image"];
            $fieldNameEnList = ["en_image"];

            foreach($fieldNameThList as $fieldName) 
            {
                $_POST["CsrImages"][$fieldName] = $model->$fieldName;
                
                if ($_FILES["CsrImages"]["name"][$fieldName] != "")
                {
                    copy($_FILES["CsrImages"]["tmp_name"][$fieldName], $model->$fieldName);
                }
            }

            foreach($fieldNameEnList as $fieldName)
            {
                $_POST["CsrImages"][$fieldName] = $model->$fieldName;

                if ($_FILES["CsrImages"]["name"][$fieldName] != "")
                {
                    copy($_FILES["CsrImages"]["tmp_name"][$fieldName], $model->$fieldName);
                }
            }
        }

        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(['csrs/update', 'id' => $model->csr_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CsrImages model.
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

        $model->delete();
    }


    public function actionUpdateorder($csr_id)
    {
        if (isset($_POST["image_sort_list"]))
        {
            $orderList = explode(",", $_POST["image_sort_list"]);

            foreach ($orderList as $orderNumber => $objectId)
            {
                $csrObject = CsrImages::find()->where(["id"=>$objectId])->one();
                
                if ($csrObject)
                {
                    $csrObject->index_weight = $orderNumber;
                    $csrObject->save();                
                }
            }
        }

        return $this->redirect(['csrs/update', 'id' => $csr_id]);
    }

    /**
     * Finds the CsrImages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CsrImages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CsrImages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
