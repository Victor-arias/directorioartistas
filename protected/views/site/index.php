<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="logo-medellin">
	<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/galleta_logo.png', 'Medellín, un hogar para la vida', array('width' => 316, 'height' => 166)) ?>
</div>
<div class="row-fluid">
	<div class="span8 offset2">
		<h1 class="logo-feria">
			<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/logo_feria.png', 'Feria de las flores Medellín, 2 al 11 de agosto de 2013', array('width' => 400, 'height' => 363)) ?>
		</h1>
		<h2>Estamos preparando la Feria</h2>
		<p>Si eres un artista, haces parte de una entidad cultural o agrupación local y te gustaría inscribir tu propuesta en el proceso de selección para la programación cultural y artística de la Feria de las Flores 2013, ingresa a 
			<?php echo CHtml::link( 'este enlace', array('/convocatoria') ); ?></p>
	</div>
</div>