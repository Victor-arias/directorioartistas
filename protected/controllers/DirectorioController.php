<?php

class DirectorioController extends Controller
{
	public $layout = 'directorio';


	public function actionIndex()
	{
		$perfiles = new Perfiles;
		$resultado = $perfiles->findRandom();

		$this->render('index',
			array('perfiles' => $resultado)
		);
	}

	public function actionSearch()
	{
		if( Yii::app()->request->isAjaxRequest && isset($_GET['term']) ){
			$perfiles = new Perfiles;
			$artistas = $perfiles->buscar( $_GET['term'] );
			$this->render('json', array('contenido' => $artistas));	
		}else{
			//if( !isset($_POST['artista']) ) throw new CHttpException('403', 'Forbidden access.');
			$page = ( isset($_GET['Perfiles_page']) ) ? $_GET['Perfiles_page']:0;
			$limit = 12;

			$criteria = new CDbCriteria;
			$criteria->offset = ($page-1) * $limit;
			$criteria->limit = $limit;
		    $criteria->addSearchCondition('nombre', $_POST['artista']);
		 
		    $resultado = new CActiveDataProvider('Perfiles', array(
		        'pagination' => array(
		            'pageSize' => $limit,
		            'currentPage' => $page,
		        ),
		        'criteria' => $criteria,
		    ));
			
			//$resultado = Perfiles::model()->findAll( 'nombre LIKE "%' . $_POST['artista']. '%"' );

			$this->render('buscar',
				array('perfiles' => $resultado)
			);
		}
	
	}

	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}