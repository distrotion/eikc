<?php

namespace app\controllers;

use app\models\Contacts;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use arturoliveira\ExcelView;
use app\models\Doctors;
use app\models\Services;
use app\models\Appointments;
use app\models\Jobs;
use app\models\Applied;

class ExportController extends \yii\web\Controller
{

    public function actionContact()
    {
    	if (isset($_POST['start_date']) && isset($_POST['end_date'])) 
    	{
    		$startDate = strtotime($_POST['start_date']." 00:00:00");
    		$endDate = strtotime($_POST['end_date']." 23:59:59");

    		$dataProvider = new ActiveDataProvider([
						            'query' => Contacts::find()
						            			->select(['name', 'email', 'subject', 'desc', 'FROM_UNIXTIME(create_time) as date_time'])
						            			->where('create_time >= '.$startDate)
						            			->where('create_time <= '.$endDate)
						            			->orderby(['create_time' => SORT_ASC]),
						        ]);

    		ExcelView::widget([
            'dataProvider' => $dataProvider,
            'fullExportType'=> 'xlsx', //can change to html,xls,csv and so on
            'grid_mode' => 'export',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                'email',
                'subject',
                'desc',
                'date_time',
              ],
        	]);

    	}

    	else
    	{
	    	$query = new Query;
			$query->select("DISTINCT FROM_UNIXTIME(create_time, '%d-%m-%Y') as `date_time`")
			    ->from('ahc_contacts');
			$command = $query->createCommand();
			$times = $command->queryAll();

	    	return $this->render('contact', [
						'times' => $times,
	    		]);    		
    	}
    	
    }

    public function actionAppointment()
    {
    	if (isset($_POST["service_id"]) && isset($_POST["doctor_id"]) && isset($_POST["appointment"]) && isset($_POST["appointment_time"]))
    	{
    		$query = new Query;
			$query->select('ahc_services.en_title as service_name,ahc_doctors.en_title as doctor_name, 
							FROM_UNIXTIME(`appointment_date`, "%d-%m-%Y") as `appointment_date`, 
							ahc_appointments.appointment_time, 
							CASE `appointment_time`
								WHEN 1 THEN "07:00 - 08:00"
								WHEN 2 THEN "08:00 - 09:00"
								WHEN 3 THEN "09:00 - 10:00"
								WHEN 4 THEN "10:00 - 11:00"
								WHEN 5 THEN "11:00 - 12:00"
								WHEN 6 THEN "12:00 - 13:00"
								WHEN 7 THEN "13:00 - 14:00"
								WHEN 8 THEN "14:00 - 15:00"
								WHEN 9 THEN "15:00 - 16:00"
								ELSE "16:00 - 17:00"
							END `appointment_time`, 
							ahc_appointments.symptom, 
							ahc_appointments.name, ahc_appointments.lastname, 
							ahc_appointments.birthdate, 
							CASE `gender`
								WHEN 0 THEN "Female"
								ELSE "Male"
							END gender, 
							ahc_appointments.telephone, ahc_appointments.email, 
							ahc_appointments.nationality, 
							CASE `visited`
								WHEN 1 THEN "Visited"
							    ELSE "Not Visited"
							END visited')
			->from('ahc_appointments')
			->join('INNER JOIN', 'ahc_doctors','ahc_doctors.id = ahc_appointments.doctor_id')
			->join('INNER JOIN', 'ahc_services','ahc_services.id = ahc_appointments.service_id')
			->where("(".$_POST['service_id'].' = 0 OR ahc_appointments.service_id = '.$_POST['service_id'].") AND (".$_POST['doctor_id'].' = 0 OR ahc_appointments.doctor_id = '.$_POST['doctor_id'].") AND (".$_POST['appointment'].' = 0 OR ahc_appointments.appointment_date = '.$_POST['appointment'].") AND (".$_POST['appointment_time'].' = 0 OR ahc_appointments.appointment_time = '.$_POST['appointment_time'].")")
			->orderby(['ahc_appointments.appointment_date' => SORT_DESC, 'ahc_appointments.appointment_time' => SORT_ASC]);
			$dataProvider = new ActiveDataProvider([
									'query' => $query,
								]);

    		ExcelView::widget([
            'dataProvider' => $dataProvider,
            'fullExportType'=> 'xlsx', //can change to html,xls,csv and so on
            'grid_mode' => 'export',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'service_name',
                'doctor_name',
                'appointment_date',
                'appointment_time',
                'symptom', 
                'name', 
                'lastname', 
                'birthdate', 
                'gender', 
                'telephone', 
                'email', 
                'nationality', 
                'visited',
              ],
            ]);
    	}
    	else
    	{
    		$services = Services::find()->orderby(['index_weight' => SORT_ASC])->all();
	    	$doctors = Doctors::find()->orderby(['index_weight' => SORT_ASC])->all();
	    	$appointments = Appointments::find()->select("DISTINCT FROM_UNIXTIME(`appointment_date`, \"%d-%m-%Y\") as `appointment_str` ")->orderby(['appointment_date' => SORT_DESC])->all();

	    	$serviceList = [];
	    	$doctorList = [[]];
	    	$appointmentTime = [];

	    	foreach ($services as $service)
	    	{
	    		$serviceList[$service->id] = $service->en_title;
	    	}

	    	foreach ($doctors as $doctor)
	    	{
	    		$doctorList[$doctor->service_id][$doctor->id] = $doctor->en_title;
	    	}

	    	foreach ($appointments as $appointment)
	    	{
	    		$appointmentTime[$appointment->appointment_str] = $appointment->appointment_str;
	    	}

	    	return $this->render('appointment', [
	    			'serviceList' => $serviceList,
	    			'doctorList' => $doctorList,
	    			'appointmentTime' => $appointmentTime,
	    		]);
    	}
    	
    }

    public function actionApplication()
    {
    	if (isset($_POST["position_id"]))
    	{
			$query = new Query;
			$query->select('`ahc_jobs`.`en_title`, `salary`, 
							CASE `gender` 
								WHEN 0 THEN "Female"
								WHEN 1 THEN "Male"
								ELSE "Not Identified"
							END `gender`, 
							`name`, `lastname`, `birthdate`,
							`weight`, `height`,  `race`,  `nationality`,  `religion`,  `address`,  `road`,
  							`amphur`,  `district`,  `province`,  `postcode`,  `email`,  `telephone`,  `mobile`,
  							`id_no`,  `issued_at`,  `expired`,  `highschool`,  `highschool_major`,  `highschool_attend`,
  							`highschool_gpa`,  `vocational`,  `vocational_major`,  `vocational_attend`,  `vocational_gpa`,
  							`diploma`,  `diploma_major`,  `diploma_attend`,  `diploma_gpa`,  `bachelor`,  `bachelor_major`,
  							`bachelor_attend`,  `bachelor_gpa`,  `master`,  `master_major`,  `master_attend`,  `master_gpa`,  `others`,
  							`others_major`,  `others_attend`,  `others_gpa`,  
  							CASE `thai_speaking`
  								WHEN 0 THEN "Good"
  								WHEN 1 THEN "Fair"
  								WHEN 2 THEN "Poor"
  								ELSE "Not Identified"
  							END `thai_speaking`, 
  							CASE `thai_writing`
  								WHEN 0 THEN "Good"
  								WHEN 1 THEN "Fair"
  								WHEN 2 THEN "Poor"
  								ELSE "Not Identified"
  							END `thai_writing`,
  							CASE `thai_reading`
  								WHEN 0 THEN "Good"
  								WHEN 1 THEN "Fair"
  								WHEN 2 THEN "Poor"
  								ELSE "Not Identified"
  							END `thai_reading`, 
  							CASE `english_speaking`
  								WHEN 0 THEN "Good"
  								WHEN 1 THEN "Fair"
  								WHEN 2 THEN "Poor"
  								ELSE "Not Identified"
  							END `english_speaking`, 
  							CASE `english_writing`
  								WHEN 0 THEN "Good"
  								WHEN 1 THEN "Fair"
  								WHEN 2 THEN "Poor"
  								ELSE "Not Identified"
  							END `english_writing`, 
  							CASE `english_reading`
  								WHEN 0 THEN "Good"
  								WHEN 1 THEN "Fair"
  								WHEN 2 THEN "Poor"
  								ELSE "Not Identified"
  							END `english_reading`, 
  							`working_experience`,  `company_1`,  `company_1_telephone`,  `company_1_from`,
  							`company_1_to`,  `company_1_position`,  `company_1_desc`,  `company_1_salary`,  `company_2`,  `company_2_telephone`, `company_2_from`,
  							`company_2_to`,  `company_2_position`,  `company_2_desc`,  `company_2_salary`,  `company_3`,  `company_3_telephone`,  `company_3_from`,
  							`company_3_to`,  `company_3_position`,  `company_3_desc`,  `company_3_salary`,  FROM_UNIXTIME(`ahc_applied`.`create_time`, \'%d-%m-%Y\') as `create_time`')
			->from('ahc_applied')
			->join('INNER JOIN', 'ahc_jobs', '')
			->where("(".$_POST["position_id"]." = 0 OR ahc_applied.job_id = ".$_POST["position_id"].")")
			->orderby(['ahc_applied.create_time' => SORT_DESC]);

			$dataProvider = new ActiveDataProvider([
									'query' => $query,
								]);

    		ExcelView::widget([
            'dataProvider' => $dataProvider,
            'fullExportType'=> 'xlsx', //can change to html,xls,csv and so on
            'grid_mode' => 'export',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
					'en_title',
					'salary',
					'gender',
					'name',
					'lastname',
					'birthdate',
					'weight',
					'height',
					'race',
					'nationality',
					'religion',
					'address',
					'road',
					'amphur',
					'district',
					'province',
					'postcode',
					'email',
					'telephone',
					'mobile',
					'id_no',
					'issued_at',
					'expired',
					'highschool',
					'highschool_major',
					'highschool_attend',
					'highschool_gpa',
					'vocational',
					'vocational_major',
					'vocational_attend',
					'vocational_gpa',
					'diploma',
					'diploma_major',
					'diploma_attend',
					'diploma_gpa',
					'bachelor',
					'bachelor_major',
					'bachelor_attend',
					'bachelor_gpa',
					'master',
					'master_major',
					'master_attend',
					'master_gpa',
					'others',
					'others_major',
					'others_attend',
					'others_gpa',
					'thai_speaking',
					'thai_writing',
					'thai_reading',
					'english_speaking',
					'english_writing',
					'english_reading',
					'working_experience',
					'company_1',
					'company_1_telephone',
					'company_1_from',
					'company_1_to',
					'company_1_position',
					'company_1_desc',
					'company_1_salary',
					'company_2',
					'company_2_telephone',
					'company_2_from',
					'company_2_to',
					'company_2_position',
					'company_2_desc',
					'company_2_salary',
					'company_3',
					'company_3_telephone',
					'company_3_from',
					'company_3_to',
					'company_3_position',
					'company_3_desc',
					'company_3_salary',
					'create_time',
              ],
        	]);
    	}
    	else
    	{
	    	$jobs = Jobs::find()->orderby(['index_weight' => SORT_ASC])->all();

	    	return $this->render('application', [
	    			'jobs' => $jobs,
	    		]);    		
    	}
    }

}
