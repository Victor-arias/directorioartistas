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
?>
<div id="perfil">
	<?php 
		if( !empty($perfil->fotoses) ):
			foreach($perfil->fotoses as $foto): ?>
			<?php if( $foto->es_perfil): ?>
				<img src="<?php echo $foto->src ?>" width="140" height="130" alt="<?php echo $perfil->nombre ?>" />
			<?php endif ?>
	<?php 
			endforeach; 
		else:
	?>
			<img src="/files/default.jpg" width="140" height="130" alt="<?php echo $perfil->nombre ?>" />
	<?php endif; ?>
	<div class="categoria">
		<?php if( isset($perfil->areas->nombre)): ?>
			<span class="<?php echo $perfil->areas->nombre ?>"><?php echo $perfil->areas->nombre ?></span> 
		<?php endif; ?>
		<?php if( isset($perfil->propuestases[0]->subgenero) && ($perfil->areas->nombre == 'Música' || $perfil->areas->nombre == 'Otro') ): ?>
			<span><?php echo $perfil->propuestases[0]->subgenero; ?></span>
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
	<p><strong>Twitter:</strong> <?php echo Yii::app()->format->formatUrl($perfil->redesHasPerfiles[0]->url) ?></p>
	<p><strong>Facebook:</strong> <?php echo Yii::app()->format->formatUrl($perfil->redesHasPerfiles[1]->url) ?></p>
	<p><strong>Sitio Web:</strong> <?php echo Yii::app()->format->formatUrl($perfil->web) ?></p>
	<h3>Reseña</h3>
    <p><?php echo $perfil->propuestases[0]->resena ?></p>
    <p>PLUGINS SOCIALES AQUÍ</p>
    <h3>Conozca la propuesta (O una frase bonita paa no poner "Multimedia" a secas)</h3>
    <h3>Video</h3>
	<?php
		$url = $perfil->propuestases[0]->video;
		preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
		if(isset($matches[1])):
	?> 
		<iframe type="text/html" width="350" height="200" src="http://www.youtube.com/embed/<?php echo $matches[1] ?>?rel=0" frameborder="0"></iframe>		
	<?php endif; ?>
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
  	<h3>Galería de la propuesta</h3>
  	<?php 
		if( !empty($perfil->fotoses) ):
			foreach($perfil->fotoses as $foto): ?>
			<?php if( !$foto->es_perfil): ?>
				<a href="<?php echo $foto->src ?>" class="fancybox" rel="group" title="<?php echo $perfil->nombre ?>"><img src="<?php echo $foto->src ?>" width="140" height="130" alt="<?php echo $perfil->nombre ?>" /></a>
			<?php endif ?>
	<?php 
			endforeach;
		endif; 
	?>
	<h3>Contactar propuesta</h3>
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
	<div class="row">
		<?php echo $form->label($contacto,'nombre'); ?>
		<?php echo $form->textField($contacto,'nombre'); ?>
		<?php echo $form->error($contacto,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($contacto,'email'); ?>
		<?php echo $form->textField($contacto,'email'); ?>
		<?php echo $form->error($contacto,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($contacto,'asunto'); ?>
		<?php echo $form->textField($contacto,'asunto'); ?>
		<?php echo $form->error($contacto,'asunto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($contacto,'mensaje'); ?>
		<?php echo $form->textArea($contacto,'mensaje'); ?>
		<?php echo $form->error($contacto,'mensaje'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Enviar mensaje'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>