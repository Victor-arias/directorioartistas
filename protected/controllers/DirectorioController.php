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

		$page 	 = ( isset($_GET['page']) ) ? $_GET['page']:1;
		$limit 	 = 12;

		if( $genero )
			$subgenero 	= strtolower( $genero );

		$criteria = new CDbCriteria;
		$criteria->limit = $limit;
		$criteria->offset = ($page-1) * $limit;
		$criteria->order = 't.nombre ASC';
		
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
				case 'otras-artes':
					$area = 4;
					break;
				default:
					$area = 4;
			}

			$criteria->with = array('areas', 'fotoses');
			$criteria->addCondition('areas_id=' . $area);
			$resultado = Perfiles::model()->findAll($criteria);

		}

		$vp = array('perfiles'  => $resultado,
					'categoria' => $categoria,
					'subgenero' => $subg,
					'pagina'	=> $page
		);

		if( Yii::app()->request->isAjaxRequest )
		{
			$this->render( 'json_listar', array('contenido' => $vp) );
		}
		else
		{
			$this->render('listar', $vp );
		}
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
		$page 	 = ( isset($_GET['page']) ) ? $_GET['page']:1;
		$termino = ( isset($_GET['artista']) ) ? $_GET['artista'] : ''; 
		$limit 	 = 12;

		$criteria = new CDbCriteria;
	    $criteria->addSearchCondition('nombre', $termino);
		
		$criteria->limit = $limit;
		$criteria->offset = ($page-1) * $limit;
		$resultado 	= Perfiles::model()->findAll( $criteria );
		
		$vp = array('perfiles' => $resultado,
				  'pagina'	 => $page,
				  'termino' => $termino);

		if( Yii::app()->request->isAjaxRequest )
		{
			$this->render( 'json_listar', array('contenido' => $vp) );
		}
		else
		{
			$this->render('busqueda', $vp);
		}
	
	}

	public function actionAutocompletar()
	{
		if( Yii::app()->request->isAjaxRequest && isset($_GET['term']) ){
			$perfiles = new Perfiles;
			$artistas = $perfiles->buscar( $_GET['term'] );
			$this->render('json', array('contenido' => $artistas));	
		}else throw new CHttpException('403', 'Forbidden access.');
	}
/*
	public function actionGenerarSlug()
	{
		$perfiles = Perfiles::model()->findAll();
	    foreach($perfiles as $perfil)
	    {
	      CVarDumper::dump($perfil->attributes);
	      echo '<br /><br />';
	      $p = $perfil;
	      $p->slug = $this->createSlug($p->nombre);
	      if($p->update()) echo 'Guardado ' . $p->id;
	      else echo 'Falló ' . $p->id;
	    }
	}
*/

	public function actionGenerarThumbs()
	{
		$c = new CDbCriteria;
		$c->limit = 50;
		$perfiles = Perfiles::model()->findAll();
	    foreach($perfiles as $perfil)
	    {
	      //CVarDumper::dump($perfil->attributes);
	      //echo '<br /><br />';
	      foreach($perfil->fotoses as $foto)
	      {
	      	if($foto->es_perfil)
	      	{
	      		//echo $foto->src;
	      		$pedazos = explode('/', $foto->src);
	      		$nn = 't_' . $pedazos[4];
	      		$nr = './'.$pedazos[1].'/'.$pedazos[2].'/'.$pedazos[3].'/'.$nn;
	      		//print_r($pedazos);
	      		
	      		Yii::import('application.extensions.image.Image');
				$image = new Image('.'.$foto->src);
				$image->resize(174, 145);
				if($image->save($nr))
				{
					echo 'SI ' . $nr.'<br /><br />';
				}else{
					echo 'NO ' . $nr.'<br /><br />';
				}
	      	}
	      }
	    }
	}

	public function createSlug($str) {
	    // convert all spaces to underscores:
	    $treated = strtr($str, " ", "_");
	    // convert what's needed to convert to nothing (remove them...)
	    $treated = preg_replace('/[\!\@\#\$\%\^\&\*\(\)\+\=\~\:\.\,\;\'\"\<\>\/\\\`]/', "", $treated);

	    $no_permitidas= array("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","Ñ","À","Ã","Ì","Ò","Ù","´","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
	    $permitidas=    array("a","e","i","o","u","A","E","I","O","U","n","N","A","A","I","O","U","","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
	    $treated = str_replace($no_permitidas, $permitidas, $treated);
	    // convert underscores to dashes
	    $treated = strtr($treated, "_", "-");

	    $treated = mb_strtolower($treated, 'UTF-8');
	    
	    return $treated;
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

	public function isActive($routes = array())
	{
	    $routeCurrent = '';
	    if ($this->module !== null) {
	        $routeCurrent .= sprintf('%s/', $this->module->id);
	    }
	    $routeCurrent .= sprintf('%s/%s', $this->id, $this->action->id);
	    foreach ($routes as $route) {
	        $pattern = sprintf('~%s~', preg_quote($route));
	        if (preg_match($pattern, $routeCurrent)) {
	            return true;
	        }
	    }
	    return false;
	}

}