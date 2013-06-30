<?php

class SiteController extends Controller
{
	public $layout = 'bootstrap';
	public $user;
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->layout = 'home';
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout = 'directorio';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionLogin(){
		$formLogin = new LoginForm();
		
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
        {
        	var_dump($_POST); die();
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

		if(isset($_POST['LoginForm'])){
			$formLogin->attributes = $_POST['LoginForm'];		
			if($formLogin->validate() && $formLogin->login()){
				$idSesion = Yii::app()->user->id;
				$objusuario = new Usuarios();
				$usuario = $objusuario->findByPk($idSesion);	
				switch ($usuario->roles_id) {
					case '1':
						# Redirecciona al perfil del Usuario registrado
						break;
					case ('2' OR '3'): 
						$this->redirect(array('propuestas/listar'));
						break;
					default:
						$this->redirect(array('site/login'));
						break;
				}			
				
			}	
		}				
		$this->render('login',array(
					  'model'=>$formLogin,
					  ));
	}

	public function actionLogout(){
		Yii::app()->user->logout();
		Yii::app()->session->clear();
		Yii::app()->session->destroy();
		$this->redirect('login');		
	}

}