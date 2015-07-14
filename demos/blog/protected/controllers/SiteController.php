<?php

class SiteController extends Controller {
        public $actionUserCellno;
        private $actionUserEmail=null;
    public $layout = 'column1';

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array
            (
// captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
// They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'contact-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];

            if ($model->validate()) {
                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {

        
        if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH)
            throw new CHttpException(500, "This application requires that PHP was compiled with Blowfish support for crypt().");

        $model = new LoginForm;

// if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login() ) {
                $this->actionUserCellno = $model->userCellno;
                $actionUserEmail = $model->userEmail;
                
                $model = new AuthenticationtypeForm();
                $this->render('authenticationtype', array('model' => $model));
            } else {
                $this->render('login', array('model' => $model));
            }
        }
        elseif (isset($_POST['AuthenticationtypeForm'])) {
           
            $model = new AuthenticationtypeForm();
            $model->attributes = $_POST['AuthenticationtypeForm'];
            if ($model->validate()) {
                if ($model->authenticity === 'emailRadio') {
                    $model = new EmailauthenticationForm();
                    $this->render('emailauthentication', array('model' => $model));
                } elseif ($model->authenticity === 'smsRadio') {
                    $model = new CellnoauthenticationForm();
                    $this->render('cellnoauthentication', array('model' => $model));
                } elseif ($model->authenticity === 'dcRadio') {
                    $model = new DigitalcertificateForm();
                    $this->render('digitalcertificate', array('model' => $model));
                } else {
                    $model = new AuthenticationtypeForm();
                    $this->render('authenticationtype', array('model' => $model));
                }
            } else {
                $this->render('authenticationtype', array('model' => $model));
            }
        } elseif (isset($_POST['EmailauthenticationForm'])) {
            $model = new EmailauthenticationForm();
            $model->attributes = $_POST['EmailauthenticationForm'];

            if ($model->validate()&& $model->checkEmail()) {
                $model = new RandomnoForm();
                $this->render('randomno', array('model' => $model));
            } else {
                $this->render('emailauthentication', array('model' => $model));
            }
        } elseif (isset($_POST['CellnoauthenticationForm'])) {
            $model = new CellnoauthenticationForm();
            $model->attributes = $_POST['CellnoauthenticationForm']; 
                   
            if ($model->validate()&& $model->checkCellno()) {
                $model = new RandomnoForm();
                $this->render('randomno', array('model' => $model));
            } else {
                $this->render('cellnoauthentication', array('model' => $model));
            }
        } else {
            $this->render('login', array('model' => $model));
        }
// display the login form
//$this->render('login',array('model'=>$model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionPage() {
        $model = new AboutForm;
// collect user input data
        if (isset($_POST['AboutForm'])) {
            $model->attributes = $_POST['AboutForm'];
        }
// display the login form
        $this->render('pages/about', array('model' => $model));
    }

    public function actionTutorial() {
        $this->render('tutorial');
    }


    public function actionRandomno() {
        $model = new RandomnoForm();
        $this->render('randomno', array('model' => $model));
    }

    public function actionDigitalcertificate() {
        $model = new DigitalcertificateForm();
        $this->render('digitalcertificate', array('model' => $model));
    }

    public function actionCellnoauthentication() {
        $model = new CellnoauthenticationForm();
        $this->render('cellnoauthentication', array('model' => $model));
    }

    public function actionEmailauthentication() {
        $model = new EmailauthenticationForm();
        $this->render('emailauthentication', array('model' => $model));
    }

}
