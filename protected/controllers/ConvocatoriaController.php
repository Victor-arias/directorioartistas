<?php

class ConvocatoriaController extends Controller
{
	public $layout = 'bootstrap';

	public function actionIndex()
	{
		$this->pageTitle ="Convocatoria Artístas";
		$this->render('index');
	}

	public function actionRegistro()
	{
		$objFormularioRegistro = new RegistroForm();
		if(isset($_POST['RegistroForm'])){
			$objFormularioRegistro->attributes = $_POST['RegistroForm'];
			//var_dump($objFormularioRegistro);
			//die();			
			if($objFormularioRegistro->validate()){
				$objUsuario = new Usuarios();
				$objUsuario->username = $objFormularioRegistro->username;
				$objUsuario->password = Bcrypt::hash($objFormularioRegistro->password);
				$objUsuario->estado   = 1;
				$objUsuario->roles_id = 1;
				$objUsuario->save(false);
				$idUsuario = $objUsuario->getPrimaryKey();

				$objPerfiles = new Perfiles();
				$objPerfiles->nombre      = $objFormularioRegistro->nombrePropuesta;
				$objPerfiles->resena      = $objFormularioRegistro->resena;				
				$objPerfiles->web         = $objFormularioRegistro->web;
				$objPerfiles->usuarios_id = $idUsuario;
				$objPerfiles->areas_id    = $objFormularioRegistro->area;
				$objPerfiles->save(false);
				$idPerfil = $objPerfiles->getPrimaryKey();

				$objPropuesta = new Propuestas();
				$objPropuesta->nombre             = $objFormularioRegistro->nombrePropuesta;
				$objPropuesta->representante      = $objFormularioRegistro->representante;
				$objPropuesta->cedula             = $objFormularioRegistro->cedula;
				$objPropuesta->telefono           = $objFormularioRegistro->telefono;
				$objPropuesta->celular            = $objFormularioRegistro->celular;
				$objPropuesta->email              = $objFormularioRegistro->email;
				$objPropuesta->direccion          = $objFormularioRegistro->direccion;
				$objPropuesta->trayectoria        = $objFormularioRegistro->trayectoria;
				$objPropuesta->numero_integrantes = $objFormularioRegistro->numeroIntegrantes;
				$objPropuesta->resena             = $objFormularioRegistro->resena;
				$objPropuesta->video              = $objFormularioRegistro->video;
				$objPropuesta->estado             = 1;
				$objPropuesta->valor_presentacion = $objFormularioRegistro->valor;
				$objPropuesta->rider              = "rider";
				$objPropuesta->convocatorias_id   = 1;
				$objPropuesta->perfiles_id        = $idPerfil;
				$objPropuesta->save(false);
			}
		}

		$this->pageTitle ="Registro Artístas";
		$this->render('registro', array(
				'formulario'=> $objFormularioRegistro,
			));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

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