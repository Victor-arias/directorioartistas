<?php

class PropuestasController extends Controller
{
	public $layout = 'admin';
	public $user;
	
	public function actionDetalle()
	{
		$idSesion = Yii::app()->user->id;

		if(!is_null($idSesion)){
			$objUsuario = new Usuarios();
			$usuario = $objUsuario->findByPk($idSesion);
			$this->user = $usuario;

			if(isset($_GET['id'])){
				$objPerfil = new Perfiles();
				$perfil = $objPerfil->findByPk($_GET['id']);

				$objCriterio = new Criterio();
				$criterios = $objCriterio->findAll("areas_id=$perfil->areas_id");
				foreach($criterios as $criterio){
					
				}
			}
			else{
				$this->redirect(array('propuestas/listar'));
			}
		}		
		$this->render('detalle', array(
				'perfil'=>$perfil,
				'criterios'=>$criterios));
	}

	public function actionListar()
	{
		$idSesion = Yii::app()->user->id;

		if(!is_null($idSesion)){
			$objUsuario = new Usuarios();
			$usuario = $objUsuario->findByPk($idSesion);
			$this->user = $usuario;

			$model = new Propuestas("search");
			$model->unsetAttributes();
			if(isset($_GET['Propuestas']))
				$model->attributes = $_GET['Propuestas'];

			$criteria=new CDbCriteria;
			$criteria->compare('nombre',$model->nombre,true);
			$criteria->compare('representante',$model->representante,true);		
			if($usuario->roles_id=="3"){
				$criteria->addCondition("jurado_id=".$usuario->jurados[0]->id);	
			}

			$dataProvider = new CActiveDataProvider($model, array(
   				'criteria'=>$criteria,
    			'sort'=>array('defaultOrder'=>'id ASC'), // orden por defecto según el atributo nombre
    			'pagination'=>array('pageSize'=>20), // personalizamos la paginación
  			));			
		}
		else{
			$this->redirect(array('site/login'));
		}

		$this->render('listar',array(
				'model' => $model,
				'dataProvider' => $dataProvider,
			));
	}

	public function accessRules()
	{
		return array(
            array('allow', // allow authenticated users to access all actions
            	'actions'=>array('listar','detalle'),
                'roles'=>array('2','3'),                
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