<?php

namespace app\controllers;

class InsuranceController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$fileName = "insurance.txt";
    	$path = "../aikchol/web/content/";

    	if (isset($_POST["thInsurance"]) && isset($_POST["enInsurance"]))
    	{
    		file_put_contents($path."th_".$fileName, $_POST["thInsurance"]);
    		file_put_contents($path."en_".$fileName, $_POST["enInsurance"]);
    	}

    	$thInsurance = file_get_contents($path."th_".$fileName);
    	$enInsurance = file_get_contents($path."en_".$fileName);

        return $this->render('index', ["thInsurance" => $thInsurance, "enInsurance" => $enInsurance]);
    }

}
