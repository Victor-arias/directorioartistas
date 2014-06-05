<?php
/* @var $this DirectorioController */
$this->breadcrumbs = null;
?>

<div class="seleccionados">
	<p>
		<?php echo CHtml::link( 'Ver los Seleccionados para la Feria de las Flores 2014', array('/directorio/resultados'), array('class'=>'btn btn-large') ); ?>
	</p>    
</div>
<h2>Estos son algunos artistas del directorio</h2>

<div id="perfiles">
	<?php foreach($perfiles as $perfil): ?>
		<?php $this->renderPartial( '_perfil' , array( 'perfil' => $perfil ) );?>
	<?php endforeach; ?>
</div>