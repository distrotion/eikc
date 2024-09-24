<?php

namespace app\controllers;

use app\models\DoctorDescription;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\controllers\LanguageController as Controller;
use yii\web\NotFoundHttpException;

use app\models\Csrs;
use app\models\CsrImages;
use app\models\Jobs;
use app\models\Rooms;
use app\models\InsuranceImages;
use app\models\Insurances;
use app\models\Packages;
use app\models\Healths;
use app\models\Doctors;
use app\models\Services;
use app\models\Mails;
use app\models\Contacts;
use app\models\Appointments;
use app\models\Applied;

use kartik\mpdf\Pdf;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            /*'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],*/
            /*'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'doctors' => ['post'],
                ],
            ],*/
        ];
    }

    public function beforeAction($action)
    {
        if( $action->id == 'subscribe' || 
            $action->id == 'send' || 
            $action->id == 'appointment')
        {
            return true;
        }

        return parent::beforeAction($action);
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionTest()
    {
	$content = $this->renderPartial('test');

	$pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => './css/pdf.css',
            // any css to be embedded if required
            'cssInline' => '.bd{border:1.5px solid; text-align: center;} .ar{text-align:right} .imgbd{border:1px solid}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Preview Report Case: '],
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>[''],
                //'SetFooter'=>['{PAGENO}'],
            ]
        ]);
	return $pdf->render();
    }

    public function actionIndex()
    {
        $tips = Healths::find()->where(['active' => 1, 'show_first' => 1])->orderby(['index_weight' => SORT_ASC])->all();
        $packages = Packages::find()->where(['active' => 1, 'show_first' => 1])->orderby(['index_weight' => SORT_ASC])->all();

        return $this->render('index', [
                "tips" => $tips,
                "packages" => $packages,
            ]);
    }

    public function actionSubscribe()
    {
        $mail = new Mails();
        $mail->email = Yii::$app->getRequest()->post('email');
        $mail->save();

        Yii::$app->response->redirect(Yii::$app->getRequest()->post('url'));
    }

    public function actionSend()
    {
        $contact = new Contacts();
        $contact->name = Yii::$app->getRequest()->post('name');
        $contact->email = Yii::$app->getRequest()->post('email');
        $contact->subject = Yii::$app->getRequest()->post('subject');
        $contact->desc = Yii::$app->getRequest()->post('detail');
        
        $contact->save();

        $message = "Name : ". Yii::$app->getRequest()->post('name')."<BR/>";
        $message .= "Email : ". Yii::$app->getRequest()->post('email')."<BR/>";
        $message .= "Subject : ". Yii::$app->getRequest()->post('subject')."<BR/>";
        $message .= "Detail : ". Yii::$app->getRequest()->post('detail')."<BR/>";

        Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params["fromEmail"])
            ->setTo(Yii::$app->params["toEmail"])
            ->setSubject('Contact From Aikchol Customer: '.Yii::$app->getRequest()->post('subject'))
            ->setHtmlBody($message)
            ->send();
    }

    public function actionAppointment()
    {
        $appointment = new Appointments();

        $appointment->service_id = Yii::$app->getRequest()->post('specialty');
        $appointment->doctor_id = Yii::$app->getRequest()->post('doctor');
        $appointment->appointment_date = Yii::$app->getRequest()->post('date');
        $appointment->appointment_time = Yii::$app->getRequest()->post('time');
        $appointment->symptom = Yii::$app->getRequest()->post('desc');
        $appointment->name = Yii::$app->getRequest()->post('name');
        $appointment->lastname = Yii::$app->getRequest()->post('lastname');
        $appointment->birthdate = Yii::$app->getRequest()->post('birthdate');
        $appointment->gender = Yii::$app->getRequest()->post('gender');
        $appointment->telephone = Yii::$app->getRequest()->post('phone');
        $appointment->email = Yii::$app->getRequest()->post('email');
        $appointment->nationality = Yii::$app->getRequest()->post('national');
        $appointment->visited = Yii::$app->getRequest()->post('register');

        $appointment->save();

        $doctor = Doctors::findOne(Yii::$app->getRequest()->post('doctor'));
        $specialty = Services::findOne(Yii::$app->getRequest()->post('specialty'));

        $time = ["07.00 - 08.00","08.00 - 09.00","09.00 - 10.00","10.00 - 11.00","11.00 - 12.00","12.00 - 13.00","13.00 - 14.00","14.00 - 15.00","15.00 - 16.00","16.00 - 17.00"];
        $register = ['No', 'Yes'];

        $message = "Specialty: ". $specialty->en_title ."<BR/>";
        $message .= "Doctor: ". $doctor->en_title ."<BR/>";
        $message .= "Date: ". date("d-m-Y", Yii::$app->getRequest()->post('date')) ."<BR/>";
        $message .= "Time: ". $time[Yii::$app->getRequest()->post('time') - 1] ."<BR/>";
        $message .= "Description: ".Yii::$app->getRequest()->post('desc')."<BR/>";
        $message .= "Name : ".Yii::$app->getRequest()->post('name')."<BR/>";
        $message .= "Lastname: ".Yii::$app->getRequest()->post('lastname')."<BR/>";
        $message .= "Birthdate: ".Yii::$app->getRequest()->post('birthdate')."<BR/>";
        $message .= "Gender: ".Yii::$app->getRequest()->post('gender')."<BR/>";
        $message .= "Telephone: ".Yii::$app->getRequest()->post('phone')."<BR/>";
        $message .= "Email: ".Yii::$app->getRequest()->post('email')."<BR/>";
        $message .= "Nationality: ".Yii::$app->getRequest()->post('national')."<BR/>";
        $message .= "Have ever registered: ".$register[Yii::$app->getRequest()->post('register')]."<BR/>";

        Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params["fromEmail"])
            ->setTo(Yii::$app->params["toEmail"])
            ->setSubject('Appointment With Doctor: '.$doctor->en_title)
            ->setHtmlBody($message)
            ->send();
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionAbout()
    {
        $thumbImage = Yii::$app->language."_thumb_image";
        $title = Yii::$app->language."_title";
        $desc = Yii::$app->language."_desc";
        $csrs = Csrs::find()->select([$thumbImage, $title, $desc,'id'])->where(['show_about' => 1, 'active' => 1])->orderby(['index_weight' => SORT_ASC])->all();
        return $this->render('about', [
                'csrs' => $csrs,
            ]);
    }

    public function actionHistory()
    {
        return $this->render('history');
    }

    public function actionVision()
    {
        return $this->render('vision');
    }

    public function actionMission()
    {
        return $this->render('mission');
    }

    public function actionPride()
    {
        return $this->render('pride');
    }

    public function actionCsr()
    {
        $title = Yii::$app->language."_title";
        $caption = Yii::$app->language."_caption";
        $thumbImage = Yii::$app->language."_thumb_image";
        $csrs = Csrs::find()->select([$title, $caption, $thumbImage, 'id'])->where(['active' => 1])->orderby(['index_weight' => SORT_ASC])->all();
        return $this->render('csr', [
                'csrs' => $csrs,
            ]);
    }

    public function actionCsrdetail($csr_id = 0)
    {
        $csr = Csrs::findOne($csr_id);
        if (!$csr) 
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $csrImages = CsrImages::find()->where(["csr_id" => $csr_id])->orderBy(["index_weight" => SORT_ASC])->all();

        return $this->render('csr_detail', [
                'csr' => $csr,
                'csrImages' => $csrImages,
            ]);
    }

    public function actionSocial()
    {
        return $this->render('social');
    }

    public function actionInsurance()
    {
        $image = Yii::$app->language."_image";
        $insuranceImages = InsuranceImages::find()->orderby(['index_weight' => SORT_ASC])->all();
        $insurance = file_get_contents('./content/'.Yii::$app->language.'_insurance.txt');
        return $this->render('insurance', [
                'insurance' => $insurance,
                'insuranceImages' => $insuranceImages,
            ]);
    }

    public function actionInsurances()
    {
        $image = Yii::$app->language."_image";
        $insuranceImages = InsuranceImages::find()->select([$image])->where(['show_first' => 1])->orderby(['index_weight' => SORT_ASC])->all();
        return $this->render('insurances', [
                'insuranceImages' => $insuranceImages,
            ]);
    }

    public function actionPackages()
    {
        $title = Yii::$app->language."_title";
        $thumbImage = Yii::$app->language.'_thumb_image';
        $caption = Yii::$app->language."_caption";
        $packages = Packages::find()->select([$title, $thumbImage, $caption, "id", "location"])->where(['active' => 1])->orderby(['index_weight' => SORT_ASC])->all();

        return $this->render('packages', [
                'packages' => $packages,
            ]);
    }

    public function actionPackage($id = 0)
    {
        $package = Packages::findOne($id);
        if (!$package) 
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('package', [
                'package' => $package,
            ]);
    }

    public function actionFacilities()
    {
        $title = Yii::$app->language."_title";
        $caption = Yii::$app->language."_caption";
        $thumbImage = Yii::$app->language."_thumb_image";
        $rooms = Rooms::find()->select([$title, $caption, $thumbImage, "id"])->where(['active' => 1])->orderby(['index_weight' => SORT_ASC])->all();
        return $this->render('facilities', [
                'rooms' => $rooms,
            ]);
    }

    public function actionRoom($id = 0)
    {
        $room = Rooms::findOne($id);
        
        if (!$room) 
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('room', [
                'room' => $room,
            ]);
    }

    public function actionEnvironment()
    {
        return $this->render('environment');
    }

    public function actionCareers()
    {
        $title = Yii::$app->language."_title";
        $jobs = Jobs::find()->select([$title, 'id'])->where(['active' => 1, 'show_first' => 1])->orderby(['index_weight' => SORT_ASC])->all();
        return $this->render('careers', [
                'jobs' => $jobs,
            ]);
    }

    public function actionPositions()
    {
        $title = Yii::$app->language."_title";
        $jobs = Jobs::find()->select([$title, 'id'])->where(['active' => 1])->orderby(['index_weight' => SORT_ASC])->all();
        return $this->render('positions', [
                'jobs' => $jobs,
            ]);
    }

    public function actionApply($position_id = 0)
    {

        if (Yii::$app->request->post('position')) 
        {

            $job = Jobs::findOne(Yii::$app->request->post('position'));

            $applied = new Applied();
            $applied->job_id = Yii::$app->request->post('position');
            $applied->salary = Yii::$app->request->post('salary');
            $applied->gender = Yii::$app->request->post('gender');
            $applied->name = Yii::$app->request->post('name');
            $applied->lastname = Yii::$app->request->post('last_name');
            $applied->birthdate = Yii::$app->request->post('dob');
            $applied->weight = Yii::$app->request->post('weight');
            $applied->height = Yii::$app->request->post('height');
            $applied->race = Yii::$app->request->post('race');
            $applied->nationality = Yii::$app->request->post('nationality');
            $applied->religion = Yii::$app->request->post('religeion');
            $applied->address = Yii::$app->request->post('address');
            $applied->road = Yii::$app->request->post('road');
            $applied->amphur = Yii::$app->request->post('amphur');
            $applied->district = Yii::$app->request->post('district');
            $applied->province = Yii::$app->request->post('province');
            $applied->postcode = Yii::$app->request->post('postcode');
            $applied->email = Yii::$app->request->post('email');
            $applied->telephone = Yii::$app->request->post('telephone');
            $applied->mobile = Yii::$app->request->post('mobile_phone');
            $applied->id_no = Yii::$app->request->post('id');
            $applied->issued_at = Yii::$app->request->post('issued');
            $applied->expired = Yii::$app->request->post('expired');
            
            $applied->highschool = Yii::$app->request->post('high_school');
            $applied->highschool_major = Yii::$app->request->post('major1');
            $applied->highschool_attend = Yii::$app->request->post('year1');
            $applied->highschool_gpa = Yii::$app->request->post('gpa1');
            $applied->vocational = Yii::$app->request->post('vacational');
            $applied->vocational_major = Yii::$app->request->post('major2');
            $applied->vocational_attend = Yii::$app->request->post('year2');
            $applied->vocational_gpa = Yii::$app->request->post('gpa2');
            $applied->diploma = Yii::$app->request->post('diploma');
            $applied->diploma_major = Yii::$app->request->post('major3');
            $applied->diploma_attend = Yii::$app->request->post('year3');
            $applied->diploma_gpa = Yii::$app->request->post('gpa3');
            $applied->bachelor = Yii::$app->request->post('bachelor');
            $applied->bachelor_major = Yii::$app->request->post('major4');
            $applied->bachelor_attend = Yii::$app->request->post('year4');
            $applied->bachelor_gpa = Yii::$app->request->post('gpa4');
            $applied->master = Yii::$app->request->post('master');
            $applied->master_major = Yii::$app->request->post('major5');
            $applied->master_attend = Yii::$app->request->post('year5');
            $applied->master_gpa = Yii::$app->request->post('gpa5');
            $applied->master = Yii::$app->request->post('others');
            $applied->master_major = Yii::$app->request->post('major6');
            $applied->master_attend = Yii::$app->request->post('year6');
            $applied->master_gpa = Yii::$app->request->post('gpa6');

            $applied->thai_speaking = Yii::$app->request->post('speak_thai');
            $applied->thai_writing = Yii::$app->request->post('write_thai');
            $applied->thai_reading = Yii::$app->request->post('read_thai');
            $applied->english_speaking = Yii::$app->request->post('speak_eng');
            $applied->english_writing = Yii::$app->request->post('write_eng');
            $applied->english_reading = Yii::$app->request->post('read_eng');

            $applied->working_experience = Yii::$app->request->post('exp');
            $applied->company_1 = Yii::$app->request->post('company1');
            $applied->company_1_telephone = Yii::$app->request->post('company_phone1');
            $applied->company_1_from = Yii::$app->request->post('from1');
            $applied->company_1_to = Yii::$app->request->post('to1');
            $applied->company_1_position = Yii::$app->request->post('position1');
            $applied->company_1_desc = Yii::$app->request->post('description1');
            $applied->company_1_salary = Yii::$app->request->post('salary1');
            $applied->company_2 = Yii::$app->request->post('company2');
            $applied->company_2_telephone = Yii::$app->request->post('company_phone2');
            $applied->company_2_from = Yii::$app->request->post('from2');
            $applied->company_2_to = Yii::$app->request->post('to2');
            $applied->company_2_position = Yii::$app->request->post('position2');
            $applied->company_2_desc = Yii::$app->request->post('description2');
            $applied->company_2_salary = Yii::$app->request->post('salary2');
            $applied->company_3 = Yii::$app->request->post('company3');
            $applied->company_3_telephone = Yii::$app->request->post('company_phone3');
            $applied->company_3_from = Yii::$app->request->post('from3');
            $applied->company_3_to = Yii::$app->request->post('to3');
            $applied->company_3_position = Yii::$app->request->post('position3');
            $applied->company_3_desc = Yii::$app->request->post('description3');
            $applied->company_3_salary = Yii::$app->request->post('salary3');

            $applied->save();

            $message = "Position: ".$job->en_title."<BR/>";
            $message .= "Salary: ".Yii::$app->request->post('salary')."<BR/>";
            $message .= "Gender: ".Yii::$app->request->post('gender')."<BR/>";
            $message .= "Name: ".Yii::$app->request->post('name')."<BR/>";
            $message .= "Lastname: ".Yii::$app->request->post('last_name')."<BR/>";
            $message .= "Birthdate: ".Yii::$app->request->post('dob')."<BR/>";
            $message .= "Weight: ".Yii::$app->request->post('weight')."<BR/>";
            $message .= "Height: ".Yii::$app->request->post('height')."<BR/>";
            $message .= "Race: ".Yii::$app->request->post('race')."<BR/>";
            $message .= "Nationality: ".Yii::$app->request->post('nationality')."<BR/>";
            $message .= "Religion: ".Yii::$app->request->post('religeion')."<BR/>";
            $message .= "Address: ".Yii::$app->request->post('address')."<BR/>";
            $message .= "Road: ".Yii::$app->request->post('road')."<BR/>";
            $message .= "Amphur: ".Yii::$app->request->post('amphur')."<BR/>";
            $message .= "District: ".Yii::$app->request->post('district')."<BR/>";
            $message .= "Province: ".Yii::$app->request->post('province')."<BR/>";
            $message .= "Postcode: ".Yii::$app->request->post('postcode')."<BR/>";
            $message .= "Email: ".Yii::$app->request->post('email')."<BR/>";
            $message .= "Telephone: ".Yii::$app->request->post('telephone')."<BR/>";
            $message .= "Mobile Phone: ".Yii::$app->request->post('mobile_phone')."<BR/>";
            $message .= "ID No.: ".Yii::$app->request->post('id')."<BR/>";
            $message .= "Issued At: ".Yii::$app->request->post('issued')."<BR/>";
            $message .= "Expired: ".Yii::$app->request->post('expired')."<BR/>";

            $message .= "High School: ".Yii::$app->request->post('high_school')."<BR/>";
            $message .= "Major: ".Yii::$app->request->post('major1')."<BR/>";
            $message .= "Year: ".Yii::$app->request->post('year1')."<BR/>";
            $message .= "GPA: ".Yii::$app->request->post('gpa1')."<BR/>";
            $message .= "Vacational: ".Yii::$app->request->post('vacational')."<BR/>";
            $message .= "Major: ".Yii::$app->request->post('major2')."<BR/>";
            $message .= "Year: ".Yii::$app->request->post('year2')."<BR/>";
            $message .= "GPA: ".Yii::$app->request->post('gpa2')."<BR/>";
            $message .= "Diploma: ".Yii::$app->request->post('diploma')."<BR/>";
            $message .= "Major: ".Yii::$app->request->post('major3')."<BR/>";
            $message .= "Year: ".Yii::$app->request->post('year3')."<BR/>";
            $message .= "GPA: ".Yii::$app->request->post('gpa3')."<BR/>";
            $message .= "Bachelor: ".Yii::$app->request->post('bachelor')."<BR/>";
            $message .= "Major: ".Yii::$app->request->post('major4')."<BR/>";
            $message .= "Year: ".Yii::$app->request->post('year4')."<BR/>";
            $message .= "GPA: ".Yii::$app->request->post('gpa4')."<BR/>";
            $message .= "Master: ".Yii::$app->request->post('master')."<BR/>";
            $message .= "Major: ".Yii::$app->request->post('major5')."<BR/>";
            $message .= "Year: ".Yii::$app->request->post('year5')."<BR/>";
            $message .= "GPA: ".Yii::$app->request->post('gpa5')."<BR/>";
            $message .= "Other: ".Yii::$app->request->post('others')."<BR/>";
            $message .= "Major: ".Yii::$app->request->post('major6')."<BR/>";
            $message .= "Year: ".Yii::$app->request->post('year6')."<BR/>";
            $message .= "GPA: ".Yii::$app->request->post('gpa6')."<BR/>";

            $message .= "Thai Speaking: ".Yii::$app->request->post('speak_thai')."<BR/>";
            $message .= "Thai Writing: ".Yii::$app->request->post('write_thai')."<BR/>";
            $message .= "Thai Reading: ".Yii::$app->request->post('read_thai')."<BR/>";
            $message .= "Eng Speaking: ".Yii::$app->request->post('speak_eng')."<BR/>";
            $message .= "Eng Writing: ".Yii::$app->request->post('write_eng')."<BR/>";
            $message .= "Eng Reading: ".Yii::$app->request->post('read_eng')."<BR/>";

            $message .= "Experience: ".Yii::$app->request->post('exp')."<BR/>";
            $message .= "Company Name: ".Yii::$app->request->post('company1')."<BR/>";
            $message .= "Phone: ".Yii::$app->request->post('company_phone1')."<BR/>";
            $message .= "From: ".Yii::$app->request->post('from1')."<BR/>";
            $message .= "To: ".Yii::$app->request->post('to1')."<BR/>";
            $message .= "Position: ".Yii::$app->request->post('position1')."<BR/>";
            $message .= "Description: ".Yii::$app->request->post('description1')."<BR/>";
            $message .= "Salary: ".Yii::$app->request->post('salary1')."<BR/>";
            $message .= "Company Name: ".Yii::$app->request->post('company2')."<BR/>";
            $message .= "Phone: ".Yii::$app->request->post('company_phone2')."<BR/>";
            $message .= "From: ".Yii::$app->request->post('from2')."<BR/>";
            $message .= "To: ".Yii::$app->request->post('to2')."<BR/>";
            $message .= "Position: ".Yii::$app->request->post('position2')."<BR/>";
            $message .= "Description: ".Yii::$app->request->post('description2')."<BR/>";
            $message .= "Salary: ".Yii::$app->request->post('salary2')."<BR/>";
            $message .= "Company Name: ".Yii::$app->request->post('company3')."<BR/>";
            $message .= "Phone: ".Yii::$app->request->post('company_phone3')."<BR/>";
            $message .= "From: ".Yii::$app->request->post('from3')."<BR/>";
            $message .= "To: ".Yii::$app->request->post('to3')."<BR/>";
            $message .= "Position: ".Yii::$app->request->post('position3')."<BR/>";
            $message .= "Description: ".Yii::$app->request->post('description3')."<BR/>";
            $message .= "Salary: ".Yii::$app->request->post('salary3')."<BR/>";

            Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params["fromEmail"])
            ->setTo(Yii::$app->params["toEmail"])
            ->setSubject('Applied Position: '.$job->en_title)
            ->setHtmlBody($message)
            ->send();
        }

        $job = Jobs::findOne($position_id);
        if (!$job) 
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $this->render('apply', [
                'job' => $job,
            ]);
    }

    public function actionServices()
    {
        $doctors = Doctors::find()->where(['show_first' => 1, 'active' => 1])->orderby(['index_weight' => SORT_ASC])->all();
        $services = Services::find()->where(['active' => 1])->orderby(['index_weight' => SORT_ASC])->all();

        return $this->render('services', [
                'doctors' => $doctors,
                'services' => $services,
            ]);
    }

    public function actionService($service_id = 0)
    {
        $service = Services::findOne($service_id);
        $doctors = Doctors::find()->where(['active'=> 1, 'service_id' => $service_id])->orderby(['index_weight' => SORT_ASC])->all();

        if (!$service)
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('service', [
                'service' => $service,
                'serviceId' => $service_id,
                'doctors' => $doctors,
            ]);
    }

    public function actionDoctors()
    {
        if (Yii::$app->request->post('name') == "")
        {
            $doctors = Doctors::find()->where(['active' => 1])->orderby(['index_weight' => SORT_ASC])->all();    
        }
        else
        {
            $doctors = Doctors::find()->where(['active' => 1])->where(['LIKE', Yii::$app->language."_title", Yii::$app->request->post('name')])->orderby(['index_weight' => SORT_ASC])->all();    
        }

        return $this->render('doctors', [
                'doctors' => $doctors,
            ]);
    }

    public function actionDoctorDetail($id)
    {
        $doctor = Doctors::find()->where(['active' => 1, 'id' => $id])->one();
        if (!$doctor) {
            throw new NotFoundHttpException();
        }
        $doctor_relations = Doctors::find()->where(['active' => 1, 'service_id' => $doctor->service_id])->andWhere(['<>', 'id', $id])->orderBy(['rand()' => SORT_DESC])->limit(4)->all();
        $doctorDescription = DoctorDescription::find()->where(['doctorId' => $id])->all();
        return $this->render('doctor_detail', [
            'doctor' => $doctor,
            'doctorDescription' => $doctorDescription,
            'doctor_relations' => $doctor_relations,
        ]);

    }

    public function actionTips()
    {
        $title = Yii::$app->language."_title";
        $caption = Yii::$app->language."_caption";
        $thumbImage = Yii::$app->language."_thumb_image";
        $healths = Healths::find()->select(['id', $title, $caption, $thumbImage])->where(['active' => 1])->orderby(['index_weight' => SORT_ASC])->all();
        return $this->render('tips', [
                'healths' => $healths,
            ]);
    }

    public function actionTip($tip_id)
    {
        $health = Healths::findOne($tip_id);

        if (!$health) 
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('tip', [
                'health' => $health,
            ]);
    }

}
