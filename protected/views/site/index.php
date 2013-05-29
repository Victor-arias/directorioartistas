<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="row-fluid">
	<h1 class="span9">Feria de flores Medellín 2013</h1>
	<ul id="logos-home" class="span3">
		<li>Logo Alcaldía</li>
		<li>Logo Bureau</li>
		<li>Logo Secretaría de cultura</li>
	</ul>
</div>
<div class="row-fluid">
	<div class="span12">
		<p>Estamos preparando la Feria</p>
		<p>Si eres un artista, haces parte de una entidad cultural o agrupación local y te gustaría inscribir tu propuesta en el proceso de selección para la programación cultural y artística de la Feria de las Flores 2013, ingresa a 
			<?php echo CHtml::link( 'este enlace', array('/convocatoria') ); ?></p>
	</div>
</div>