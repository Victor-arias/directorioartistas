<?php
/* @var $this DirectorioController */
$this->breadcrumbs = null;
?>


<h2>Estos son algunos artistas del directorio</h2>


<div id="perfiles">
	<?php foreach($perfiles as $perfil): ?>
		<?php $this->renderPartial( '_perfil' , array( 'perfil' => $perfil ) );?>
	<?php endforeach; ?>
</div>