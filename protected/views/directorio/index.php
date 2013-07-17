<?php
/* @var $this DirectorioController */
$this->breadcrumbs = null;
?>


<h2>Estos son algunos artistas del directorio</h2>

<div class="row">	
	<div class="span12 seleccionados">
		<p>
		<?php echo CHtml::link( 'Ver los Seleccionados para la Feria de las Flores 2013', array('/directorio/resultados'), array('class'=>'btn btn-large') ); ?>
		</p>		
</div>

<div id="perfiles">
	<?php foreach($perfiles as $perfil): ?>
		<?php $this->renderPartial( '_perfil' , array( 'perfil' => $perfil ) );?>
	<?php endforeach; ?>
</div>