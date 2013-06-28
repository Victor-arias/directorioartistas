<?php
/* @var $this DirectorioController */
$bc = array();
$bc[ucfirst($categoria)] = array('/'.$categoria);
if($subgenero) array_push($bc, ucfirst($subgenero));
$this->breadcrumbs = $bc;
?>
<h2 class="titulo">Artistas de la categoría <?php echo ucfirst($categoria) ?> <?php echo ucfirst($subgenero) ?></h2>

<div id="perfiles">
	<?php foreach($perfiles as $perfil): ?>
		<?php $this->renderPartial( '_perfil' , array( 'perfil' => $perfil, 'subgenero' => $subgenero ) );?>
	<?php endforeach; ?>
</div>