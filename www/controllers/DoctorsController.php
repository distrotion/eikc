<?php

namespace app\controllers;

use app\models\DoctorDescription;
use app\models\DoctorsSearch;
use Yii;
use app\models\Doctors;
use app\models\Services;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;
use yii\widgets\ActiveForm;
/**
 * DoctorsController implements the CRUD actions for Doctors model.
 */
class DoctorsController extends Controller
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
     * Lists all Doctors models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DoctorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Doctors model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $doctorDescriptions = DoctorDescription::find()->where(['doctorId' => $id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'doctorDescriptions' => $doctorDescriptions,
        ]);
    }

    /**
     * Creates a new Doctors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Doctors();
        $model->scenario = Doctors::SCENARIO_CREATE;
        $doctorDescription = new DoctorDescription();

        if (isset($_FILES["Doctors"]))
        {
            $fieldNameThList = ["th_image"];
            $fieldNameEnList = ["en_image"];
            $fieldNameThSchedule = ["image_schedule_th"];
            $fieldNameEnSchedule = ["image_schedule_en"];

            $passValidate = true;
            $nameThList = [];
            $nameEnList = [];
            $nameThSchedule = [];
            $nameEnSchedule = [];

            foreach ($fieldNameThList as $fieldName)
            {
                if ($_FILES["Doctors"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["Doctors"]["name"][$fieldName]);
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
                if ($_FILES["Doctors"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["Doctors"]["name"][$fieldName]);
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

            foreach ($fieldNameThSchedule as $fieldName)
            {
                if ($_FILES["Doctors"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["Doctors"]["name"][$fieldName]);
                    if (count($nameExplode) > 1)
                    {
                        $nameThSchedule[$fieldName] = uniqid().".".$nameExplode[1];
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

            foreach ($fieldNameEnSchedule as $fieldName)
            {
                if ($_FILES["Doctors"]["name"][$fieldName] != "")
                {
                    $nameExplode = explode(".", $_FILES["Doctors"]["name"][$fieldName]);
                    if (count($nameExplode) > 1)
                    {
                        $nameEnSchedule[$fieldName] = uniqid().".".$nameExplode[1];
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
                    copy($_FILES["Doctors"]["tmp_name"][$keyName], Doctors::IMAGE_PATH."th/".$name);
                    $_POST["Doctors"][$keyName] = Doctors::IMAGE_PATH."th/".$name;
                }
                foreach ($nameEnList as $keyName => $name)
                {
                    copy($_FILES["Doctors"]["tmp_name"][$keyName], Doctors::IMAGE_PATH."en/".$name);
                    $_POST["Doctors"][$keyName] = Doctors::IMAGE_PATH."en/".$name;
                }
                foreach ($nameThSchedule as $keyName => $name)
                {
                    copy($_FILES["Doctors"]["tmp_name"][$keyName], Doctors::IMAGE_PATH."th/".$name);
                    $_POST["Doctors"][$keyName] = Doctors::IMAGE_PATH."th/".$name;
                }
                foreach ($nameEnSchedule as $keyName => $name)
                {
                    copy($_FILES["Doctors"]["tmp_name"][$keyName], Doctors::IMAGE_PATH."en/".$name);
                    $_POST["Doctors"][$keyName] = Doctors::IMAGE_PATH."en/".$name;
                }
            }
        }
        if ($model->load($_POST) && $model->save()) {
            $informations = isset(Yii::$app->request->post('DoctorDescription')["information"]) ? Yii::$app->request->post('DoctorDescription')["information"] : null;
            $trainning = isset(Yii::$app->request->post('DoctorDescription')["trainning"]) ? Yii::$app->request->post('DoctorDescription')["trainning"] : null;
            foreach ($informations as $key => $information) {
                $doctorDescription = new DoctorDescription();
                $doctorDescription->doctorId = $model->id;
                $doctorDescription->information_year_th = isset($information['information_year_th']) ? $information['information_year_th'] : '';
                $doctorDescription->information_th = isset($information['information_th']) ? $information['information_th'] : '';
                $doctorDescription->information_year_en = isset($information['information_year_en']) ? $information['information_year_en'] : '';
                $doctorDescription->information_en = isset($information['information_en']) ? $information['information_en'] : '';
                $doctorDescription->specialized_training_year_th = isset($trainning[$key]['specialized_training_year_th']) ? $trainning[$key]['specialized_training_year_th'] : '';
                $doctorDescription->specialized_training_th = isset($trainning[$key]['specialized_training_th']) ? $trainning[$key]['specialized_training_th'] : '';
                $doctorDescription->specialized_training_year_en = isset($trainning[$key]['specialized_training_year_en']) ? $trainning[$key]['specialized_training_year_en'] : '';
                $doctorDescription->specialized_training_en = isset($trainning[$key]['specialized_training_en']) ? $trainning[$key]['specialized_training_en'] : '';
                $doctorDescription->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $servicesObj = Services::find()->where(['active' => 1])->orderby(['index_weight' => SORT_ASC])->all();
            $services = [];
            foreach ($servicesObj as $service)
            {
                $services[$service->id] = $service->th_title;
            }
            return $this->render('create', [
                'model' => $model,
                'services' => $services,
                'doctorDescription' => $doctorDescription,
            ]);
        }
    }

    /**
     * Updates an existing Doctors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Doctors::SCENARIO_UPDATE;
        $doctorDescriptions = DoctorDescription::find()->where(['doctorId' => $id])->all();
        $doctorDescription = new DoctorDescription();
        $information = [];
        $trainning = [];
        foreach ($doctorDescriptions as $key => $doctorDescriptionObj) {
            $information[$key]['information_year_th'] = $doctorDescriptionObj->information_year_th;
            $information[$key]['information_th'] = $doctorDescriptionObj->information_th;
            $information[$key]['information_year_en'] = $doctorDescriptionObj->information_year_en;
            $information[$key]['information_en'] = $doctorDescriptionObj->information_en;
            $trainning[$key]['specialized_training_year_th'] = $doctorDescriptionObj->specialized_training_year_th;
            $trainning[$key]['specialized_training_th'] = $doctorDescriptionObj->specialized_training_th;
            $trainning[$key]['specialized_training_year_en'] = $doctorDescriptionObj->specialized_training_year_en;
            $trainning[$key]['specialized_training_en'] = $doctorDescriptionObj->specialized_training_en;
        }
        $doctorDescription->information = $information;
        $doctorDescription->trainning = $trainning;

        if (isset($_FILES["Doctors"]))
        {
            $fieldNameThList = ["th_image"];
            $fieldNameEnList = ["en_image"];
            $fieldNameThSchedule = ["image_schedule_th"];
            $fieldNameEnSchedule = ["image_schedule_en"];

            foreach($fieldNameThList as $fieldName) 
            {
                $_POST["Doctors"][$fieldName] = $model->$fieldName;

                if ($_FILES["Doctors"]["name"][$fieldName] != "")
                {
                    $time = time();
                    if($model->$fieldName) {
                        $nameExplode = explode(".", $_FILES["Doctors"]["name"][$fieldName]);
                        if (count($nameExplode) > 1) {
                            $name = uniqid() . "." . $nameExplode[1];
                            copy($_FILES["Doctors"]["tmp_name"][$fieldName], Doctors::IMAGE_PATH . "th/" . $name);
                            $_POST["Doctors"][$fieldName] = Doctors::IMAGE_PATH . "th/" . $name;
                        }
                    }else {
                        $nameExplode = explode(".", $_FILES["Doctors"]["name"][$fieldName]);
                        if (count($nameExplode) > 1) {
                            $name = uniqid() . "." . $nameExplode[1];
                            copy($_FILES["Doctors"]["tmp_name"][$fieldName], Doctors::IMAGE_PATH . "th/" . $name);
                            $_POST["Doctors"][$fieldName] = Doctors::IMAGE_PATH . "th/" . $name;
                        }
                    }
                }
            }

            foreach($fieldNameEnList as $fieldName)
            {
                $_POST["Doctors"][$fieldName] = $model->$fieldName;

                if ($_FILES["Doctors"]["name"][$fieldName] != "")
                {
                    $time = time();
                    if($model->$fieldName) {
                        $nameExplode = explode(".", $_FILES["Doctors"]["name"][$fieldName]);
                        if (count($nameExplode) > 1) {
                            $name = uniqid() . "." . $nameExplode[1];
                            copy($_FILES["Doctors"]["tmp_name"][$fieldName], Doctors::IMAGE_PATH . "th/" . $name);
                            $_POST["Doctors"][$fieldName] = Doctors::IMAGE_PATH . "th/" . $name;
                        }
                    }else {
                        $nameExplode = explode(".", $_FILES["Doctors"]["name"][$fieldName]);
                        if (count($nameExplode) > 1) {
                            $name = uniqid() . "." . $nameExplode[1];
                            copy($_FILES["Doctors"]["tmp_name"][$fieldName], Doctors::IMAGE_PATH . "th/" . $name);
                            $_POST["Doctors"][$fieldName] = Doctors::IMAGE_PATH . "th/" . $name;
                        }
                    }
                }
            }

            foreach($fieldNameThSchedule as $key => $fieldName)
            {
                $_POST["Doctors"][$fieldName] = $model->$fieldName;

                if ($_FILES["Doctors"]["name"][$fieldName] != "")
                {
                    $time = time();
                    if($model->$fieldName) {
                        $nameExplode = explode(".", $_FILES["Doctors"]["name"][$fieldName]);
                        if (count($nameExplode) > 1) {
                            $name = uniqid() . "." . $nameExplode[1];
                            copy($_FILES["Doctors"]["tmp_name"][$fieldName], Doctors::IMAGE_PATH . "th/" . $name);
                            $_POST["Doctors"][$fieldName] = Doctors::IMAGE_PATH . "th/" . $name;
                        }
                    }else {
                        $nameExplode = explode(".", $_FILES["Doctors"]["name"][$fieldName]);
                        if (count($nameExplode) > 1) {
                            $name = uniqid() . "." . $nameExplode[1];
                            copy($_FILES["Doctors"]["tmp_name"][$fieldName], Doctors::IMAGE_PATH . "th/" . $name);
                            $_POST["Doctors"][$fieldName] = Doctors::IMAGE_PATH . "th/" . $name;
                        }
                    }
                }
            }

            foreach($fieldNameEnSchedule as $key => $fieldName)
            {
                $_POST["Doctors"][$fieldName] = $model->$fieldName;

                if ($_FILES["Doctors"]["name"][$fieldName] != "")
                {
                    if($model->$fieldName) {
                        $nameExplode = explode(".", $_FILES["Doctors"]["name"][$fieldName]);
                        if (count($nameExplode) > 1) {
                            $name = uniqid() . "." . $nameExplode[1];
                            copy($_FILES["Doctors"]["tmp_name"][$fieldName], Doctors::IMAGE_PATH . "en/" . $name);
                            $_POST["Doctors"][$fieldName] = Doctors::IMAGE_PATH . "en/" . $name;
                        }
                    }else{
                        $nameExplode = explode(".", $_FILES["Doctors"]["name"][$fieldName]);
                        if (count($nameExplode) > 1) {
                            $name = uniqid() . "." . $nameExplode[1];
                            copy($_FILES["Doctors"]["tmp_name"][$fieldName], Doctors::IMAGE_PATH . "en/" . $name);
                            $_POST["Doctors"][$fieldName] = Doctors::IMAGE_PATH . "en/" . $name;
                        }
                    }
                }
            }
        }

        if ($model->load($_POST) && $model->save()) {
            DoctorDescription::deleteAll(['doctorId' => $model->id]);
            $informations = isset(Yii::$app->request->post('DoctorDescription')["information"]) ? Yii::$app->request->post('DoctorDescription')["information"] : null;
            $trainning = isset(Yii::$app->request->post('DoctorDescription')["trainning"]) ? Yii::$app->request->post('DoctorDescription')["trainning"] : null;
            foreach ($informations as $key => $information) {
                $doctorDescription = new DoctorDescription();
                $doctorDescription->doctorId = $model->id;
                $doctorDescription->information_year_th = isset($information['information_year_th']) ? $information['information_year_th'] : '';
                $doctorDescription->information_th = isset($information['information_th']) ? $information['information_th'] : '';
                $doctorDescription->information_year_en = isset($information['information_year_en']) ? $information['information_year_en'] : '';
                $doctorDescription->information_en = isset($information['information_en']) ? $information['information_en'] : '';
                $doctorDescription->specialized_training_year_th = isset($trainning[$key]['specialized_training_year_th']) ? $trainning[$key]['specialized_training_year_th'] : '';
                $doctorDescription->specialized_training_th = isset($trainning[$key]['specialized_training_th']) ? $trainning[$key]['specialized_training_th'] : '';
                $doctorDescription->specialized_training_year_en = isset($trainning[$key]['specialized_training_year_en']) ? $trainning[$key]['specialized_training_year_en'] : '';
                $doctorDescription->specialized_training_en = isset($trainning[$key]['specialized_training_en']) ? $trainning[$key]['specialized_training_en'] : '';
                $doctorDescription->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $servicesObj = Services::find()->where(['active' => 1])->orderby(['index_weight' => SORT_ASC])->all();
            $services = [];
            foreach ($servicesObj as $service)
            {
                $services[$service->id] = $service->th_title;
            }
            return $this->render('update', [
                'model' => $model,
                'services' => $services,
                'doctorDescription' => $doctorDescription,
            ]);
        }
    }

    /**
     * Deletes an existing Doctors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $fieldNameList = ["th_image","en_image","image_schedule_th","image_schedule_en"];

        foreach ($fieldNameList as $fieldName)
        {
            @unlink($model->$fieldName);
        }

        $model->delete();
        DoctorDescription::deleteAll(['doctorId' => $id]);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Doctors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Doctors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Doctors::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
