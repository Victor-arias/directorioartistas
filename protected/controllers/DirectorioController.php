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

	public function actionListar($cat = '', $genero = false)
	{
		$area 		= 4;
		$subgenero  = false;
		$categoria 	= strtolower( $cat );
		$subg = false;

		if( $genero )
			$subgenero 	= strtolower( $genero );

		if($subgenero)
		{
			switch( $subgenero )
			{
				case 'tropical':
					$subg = 'Tropical';
					break;
				case 'popular-tradicional':
					$subg = 'Popular Tradicional';
					break;
				case 'urbana':
					$subg = 'Urbana';
					break;
				case 'clasica':
					$subg = 'Clásica';
					break;
				case 'folclor':
					$subg = 'Folclor';
					break;
				case 'jazz-y-musicas-del-mundo':
					$subg = 'Jazz y músicas del mundo';
					break;
				case 'fusion':
					$subg = 'Fusión';
					break;
				case 'experimental':
					$subg = 'Experimental';
					break;
				case 'infantil':
					$subg = 'Infantil';
					break;
				case 'magia':
					$subg = 'Magia';
					break;
				case 'clown':
					$subg = 'Clown';
					break;
				case 'malabarismo':
					$subg = 'Malabarismo';
					break;
				case 'mimos':
					$subg = 'Mimos';
					break;
				case 'cuenteria':
					$subg = 'Cuentería';
					break;
				case 'humor':
					$subg = 'Humor';
					break;
			}
			
			$criteria = new CDbCriteria;
			$criteria->join = 'INNER JOIN propuestas ON propuestas.perfiles_id = t.id';
			$criteria->addCondition('propuestas.subgenero LIKE "' . $subg . '"');
			$resultado = Perfiles::model()->findAll($criteria);
		}
		else
		{
			switch( $categoria )
			{
				case 'musica':
					$area = 1;
					break;
				case 'danza':
					$area = 2;
					break;
				case 'teatro':
					$area = 3;
					break;
				case 'otros':
					$area = 4;
					break;
				default:
					$area = 4;
			}
			$resultado = Perfiles::model()->findAll('areas_id=' . $area);
		}

		$this->render('listar',
			array('perfiles' => $resultado,
				'categoria' => $categoria,
				'subgenero' => $subg,
				)
		);
	}

	public function actionVer()
	{
		$artista = $_GET['artista'];
		$genero = ( isset($_GET['genero']) ) ? $_GET['genero'] : false;
		$categoria = $_GET['cat'];
			
		$perfil = Perfiles::model()->findByAttributes( array('slug' => $artista) );
		if(!$perfil)
		{
			$this->redirect('busqueda?artista='.$artista);
		}
		$this->render('ver',
			array('perfil' 		=> $perfil,
				  'categoria' 	=> $categoria,
				  'genero' 		=> $genero,
				  'contacto'	=> new ContactForm)
		);
	}

	public function actionBusqueda()
	{
		//if( !isset($_POST['artista']) ) throw new CHttpException('403', 'Forbidden access.');
		$page 	 = ( isset($_GET['page']) ) ? $_GET['page']:0;
		$termino = ( isset($_GET['artista']) ) ? $_GET['artista'] : ''; 
		$limit 	 = 12;

		$criteria = new CDbCriteria;
	    $criteria->addSearchCondition('nombre', $termino);

	    $total 		= Perfiles::model()->count($criteria);
		$paginas 	= new CPagination( $total );
		$paginas->setPageSize($limit);
		$paginas->applyLimit($criteria);
		
		$criteria->limit = $limit;
		$criteria->offset = ($page-1) * $limit;
		$resultado 	= Perfiles::model()->findAll( $criteria/*'nombre LIKE "%' . $termino. '%"'*/ );
		


		$this->render('busqueda',
			array('perfiles' => $resultado,
				  'paginas'	 => $paginas,
				  'termino' => $termino)
		);
	
	}

	public function actionAutocompletar()
	{
		if( Yii::app()->request->isAjaxRequest && isset($_GET['term']) ){
			$perfiles = new Perfiles;
			$artistas = $perfiles->buscar( $_GET['term'] );
			$this->render('json', array('contenido' => $artistas));	
		}else throw new CHttpException('403', 'Forbidden access.');
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