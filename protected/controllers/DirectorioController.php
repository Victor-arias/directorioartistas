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