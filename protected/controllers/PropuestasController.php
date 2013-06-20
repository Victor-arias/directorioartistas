<?php

class PropuestasController extends Controller
{
	public $layout = 'admin';
	public $user;
	
	public function actionDetalle()
	{
		$this->render('detalle');
	}

	public function actionListar()
	{
		$idSesion = Yii::app()->user->id;

		if(!is_null($idSesion)){
			$objUsuario = new Usuarios();
			$usuario = $objUsuario->findByPk($idSesion);
			$this->user = $usuario;

			$criteria = new CDbCriteria();
			$count = Propuestas::model()->count($criteria);
			$pages = new CPagination($count);

			$pages->pageSize = 20;
			$pages->applyLimit($criteria);
			$models = Propuestas::model()->findAll($criteria);
		}
		else{
			$this->redirect(array('site/login'));
		}

		$this->render('listar',array(
				'models' => $models,
				'pages' => $pages,
			));
	}

	public function actionAsignadas()
	{
		$idSesion = Yii::app()->user->id;

		if(!is_null($idSesion)){
			$objUsuario = new Usuarios();
			$usuario = $objUsuario->findByPk($idSesion);
			$this->user = $usuario;

			$criteria = new CDbCriteria();
			$count = Propuestas::model()->count($criteria);
			$pages = new CPagination($count);

			$pages->pageSize = 20;
			$pages->applyLimit($criteria);
			$models = Propuestas::model()->findAll($criteria);
		}
		else{
			$this->redirect(array('site/login'));
		}

		$this->render('asignadas',array(
				'models' => $models,
				'pages' => $pages,
			));		
	}

	public function accessRules()
	{
		return array(
            array('allow', // allow authenticated users to access all actions
            	'actions'=>array('listar'),
                'roles'=>array('2'),                
            ),
            array('allow', // allow authenticated users to access all actions
            	'actions'=>array('asignadas'),
                'roles'=>array('3'),                
            ),            
            array('deny',
            	'message'=>"Usted no tiene permiso para acceder a ésta página.",
            ),
        );
	}
	// Uncomment the following methods and override them if needed
	public function filters()
	{
		return array(
		    'accessControl', // perform access control for CRUD operations
		);
	}
/*
	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}