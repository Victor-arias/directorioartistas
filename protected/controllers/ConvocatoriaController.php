<?php

class ConvocatoriaController extends Controller
{
	public $layout = 'bootstrap';

	public function actionIndex()
	{
		$this->pageTitle ="Convocatoria Artístas";
		$this->render('index');
	}

	public function actionFotoPerfil(){	
		if(isset(Yii::app()->session['dir'])){
			$dir = Yii::app()->session['dir'];
		}
		
		$data = array(
				'image_versions' => array(
								'thumbnail' => array(
											'max_width' => 200,'max_height' => 200
											)
								),
				'script_url' => Yii::app()->request->baseUrl.'/convocatoria/FotoPerfil/',
				'max_number_of_files' => 1,
				'upload_dir' => Yii::getPathOfAlias('webroot').'/files/' . $dir . '/foto_perfil/',
	            'upload_url' => Yii::app()->request->baseUrl.'/files/' . $dir . '/foto_perfil/',	
	            'accept_file_types' => '/(\.|\/)(gif|jpe?g|png)$/i',
				);
		$messages = array(
        			1 => 'El archivo subido excede la directiva upload_max_filesize en php.ini',
        			2 => 'El archivo subido excede la directiva MAX_FILE_SIZE que se especificó en el formulario HTML',
        			3 => 'El archivo subido fue sólo parcialmente cargado. Por favor cargarlo nuevamente.',
        			4 => 'Ningún archivo fue subido',
        			6 => 'La carpeta temporal no se encuentra',
        			7 => 'Falló la escritura en el servidor',
        			8 => 'Una extensión de PHP interrumpió la carga de archivos',
        			'post_max_size' => 'El archivo subido excede la directiva post_max_size en php.ini',
        			'max_file_size' => 'El archivo es demasiado pesado',
        			'min_file_size' => 'El archivo no tiene el peso suficiente',
        			'accept_file_types' => 'Tipo de archivo no permitido',
        			'max_number_of_files' => 'Número máximo de archivos se superó. Solo se permite una foto de perfil',
        			'max_width' => 'La imagen excede el ancho máximo',
        			'min_width' => 'La imagen no tiene el ancho suficiente',
        			'max_height' => 'La imagen excede el alto máximo',
        			'min_height' => 'La imagen no tiene el alto suficiente'
    			);		
		$upload_handler = new UploadHandler($data, true, $messages);		
	}

	public function actionFotos(){		
		if(isset(Yii::app()->session['dir'])){
			$dir = Yii::app()->session['dir'];
		}

		$data = array(
				'image_versions' => array(
								'thumbnail' => array(
											'max_width' => 200,'max_height' => 200
											)
								),
				'script_url' => Yii::app()->request->baseUrl.'/convocatoria/fotos/',
				'max_number_of_files' => 5,
	            'upload_dir' => Yii::getPathOfAlias('webroot').'/files/' . $dir . '/fotos/',
	            'upload_url' => Yii::app()->request->baseUrl.'/files/' . $dir . '/fotos/',
	            'accept_file_types' => '/(\.|\/)(gif|jpe?g|png)$/i',				
				);
		$messages = array(
        			1 => 'El archivo subido excede la directiva upload_max_filesize en php.ini',
        			2 => 'El archivo subido excede la directiva MAX_FILE_SIZE que se especificó en el formulario HTML',
        			3 => 'El archivo subido fue sólo parcialmente cargado. Por favor cargarlo nuevamente.',
        			4 => 'Ningún archivo fue subido',
        			6 => 'La carpeta temporal no se encuentra',
        			7 => 'Falló la escritura en el servidor',
        			8 => 'Una extensión de PHP interrumpió la carga de archivos',
        			'post_max_size' => 'El archivo subido excede la directiva post_max_size en php.ini',
        			'max_file_size' => 'El archivo es demasiado pesado',
        			'min_file_size' => 'El archivo no tiene el peso suficiente',
        			'accept_file_types' => 'Tipo de archivo no permitido',
        			'max_number_of_files' => 'Número máximo de archivos se superó. Solo se permite una foto de perfil',
        			'max_width' => 'La imagen excede el ancho máximo',
        			'min_width' => 'La imagen no tiene el ancho suficiente',
        			'max_height' => 'La imagen excede el alto máximo',
        			'min_height' => 'La imagen no tiene el alto suficiente'
    			);		
		$upload_handler = new UploadHandler($data, true, $messages);		
	}

	public function actionAudio(){		
		if(isset(Yii::app()->session['dir'])){
			$dir = Yii::app()->session['dir'];
		}

		$data = array(
				'image_versions' => array(
								'thumbnail' => array(
											'max_width' => 200,'max_height' => 200
											)
								),
				'script_url' => Yii::app()->request->baseUrl.'/convocatoria/audio/',
				'max_number_of_files' => 2,
	            'upload_dir' => Yii::getPathOfAlias('webroot').'/files/' . $dir . '/audios/',
	            'upload_url' => Yii::app()->request->baseUrl.'/files/' . $dir . '/audios/',
	            'accept_file_types' => '/(\.|\/)(mp3)$/i',			
				);
		$messages = array(
        			1 => 'El archivo subido excede la directiva upload_max_filesize en php.ini',
        			2 => 'El archivo subido excede la directiva MAX_FILE_SIZE que se especificó en el formulario HTML',
        			3 => 'El archivo subido fue sólo parcialmente cargado. Por favor cargarlo nuevamente.',
        			4 => 'Ningún archivo fue subido',
        			6 => 'La carpeta temporal no se encuentra',
        			7 => 'Falló la escritura en el servidor',
        			8 => 'Una extensión de PHP interrumpió la carga de archivos',
        			'post_max_size' => 'El archivo subido excede la directiva post_max_size en php.ini',
        			'max_file_size' => 'El archivo es demasiado pesado',
        			'min_file_size' => 'El archivo no tiene el peso suficiente',
        			'accept_file_types' => 'Tipo de archivo no permitido',
        			'max_number_of_files' => 'Número máximo de archivos se superó. Solo se permiten 2 archivos de audio',
        			'max_width' => 'La imagen excede el ancho máximo',
        			'min_width' => 'La imagen no tiene el ancho suficiente',
        			'max_height' => 'La imagen excede el alto máximo',
        			'min_height' => 'La imagen no tiene el alto suficiente'
    			);		
		$upload_handler = new UploadHandler($data, true, $messages);		
	}	

	public function actionRider(){		
		if(isset(Yii::app()->session['dir'])){
			$dir = Yii::app()->session['dir'];
		}

		$data = array(
				'script_url' => Yii::app()->request->baseUrl.'/convocatoria/rider/',
				'max_number_of_files' => 1,
	            'upload_dir' => Yii::getPathOfAlias('webroot').'/files/' . $dir . '/rider/',
	            'upload_url' => Yii::app()->request->baseUrl.'/files/' . $dir . '/rider/',
	            'accept_file_types' => '/(\.|\/)(pdf)$/i',			
				);
		$messages = array(
        			1 => 'El archivo subido excede la directiva upload_max_filesize en php.ini',
        			2 => 'El archivo subido excede la directiva MAX_FILE_SIZE que se especificó en el formulario HTML',
        			3 => 'El archivo subido fue sólo parcialmente cargado. Por favor cargarlo nuevamente.',
        			4 => 'Ningún archivo fue subido',
        			6 => 'La carpeta temporal no se encuentra',
        			7 => 'Falló la escritura en el servidor',
        			8 => 'Una extensión de PHP interrumpió la carga de archivos',
        			'post_max_size' => 'El archivo subido excede la directiva post_max_size en php.ini',
        			'max_file_size' => 'El archivo es demasiado pesado',
        			'min_file_size' => 'El archivo no tiene el peso suficiente',
        			'accept_file_types' => 'Tipo de archivo no permitido. Solo PDF',
        			'max_number_of_files' => 'Número máximo de archivos se superó. Solo se permiten 1 archivo Rider',
    			);		
		$upload_handler = new UploadHandler($data, true, $messages);		
	}	

	public function actionRegistro()
	{
		if(!count($_POST)){
			$this->redirect('index');
		}

		if(!isset(Yii::app()->session['dir'])){
			Yii::app()->session['dir'] = md5(time());
		}
		
		//OJO: Verificar que llegue el checkbox de la página anterior (convocatoria)
		//o en su defecto los datos del formulario para validar
		$objFormularioRegistro = new RegistroForm();
		if(isset($_POST['RegistroForm'])){
			$objFormularioRegistro->attributes = $_POST['RegistroForm'];
			if(isset(Yii::app()->session['dir'])){
				$dir = Yii::app()->session['dir'];
			}			
			
			if($objFormularioRegistro->validate()){				

				$objUsuario = new Usuarios();
				$transaction = $objUsuario->dbConnection->beginTransaction();
				$objUsuario->username = $objFormularioRegistro->username;
				$objUsuario->password = Bcrypt::hash($objFormularioRegistro->password);
				$objUsuario->estado   = 1;
				$objUsuario->roles_id = 1;
				if( ! $objUsuario->save(false)){
					$transaction->rollback();					
				}
				$idUsuario = $objUsuario->getPrimaryKey();

				$objPerfiles = new Perfiles();
				$objPerfiles->nombre      = $objFormularioRegistro->nombrePropuesta;
				$objPerfiles->resena      = $objFormularioRegistro->resena;				
				$objPerfiles->web         = $objFormularioRegistro->web;
				$objPerfiles->usuarios_id = $idUsuario;
				$objPerfiles->areas_id    = $objFormularioRegistro->area;
				if( ! $objPerfiles->save(false)){
					$transaction->rollback();	
				}
				$idPerfil = $objPerfiles->getPrimaryKey();

				$objRedesHasPerfil = new RedesHasPerfiles();
				$objRedesHasPerfil->redes_id = 1;
				$objRedesHasPerfil->perfiles_id = $idPerfil;
				$objRedesHasPerfil->url = $objFormularioRegistro->twitter;
				if( ! $objRedesHasPerfil->save(false)){
					$transaction->rollback();	
				}

				$objRedesHasPerfil = new RedesHasPerfiles();
				$objRedesHasPerfil->redes_id = 2;
				$objRedesHasPerfil->perfiles_id = $idPerfil;
				$objRedesHasPerfil->url = $objFormularioRegistro->fb;				
				if( ! $objRedesHasPerfil->save(false)){
					$transaction->rollback();	
				}

				if(is_dir(Yii::getPathOfAlias('webroot').'/files/' . $dir . '/foto_perfil/')){
					$directorio=dir(Yii::getPathOfAlias('webroot').'/files/' . $dir . '/foto_perfil/'); 
					while ($archivo = $directorio->read()){
						if($archivo !== "." && $archivo !== ".." && $archivo !== "thumbnail"){					
							$fotoPerfil = Yii::app()->request->baseUrl.'/files/' . $dir . '/foto_perfil/'.$archivo; 
							$imgData = getimagesize(Yii::getPathOfAlias('webroot').'/files/' . $dir . '/foto_perfil/'.$archivo);
							$objFotos = new Fotos();
							$titulo = explode('.',$archivo);
							$objFotos->titulo = $titulo[0];
							$objFotos->src = $fotoPerfil;				
							$objFotos->ancho = $imgData[0];
							$objFotos->alto = $imgData[1];
							$objFotos->es_perfil = 1;
							$objFotos->estado = 1;
							$objFotos->perfiles_id = $idPerfil;		
							if( ! $objFotos->save(false)){
								$transaction->rollback();	
							}
							break;							
						}
					}									

					$directorio->close(); 					
				}

				if(is_dir(Yii::getPathOfAlias('webroot').'/files/' . $dir . '/fotos/')){
					$directorio=dir(Yii::getPathOfAlias('webroot').'/files/' . $dir . '/fotos/'); 
					while ($archivo = $directorio->read()){
						if($archivo !== "." && $archivo !== ".." && $archivo !== "thumbnail"){
							$foto = Yii::app()->request->baseUrl.'/files/' . $dir . '/fotos/'.$archivo; 
							$objFotos = new Fotos();
							$titulo = explode('.',$archivo);
							$objFotos->titulo = $titulo[0];
							$objFotos->src = $foto;
							$imgData = getimagesize(Yii::getPathOfAlias('webroot').'/files/' . $dir . '/fotos/'.$archivo);
							$objFotos->ancho = $imgData[0];
							$objFotos->alto = $imgData[1];
							$objFotos->es_perfil = 0;
							$objFotos->estado = 1;
							$objFotos->perfiles_id = $idPerfil;		
							if( ! $objFotos->save(false)){
								$transaction->rollback();	
							}
						}
					}				
					$directorio->close();					
				}

				if(is_dir(Yii::getPathOfAlias('webroot').'/files/' . $dir . '/audios/')){
					$directorio=dir(Yii::getPathOfAlias('webroot').'/files/' . $dir . '/audios/'); 
					while ($archivo = $directorio->read()){
						if($archivo !== "." && $archivo !== ".." && $archivo !== "thumbnail"){
							$url = Yii::app()->request->baseUrl.'/files/' . $dir . '/audios/'.$archivo; 
							$objAudio = new Audios();
							$titulo = explode('.',$archivo);
							$objAudio->nombre = $titulo[0];
							$objAudio->url = $url;
							$objAudio->estado = 1;
							$objAudio->perfiles_id = $idPerfil;		
							if( ! $objAudio->save(false)){
								$transaction->rollback();	
							}
						}
					}				
					$directorio->close();
				}				

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
				$objPropuesta->subgenero          = (isset($_POST["subgenero"])) ? $_POST["subgenero"] : NULL;

				if(is_dir(Yii::getPathOfAlias('webroot').'/files/' . $dir . '/rider/')){
					$directorio=dir(Yii::getPathOfAlias('webroot').'/files/' . $dir . '/rider/'); 
					while ($archivo = $directorio->read()){
						if($archivo !== "." && $archivo !== ".." && $archivo !== "thumbnail"){
							$archivoRider = Yii::app()->request->baseUrl.'/files/' . $dir . '/rider/'.$archivo; 
							break;	
						}
					}					
					$directorio->close(); 						
				}

				$objPropuesta->rider              = $archivoRider;
				$objPropuesta->convocatorias_id   = 1;
				$objPropuesta->perfiles_id        = $idPerfil;
				if($objPropuesta->save(false)){
					$transaction->commit();
					$this->redirect('exito');
				}
				else{
					$transaction->rollback();	
				}
			}
		}
		//OJO cuando se guarden los datos exitosamente se debe llevar a otra pantalla.
		$this->pageTitle ="Registro Artístas";
		$this->render('registro', array(
				'formulario' => $objFormularioRegistro
			));
	}

	public function actionExito(){
		Yii::app()->session->destroy();
		$this->pageTitle ="Registro Exitoso";
		$this->render('exito');		
	}

	public function actionAsignarJuradosMusica()
	{
		$perfiles = Perfiles::model()->findAll('areas_id = ' . 1);
		$jurados = array(3, 4, 5);
		$jurado_actual = 0;
		foreach($perfiles as $perfil)
		{
			/*CVarDumper::dump($perfil->propuestases);
			echo '<br /><br />';*/
			if( isset($perfil->propuestases[0]) )
			{
				$p = Propuestas::model()->findByPk($perfil->propuestases[0]->id);
				$p->jurado_id = $jurados[$jurado_actual];
				if($p->update()) echo 'Guardado ' . $p->nombre . ' con el jurado ' . $jurados[$jurado_actual];
				else echo 'Falló ' . $p->nombre;

				if($jurado_actual < 2) $jurado_actual++;
				else $jurado_actual = 0;
				//CVarDumper::dump($p);
				echo '<br /><br />';
			}
			
		}
	}

	public function actionAsignarJuradosDot()
	{
		$perfiles = Perfiles::model()->findAll('areas_id = ' . 2 . ' OR areas_id = ' . 3 . ' OR areas_id = ' . 4);
		$jurados = array(6, 7);
		$jurado_actual = 0;
		foreach($perfiles as $perfil)
		{
			/*CVarDumper::dump($perfil->propuestases);
			echo '<br /><br />';*/
			if( isset($perfil->propuestases[0]) )
			{
				$p = Propuestas::model()->findByPk($perfil->propuestases[0]->id);
				$p->jurado_id = $jurados[$jurado_actual];
				if($p->update()) echo 'Guardado ' . $p->nombre . ' con el jurado ' . $jurados[$jurado_actual];
				else echo 'Falló ' . $p->nombre;

				if($jurado_actual < 1) $jurado_actual++;
				else $jurado_actual = 0;
				//CVarDumper::dump($p);
				echo '<br /><br />';
			}
			
		}
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