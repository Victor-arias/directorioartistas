<?php
/* @var $this DirectorioController */
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/jquery.fancybox/jquery.fancybox.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.fancybox/jquery.fancybox.pack.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScript('fancybox', '$(".fancybox").fancybox();', CClientScript::POS_READY);

$bc = array();
$bc[ucfirst($categoria)] = array('/'.$categoria);
if($genero)	$bc[ucfirst($genero)] = array($categoria.'/'.$genero);

array_push( $bc, ucfirst($perfil->nombre) );

$this->breadcrumbs = $bc;
$this->pageTitle = Yii::app()->name . ' - ' .$perfil->nombre;
?>
<div id="perfil">
	 <div class="infoPpal">
	<?php 
		if( !empty($perfil->fotoses) ):
			foreach($perfil->fotoses as $foto): ?>
			<?php if( $foto->es_perfil): ?>
				<img src="<?php echo $foto->src ?>" width="210" height="210" alt="<?php echo $perfil->nombre ?>" />
			<?php endif ?>
	<?php 
			endforeach; 
		else:
	?>
   
    
			<img src="/files/default.jpg" width="210" height="210" alt="<?php echo $perfil->nombre ?>" />
	     <?php endif; ?>
	<div class="categoria">
    
		<?php if( isset($perfil->areas->nombre)): ?>
			<a href="<?php echo CHtml::normalizeUrl( Yii::app()->homeUrl . Utility::createSlug($perfil->areas->nombre) ); ?>" class="<?php echo $perfil->areas->nombre ?>"><?php echo $perfil->areas->nombre ?></a> 
		<?php endif; ?>
		<?php if( isset($perfil->propuestases[0]->subgenero) && ($perfil->areas->nombre == 'Música' || $perfil->areas->nombre == 'Otro') ): ?>
			<a href="<?php echo CHtml::normalizeUrl( Yii::app()->homeUrl . Utility::createSlug($perfil->areas->nombre) .'/' . Utility::createSlug($perfil->propuestases[0]->subgenero) ); ?>"><?php echo $perfil->propuestases[0]->subgenero; ?></a>
		<?php endif; ?>
	</div>
	<h2><?php echo ucfirst($perfil->nombre) ?></h2>
	<p><strong>Número Integrantes:</strong> <?php echo $perfil->propuestases[0]->numero_integrantes ?></p>
	<p><strong>Trayectoria:</strong> 
	<?php 
	switch ($perfil->propuestases[0]->trayectoria ) {
		case '1':
			echo "De 1 a 5 Años";
			break;
		case '2':
			echo "De 5 a 10 Años";
			break;
		default:
			echo "De 10 Años en adelante";
			break;
	}
	?>
	</p>
	<div class="twitter"><?php echo Yii::app()->format->formatUrl($perfil->redesHasPerfiles[0]->url) ?></div>
	<div class="fb"><?php echo Yii::app()->format->formatUrl($perfil->redesHasPerfiles[1]->url) ?></div>
	<?php if( !empty($perfil->web) ):?><div class="web"><?php echo Yii::app()->format->formatUrl($perfil->web) ?></div><?php endif; ?>
    </div>
    
    <div class="clear"></div>
    
	<h3 class="tituloBackground">Reseña</h3>
    <p><?php echo nl2br($perfil->propuestases[0]->resena) ?></p>
    <?php $this->renderPartial('_redes'); ?>
    <h3 class="tituloBackground">Conozca la propuesta</h3>
    
    <div class="multimedia">
    <h3>Video</h3>
	
	<?php
		$url = $perfil->propuestases[0]->video;
		preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
		if(isset($matches[1])):
	?> 
		<iframe type="text/html" width="350" height="200" src="http://www.youtube.com/embed/<?php echo $matches[1] ?>?rel=0" frameborder="0"></iframe>		
	<?php endif; ?>
    
     </div>
     
      <div class="multimedia">     
	<?php if($perfil->areas_id === "1"): ?>
  		<h3>Audios</h3>
  		<?php foreach($perfil->audioses as $audio): ?>
  		<h4><?php echo $audio->nombre ?>.mp3</h4>
		<audio controls>
		  <source src="<?php echo Yii::app()->request->baseUrl.$audio->url ?>" type="audio/mpeg">
		  Su Navegador no soporta reproducción de audio. Actualicelo o descargue el archivo a su computado 
		  [<a href="<?php echo Yii::app()->request->baseUrl.$audio->url ?>" target="_BLANK">Descargar</a>]
		</audio>         		
  		<?php endforeach; ?> 		
  	<?php endif; ?>
     </div>
    
    <div class="clear"></div>   
    
  	<h3 class="tituloBackground">Galería de la propuesta</h3>
  	<?php 
		if( !empty($perfil->fotoses) ):
			foreach($perfil->fotoses as $foto): ?>
			<?php if( !$foto->es_perfil): ?>
				<a href="<?php echo $foto->src ?>" class="fancybox" rel="group" title="<?php echo $perfil->nombre ?>"><img src="<?php echo $foto->src ?>" width="140" height="117" alt="<?php echo $perfil->nombre ?>" class="img-rounded" /></a>
			<?php endif ?>
	<?php 
			endforeach;
		endif; 
	?>
	<h3 class="tituloBackground">Contactar propuesta</h3>
	<?php $form = $this->beginWidget('CActiveForm', 
		array(
			'id'=>'contact-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			)
		)
	);
	?>
	<div class="row multimedia">
		<?php echo $form->label($contacto,'nombre'); ?>
		<?php echo $form->textField($contacto,'nombre'); ?>
		<?php echo $form->error($contacto,'nombre'); ?>
	</div>

	<div class="row multimedia">
		<?php echo $form->label($contacto,'email'); ?>
		<?php echo $form->textField($contacto,'email'); ?>
		<?php echo $form->error($contacto,'email'); ?>
	</div>

	<div class="row asunto">
		<?php echo $form->label($contacto,'asunto'); ?>
		<?php echo $form->textField($contacto,'asunto'); ?>
		<?php echo $form->error($contacto,'asunto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($contacto,'mensaje'); ?>
		<?php echo $form->textArea($contacto,'mensaje'); ?>
		<?php echo $form->error($contacto,'mensaje'); ?>
	</div>

	<div>
		<?php echo CHtml::submitButton('Enviar mensaje', array("class"=>"btn btn-large")) ?>
	</div>

<?php $this->endWidget(); ?>
</div>