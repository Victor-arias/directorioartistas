<?php
/* @var $this DirectorioController */
$bc = array();
array_push($bc, ucfirst($categoria));
if($subgenero) array_push($bc, ucfirst($subgenero));
$this->breadcrumbs = $bc;
?>
<h2>Artistas de la categoría <?php echo ucfirst($categoria) ?> <?php echo ucfirst($subgenero) ?></h2>

<div id="perfiles">
	<?php foreach($perfiles as $perfil): ?>
		<?php $this->renderPartial( '_perfil' , array( 'perfil' => $perfil, 'subgenero' => $subgenero ) );?>
	<?php endforeach; ?>
</div>